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
use App\Models\Role_user;
use App\Models\ContactUs;
use App\Models\Donation_payment_details;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    
    public function index(){
        $no_of_member = User::select('id','fname','lname')->with('roles')->whereHas('roles',function($query){
            $query->where('type','member');
        })->count();
        $no_of_user = User::select('id','fname','lname')->with('roles')->whereHas('roles',function($query){
            $query->where('type','normal user');
        })->count();
        $user = User::with('roles')->whereHas('roles',function($query){
            $query->where('type','member');
        })->get();
        $no_donation = Donation_payment_details::count();
        $data = ['no_of_member'=>$no_of_member,'no_donation'=>$no_donation,'no_user'=>$no_of_user,'user'=>$user];
        return view('fronted.index',$data);
    }
    public function about(){
        return view('fronted.about');
    }

    public function our_work(){
        return view('fronted.ourwork');
    }
    public function our_member(){
        $user['user'] = User::with('roles')->whereHas('roles',function($query){
            $query->where('type','member');
        })->get();
        return view('fronted.our-members',$user);
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
        DB::beginTransaction();              
        try{
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
            $user->save();
            session()->put('fname',$request->fname);
            session()->put('lname',$request->lname);
            session()->put('email',$request->lname);
            $role = new Role_user();
            $user_type = Role::where('type','member')->first();
            $role->role_id=$user_type->id;
            $role->user_id = $user->id;
            $role->save();
            session()->put('role1','normal user');
            session()->put('user_id',$user->id);
            $edata['name'] = ucwords($request->fname." ".$request->lname);
            $edata['username'] = $request->email;
            $edata['password'] = $request->contact_no;
            $this->thankyou_email_forjoinus($request->email,$edata);
            // return redirect()->route('joinus')->with('success', "Record inserted successfully!");
            DB::commit();
            return redirect()->to('thank-you')->with('is_saved','1');
        } catch (\Exception $e){
            DB::rollBack();
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
        $username = $request->input('username');
        $password = $request->input('password');

        $fieldType = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'contact_no';
            if (Auth::attempt([$fieldType => $username, 'password' => $password])) {
                $user = Auth::user();
                $roles = $user->roles->pluck('type')->toArray();      
            if (in_array('admin', $roles)) {
                session()->put('role','admin');
                return redirect()->route('member.dashboard');
            } elseif (in_array('member', $roles)) {
                session()->put('role','member');
                return redirect()->route('member.dashboard');
            }
            session()->put('role','normal user');
            return redirect()->route('index');           
        }
        else{
            return redirect()->route('signin')->with('error',"Invalid credentials!");
        }
    }

    public function logout(){
        Auth::logout();
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

    public function isUserMobileExist(Request $request){
        if(!empty($request->email)){            
            if( User::where('contact_no',$request->mobile)->exists()){
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
