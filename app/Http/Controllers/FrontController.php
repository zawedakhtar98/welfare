<?php

namespace App\Http\Controllers;

use App\Mail\ThankyouEmailForUser;
use App\Mail\ExampleMail;
use App\Mail\ThankyouForContactus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\Role;
use App\Models\User;
use App\Models\Usertype;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{
    public function index(){
        return view('fronted.index');
    }
    public function about(){
        return view('fronted.about');
    }

    public function our_work(){
        return view('fronted.ourwork');
    }
    public function our_member(){
        return view('fronted.our-members');
    }
    public function join_us(){
        $data['state_list'] = State::all();        
        return view('fronted.joinus',$data);
    } 
    public function get_city_list(Request $request){
        return City::where('state_id',$request->get('state_id'))->get(); 
    }    
    public function become_member(){
        return view('fronted.become-member');
    }
    public function join_register(Request $request){
        $request->validate([
            "fname"=>'required',
            "lname"=>'required',
            "email"=>'required|email|unique:users,email',
            "contact_no"=>'required|unique:users,contact_no',
            "state"=>'required',
            "city"=>'required',
            "permanent_address"=>'required',
            "living_address"=>'required'
        ]);
        
        $user = new User();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = bcrypt($request->contact_no);
        $user->contact_no = $request->contact_no;
        $user->state_id = $request->state;
        $user->city_id = $request->city;
        $user->permanent_address = $request->permanent_address;
        $user->living_address = $request->living_address;       
        try{
            $user->save();
            session()->put('fname',$request->fname);
            session()->put('lname',$request->lname);
            session()->put('email',$request->lname);
            $role = new Role();
            $user_type = Usertype::where('type','member')->first();
            $role->user_type_id=$user_type->id;
            $role->user_id = $user->id;
            $role->save();
            $edata['name'] = ucwords($request->fname." ".$request->lname);
            $edata['username'] = $request->email;
            $edata['password'] = $request->contact_no;
            $this->thankyou_email_forjoinus($request->email,$edata);
            // return redirect()->route('joinus')->with('success', "Record inserted successfully!");
            return redirect()->to('thank-you')->with('is_saved','1');
        } catch (\Exception $e){
            return redirect()->route('joinus')->with('error', "There was an error inserting the record. ".$e->getMessage());
        }
        
    }
    public function contact_us(){        
        return view('fronted.contactus');
    }

    public function save_contactus(Request $request){
        $request->validate([
            "name"=> "required",
            "email"=> "required",
            "mobile_no"=> "required",
            "message"=> "required",
        ]);

        $data = new ContactUs();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile_no = $request->mobile_no;
        $data->message = $request->message;

        try{
            $data->save();  
            $edata['name'] = $request->name;
            $edata['message'] = $request->message;
            $this->thankyou_email_forcontactus($request->email,$edata);          
            return redirect()->to('thank-you')->with('is_saved','2');
        } catch (\Exception $e){
            return redirect()->route('contact-us')->with('error', "There was an error inserting the record!");
        }

    }

    public function login(){
        return view('fronted.login');
    }
    public function checklogin(Request $request){
        // dd($request);
        $request->validate(['username'=>'required','password'=>'required']);
        $username= $request->username;
        $password= $request->password;

        $user = User::with('roles')->where('email',$username)->orWhere('contact_no',$username)->get();         
        if($user && Hash::check($password,$user[0]->password)){
            session()->put('user_id',$user[0]->id);
            session()->put('fname',$user[0]->fname);
            session()->put('lname',$user[0]->lname);
            session()->put('email',$user[0]->email);
            session()->put('contact_no',$user[0]->contact_no);
            if(count($user[0]->roles)>1){
                session()->put('role1',$user[0]->roles[0]->type);
                session()->put('role2',$user[0]->roles[1]->type);                
                return redirect()->route('member.dashboard');// admin dashboard
            }
            else{
                //if role is member
                if($user[0]->roles[0]->type=='member'){
                    session()->put('role1',$user[0]->roles[0]->type);
                    return redirect()->route('member.dashboard');
                }
                else{
                    return redirect()->route('index');
                }
            }            
        }
        else{
            return redirect()->route('signin')->with('error',"Invalid credentials!");
        }
    }

    public function logout(){
        session()->forget(['fname','lname','email']);
        return redirect()->route('index');
    }

    public function isUserEmailExist(Request $request){
        if(!empty($request->email)){            
            if( User::where('email',$request->email)->exists()){
                return response()->json([
                    'success' => true,                
                ], 200);
            }
            else{
                return response()->json(['success' => false],201);
            }
            
        }
    }

    
    public function thankyou_email_forjoinus($email,$data)
    {
        $mailData = [
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => $data['password']
        ];

        Mail::to($email)->queue(new ThankyouEmailForUser($mailData));
    }
    public function thankyou_email_forcontactus($email,$data)
    {
        $mailData = [
            'name' => $data['name'],
            'message' => $data['message']
        ];

        Mail::to($email)->queue(new ThankyouForContactus($mailData));
    }
    public function mailm($email)
    {
        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
        ];

        Mail::to($email)->queue(new ExampleMail($mailData));
         dd("Mail sent successfull!");
    }

}