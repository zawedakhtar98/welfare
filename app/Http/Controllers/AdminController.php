<?php

namespace App\Http\Controllers;
use App\Models\Donation_payment_details;
use App\Models\Role_user;
use App\Models\Usertype;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\Role;
use App\Models\User;
use App\Models\Users_payment_details;
use App\Models\Welfare_transaction;
use App\Models\Payment_screenshot;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{   
    // public function __construct()
    // {
    //     $this->middleware('isAdminMember');
    // }
    public function index(){
        $credit_amt = Welfare_transaction::where('transaction_type','credit')->sum('amount');
        $debit_amt = Welfare_transaction::where('transaction_type','debit')->sum('amount');
        $avail_bal = ($credit_amt-$debit_amt);
        $no_of_member = User::select('id','fname','lname')->with('roles')->whereHas('roles',function($query){
            $query->where('type','member');
        })->count();
        $no_donation = Donation_payment_details::count();

        $user_paid_curMonth = User::whereHas('payment_details', function($query) {
            $query->whereMonth('payment_date', now()->month)
                  ->whereYear('payment_date', now()->year);
        })->get();

        $user_not_paid_curMonth = User::whereDoesntHave('payment_details', function($query) {
            $query->whereMonth('payment_date', now()->month)
                  ->whereYear('payment_date', now()->year);
        })->get();
                
        $data = ['avail_bal' =>$avail_bal,'no_of_member'=>$no_of_member,'no_donation'=>$no_donation,'user_paid_curMonth'=>$user_paid_curMonth,'user_not_paid_curMonth'=>$user_not_paid_curMonth];
        return view('backend.dashboard',$data);
    }
    
    public function add_member(){
        $data['state_list'] = State::all();
        return view('backend.addmember',$data);
    }

    public function save_member(Request $request){
        $request->validate([
            "fname"=>'required',
            "lname"=>'required',
            "contact_no"=>'required|unique:users,contact_no|numeric|digits:10',
            'profile_image' => 'mimes:jpeg,png,jpg|max:2048',
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
            $user->father_name = ($request->father_name) ? $request->father_name : "-";
            $user->mother_name = ($request->mother_name) ? $request->mother_name : "-";
            //profile upload 
            $profile_image = rand(100,9999).time().'.'.$request->profile_image->extension();  
            $request->profile_image->move(public_path('backend_assets/img/member_profile'), $profile_image);
            $user->profile_img = $profile_image;
    
            $user->password = bcrypt($request->contact_no);
            $user->contact_no = $request->contact_no;
            $user->alter_contact_no = $request->alternate_contact_no;
            $user->state_id = $request->state;
            $user->city_id = $request->city;
            $user->permanent_address = $request->permanent_address;
            $user->living_address = $request->living_address;       
            $user->user_occupation = ($request->member_occupation) ? $request->member_occupation : "-";  
            $user->save();
            $role = new Role_user();
            $user_type = Role::where('type','member')->first();
            $role->role_id=$user_type->id;
            $role->user_id = $user->id;
            $role->save();
            DB::commit();
            return redirect()->route('member.add-member')->with('success', "Record inserted successfully!");
        } catch (\Exception $e){
            DB::rollBack();
            unlink(public_path('backend_assets/img/member_profile/'.$profile_image));
            return redirect()->route('member.add-member')->with('error', "Something went wrong!".$e->getMessage());
        }
    }

    public function get_city_list(Request $request){
        return City::where('state_id',$request->get('state_id'))->get(); 
    } 

    public function member_list(){
        $data['list'] = User::with(['city','state','roles'])->whereHas('roles',function($role){
            $role->where('type','member');
        })->get();
        return view('backend.member-list',$data);
    }

    public function add_member_payment(){
        $data['list'] = User::select('id','fname','lname')->with('roles')->whereHas('roles',function($query){
            $query->where('type','member');
        })->get();
        return view('backend.addmember_payment',$data);
    }
    public function save_member_payment(Request $request){
       $request->validate([
        'member_name'=>'required',
        'payment_mode'=>'required',
        'payment_date'=>'required|date',
        'amount'=>'required|numeric',
       ]); 
       DB::beginTransaction();
       try{
        $user_pay = new  Users_payment_details();
        $user_pay->user_id = $request->member_name;
        $user_pay->amount = $request->amount;
        $user_pay->payment_mode = $request->payment_mode;
        $user_pay->amt_given_to = $request->given_amount_to;
        $user_pay->transaction_no = mt_rand(1000000000,9999999999);
        $user_pay->payment_date = $request->payment_date;
        $user_pay->created_at = Carbon::now();
        $user_pay->updated_at = Carbon::now();
        $user_pay->save();

        $welfare_trans = new  Welfare_transaction();
        $welfare_trans->amount = $request->amount;
        $welfare_trans->payment_mode = $request->payment_mode;
        $welfare_trans->payment_date = $user_pay->payment_date;
        $welfare_trans->transaction_no = $user_pay->transaction_no;
        $welfare_trans->transaction_type = 'credit';
        $welfare_trans->description = "Payment Added By ".session('fname')." from admin portal at: ". Carbon::now();
        $welfare_trans->created_at = Carbon::now();
        $welfare_trans->updated_at = Carbon::now();
        $welfare_trans->save();

        DB::commit();

        return redirect()->route('member.add-member-payment')->with('success', "Payment added successfully!");
       }
       catch(\Exception $e){
        DB::rollback();
            return redirect()->route('member.add-member-payment')->with('error', "Something went wrong! ".$e->getMessage());
       }
    }

    // all member payment details
    public function member_payment_details(){
        $data['member'] =  Users_payment_details::with('user')->orderByDesc('id')->get();;
        
        return view('backend.member_payment_details',$data);
    }
    //this function for specific member payment details
    public function my_payment_details(){
        $data['member'] = Users_payment_details::with('user')
                                ->whereHas('user', function ($q) {
                                    $q->where('email', session('email'))
                                    ->where('contact_no', session('contact_no'))
                                    ->where('id', session('user_id'));
                                })
                                ->orderByDesc('id')
                                ->get();   
        return view('backend.mypayment_details',$data);
    }
    
    public function welfare_payment_details(){
        $tansaction = Welfare_transaction::orderByDesc('id')->get();
        $credit_amt = Welfare_transaction::where('transaction_type','credit')->sum('amount');
        $debit_amt = Welfare_transaction::where('transaction_type','debit')->sum('amount');
        $data['balance'] = ($credit_amt-$debit_amt);
        $data['tansactions']= $tansaction->map(function ($transaction) {
            return [
                'id' => $transaction->id,
                'amount' => $transaction->amount,
                'transaction_no' => $transaction->transaction_no,
                'description' => $transaction->description,
                'payment_mode' => $transaction->payment_mode,
                'payment_date' => date('d-m-Y',strtotime($transaction->payment_date)),
                'credit' => $transaction->transaction_type == 'credit' ? $transaction->amount : null,
                'debit' => $transaction->transaction_type == 'debit' ? $transaction->amount : null,
            ];
        });

        return view('backend.payment_details',$data);
    }

    //this function for pay money into welfare  every single member
    public function pay_for_welfare(){
        return view('backend.pay_for_welfare');   
    }

    public function upload_screenshot(){
        return view('backend.upload_screenshot');   
    }
    public function save_screenshot(Request $request){
        $request->validate(
            ['amount'=>'required','screenshot'=>'required|mimes:jpeg,png,jpg|max:2048']
        );
        $pay = new Payment_screenshot();
        $screenshot = time().'.'.$request->screenshot->extension();  
        $request->screenshot->move(public_path('backend_assets/img/payment_screenshot'), $screenshot);

        try{
            $pay->uploaded_img = $screenshot;        
            $pay->member_id=session('user_id');
            $pay->paid_amount = $request->amount;
            $pay->action_by = 0;
            $pay->status = 'not verify';
            $pay->created_at = Carbon::now();
            $pay->updated_at = Carbon::now();
            $pay->save();
            return redirect()->route('member.upload-screenshot')->with('success', "Payment added successfully!");
        }
        catch(\Exception $e){
            unlink(public_path('backend_assets/img/payment_screenshot/'.$screenshot));
             return redirect()->route('member.upload-screenshot')->with('error', "Something went wrong! ".$e->getMessage());
        }

    }
    public function verify_member_payment(){
        $data['payment'] = Payment_screenshot::with('user')->where('status','not verify')->orderByDesc('id')->get();
        return view('backend.verify_payment',$data);
    }

    //this function will check the member payment detail made by via scanner
    public function checked_member_payment_via_scan(Request $request){
        $action_by = $request->post('action_by');
        $member_pay_dtl = explode('#',$request->post('member_pay_dtl'));
        $member_id =  $member_pay_dtl[0];
        $member_paid_amount =  $member_pay_dtl[1];
        $scan_id =  $member_pay_dtl[2];
        $remark = $request->post('remark');
        $status = $request->post('status');
        if($remark==""){
            return response()->json(['msg'=>"Remark can not be blank!",'status'=>false],200);
        }

        $mem_scan_pay = Payment_screenshot::find($scan_id);

        if($status==1){
            DB::beginTransaction();
            try{
                
                //updating member payment via scanner in the scanner table
                $mem_scan_pay->remark = $remark;
                $mem_scan_pay->action_by = $action_by;
                $mem_scan_pay->status = 'verify';
                $mem_scan_pay->updated_at = Carbon::now();
                $mem_scan_pay->save();

                //inserting user payment into user payment table
                $user_pay = new  Users_payment_details();
                $user_pay->amount = $member_paid_amount;
                $user_pay->transaction_no = mt_rand(1000000000,9999999999);
                $user_pay->payment_mode = 'online';
                $user_pay->amt_given_to = '-';
                $user_pay->payment_date = Carbon::now();
                $user_pay->created_at = Carbon::now();
                $user_pay->updated_at = Carbon::now();
                $user_pay->user_id =$member_id;
                $user_pay->save();

                //inserting the amount of member into transaction table
                $welfare_trans = new  Welfare_transaction();
                $welfare_trans->amount = $user_pay->amount;
                $welfare_trans->transaction_no = $user_pay->transaction_no;
                $welfare_trans->payment_mode = 'online';
                $welfare_trans->description = 'Payment made through scanner and verify by '.session('fname');
                $welfare_trans->transaction_type = 'credit';
                $welfare_trans->payment_date = Carbon::now();
                $welfare_trans->created_at = Carbon::now();
                $welfare_trans->updated_at = Carbon::now();
                $welfare_trans->save();
                
                DB::commit();
                return response()->json(['msg'=>"Record updated successfully! ",'status'=>true],200);
            }catch(\Exception $e){
                DB::rollback();
                return response()->json(['msg'=>"Internal server error! .".$e->getMessage(),'status'=>false],200);
            }
        }
        else{
            $mem_scan_pay->remark = $remark;
            $mem_scan_pay->updated_at = Carbon::now();
            $mem_scan_pay->save();
            return response()->json(['msg'=>"Record updated successfully!",'status'=>true],200);
        }
    }

    //donation details
    public function add_new_donation_details(){
        $data['list'] = User::select('id','fname','lname')->with('roles')->whereHas('roles',function($query){
            $query->where('type','member');
        })->get();
        return view('backend.addnew_donation',$data);
    }
    public function save_new_donation_details(Request  $request){
        
            $request->validate([
                'name'=>'required',
                'mobile_no'=>'required|numeric',
                'payment_mode'=>'required',
                'given_amount'=>'required',
                'address'=>'required',
                'given_date'=>'required',
                'given_by'=>'required',
                'description'=>'required',
                'aadhaar_no'=>'required|numeric',
                'receiver_image'=>'mimes:jpeg,png,jpg|max:2048',
            ]);
            $receiver_image ='-';
           
            $credit_amt = Welfare_transaction::where('transaction_type','credit')->sum('amount');
            $debit_amt = Welfare_transaction::where('transaction_type','debit')->sum('amount');
            $avail_bal = ($credit_amt-$debit_amt);
            DB::beginTransaction();
            try{
                if($request->given_amount < $avail_bal){
                    if(isset($request->receiver_image) && !empty($request->receiver_image)){
                        $receiver_image = time().mt_rand(10000,99999).'.'.$request->receiver_image->extension();  
                        $request->receiver_image->move(public_path('backend_assets/img/donation_people_img'), $receiver_image);
                    }                    
                    // dd([$request->name,$request->mobile_no,$request->payment_mode,$request->given_amount,$request->address]);
                    $givenby =  User::select('id','fname','lname')->find($request->given_by);

                    $welfare_trans = new  Welfare_transaction();

                    $welfare_trans->amount = $request->given_amount;
                    $welfare_trans->transaction_no =  mt_rand(1000000000,9999999999);
                    $welfare_trans->payment_mode = $request->payment_mode;
                    $welfare_trans->description = $request->description." - added by - ".session('fname');
                    $welfare_trans->transaction_type = 'debit';
                    $welfare_trans->payment_date = Carbon::parse($request->given_date)->format('Y-m-d h:m:s');
                    $welfare_trans->created_at = Carbon::now();
                    $welfare_trans->updated_at = Carbon::now();
                    $welfare_trans->save();  
                    
                    $donor = new Donation_payment_details();

                    $donor->name  =    $request->name;
                    $donor->mobile_no  =    $request->mobile_no;
                    $donor->payment_mode  =    $request->payment_mode;
                    $donor->given_amount  =    $request->given_amount;
                    $donor->address  =    $request->address;
                    $donor->given_date  =    Carbon::parse($request->given_date)->format('Y-m-d h:m:s');
                    $donor->given_by_memberid  =    $request->given_by;
                    $donor->action_by  =    session('user_id');
                    $donor->given_by_name  =    ucwords($givenby->fname." ".$givenby->lname);
                    $donor->transaction_no  =   $welfare_trans->transaction_no;
                    $donor->description  =    $request->description;
                    $donor->aadhaar_no  =    $request->aadhaar_no;
                    $donor->image  =    ($receiver_image) ? $receiver_image : '-';
                    $donor->created_at = Carbon::now();
                    $donor->updated_at = Carbon::now();
                    $donor->save();

                    DB::commit();
                    return redirect()->route('member.addnew-donation')->with('success',"Donation details added successfully! ");
                }
                else{
                    DB::rollback();
                    if($receiver_image!='-'){
                        unlink(public_path('backend_assets/img/donation_people_img/'.$receiver_image));
                    }
                    return redirect()->route('member.addnew-donation')->with('error',"Given Amount should less than avail amount. Avail amount is ".$avail_bal);
                }
            }
            catch(\Exception $e){
                DB::rollback();
                return redirect()->route('member.addnew-donation')->with('error',"Invalid data entered ".$e->getMessage());
            }            
    }
    public function donation_details(){
        $data['pay_list'] = Donation_payment_details::all();
        return view('backend.donation_details',$data);
    }

    public function users_details(){
        return view('backend.users_details');
    }
    public function contactus_details(){
        return view('backend.contactus_details');
    }

    public function debugg(){ 
        
    //    dd(Auth::user());
    return Hash::make("zawed@#156");
    }
    
}


//$2y$10$Odr3xBcZQgBZ.hGRYOffZOjBydNnu5V4VmBkzcnc8RETafu5RMdV6 - danish mobile
// $2y$10$EIXVrb9qEyXejbLt4f1pl.gYchaZETEskh2SiuO2U8kX8Dfo6KCTW - zawed mobie