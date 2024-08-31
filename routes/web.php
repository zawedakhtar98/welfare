<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CacheController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminController;
use App\Models\Usertype;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**--------- Front web site logic start from here -------------**/
Route::get('/',[FrontController::class,'index'])->name('index');
Route::get('/about-us',[FrontController::class,'about']);
Route::get('/our-work',[FrontController::class,'our_work']);
Route::get('/our-members',[FrontController::class,'our_member']);
Route::get('/joinus',[FrontController::class,'join_us'])->name('joinus');
Route::get('/become-member',[FrontController::class,'become_member']);
Route::post('/save-member-user',[FrontController::class,'join_register']);
Route::get('/city-list',[FrontController::class,'get_city_list']);
Route::get('/contact-us',[FrontController::class,'contact_us']);
Route::post('/contact-us',[FrontController::class,'save_contactus'])->name('contact-us');
Route::post('/duplicate-email-c
k',[FrontController::class,'isUserMobileExist']);
Route::get('/signin',[FrontController::class,'login'])->name('signin')->middleware('alreadysignin');
Route::post('/check-user',[FrontController::class,'checklogin'])->name('check-user');
Route::get('/logout',[FrontController::class,'logout'])->name('logout');

Route::get('/thank-you',function(){
    return view('fronted.thankyou');
});

Route::get('/test',[FrontController::class,'mailm']);
Route::get('islamic',function(){
    return view('fronted.islamic');
});

Route::get('temp',function(){
    $user_type = Role::where('type','member')->first();
    echo $user_type->id;
});

Route::get('/forbidden', function () {
    return view('page-not-auth');
})->name('forbidden');

/**--------- Front web site logic start from here -------------**/    


/**------------ Backend Development start from here -------------**/
// Route::prefix('member')->middleware('isAdminMember')->group(function(){
Route::prefix('member')->group(function(){
    Route::get('/dashboard',[AdminController::class,'index'])->name('member.dashboard');
    
    //members details
    Route::get('/add-member',[AdminController::class,'add_member'])->middleware('isAdminMember')->name('member.add-member');
    Route::post('/save-member',[AdminController::class,'save_member'])->middleware('isAdminMember');
    Route::get('/city-list',[AdminController::class,'get_city_list'])->name('member.city-list');
    Route::get('/member-list',[AdminController::class,'member_list'])->name('member.member-list');
    
    
    Route::get('/pay-for-welfare',[AdminController::class,'pay_for_welfare'])->name('member.pay-for-welfare');
    Route::get('/upload-screenshot',[AdminController::class,'upload_screenshot'])->name('member.upload-screenshot');
    Route::post('/upload-screenshot',[AdminController::class,'save_screenshot'])->name('member.upload-screenshot');
    Route::get('/verify-payments',[AdminController::class,'verify_member_payment'])->middleware('isAdminMember')->name('member.verify-payments');
    Route::post('/verify-payments',[AdminController::class,'checked_member_payment_via_scan'])->middleware('isAdminMember')->name('member.verify-payments');
   
    //welfare payment details
    Route::get('/member-payment-details',[AdminController::class,'member_payment_details'])->name('member.member-payment-details');
    Route::get('/add-member-payment',[AdminController::class,'add_member_payment'])->middleware('isAdminMember')->name('member.add-member-payment');
    Route::post('/save-member-payment',[AdminController::class,'save_member_payment'])->middleware('isAdminMember')->name('member.save-member-payment');
    Route::get('/my-payment-details',[AdminController::class,'my_payment_details'])->name('member.my-payment-details');//this route will return the data of specific member or login member
    Route::get('/payment-details',[AdminController::class,'welfare_payment_details'])->name('member.payment-details');
   
    //donation details
    Route::get('/donation-details',[AdminController::class,'donation_details'])->name('member.donation-details');
    Route::get('/addnew-donation',[AdminController::class,'add_new_donation_details'])->middleware('isAdminMember')->name('member.addnew-donation');
    Route::post('/addnew-donation',[AdminController::class,'save_new_donation_details'])->middleware('isAdminMember')->name('member.addnew-donation');

    Route::get('/users-details',[AdminController::class,'users_details'])->name('member.donation-details');
    Route::get('/contactus-details',[AdminController::class,'contactus_details'])->name('member.donation-details');
    
    Route::get('/test',[AdminController::class,'debugg'])->name('member.test');
});

Route::get('/clear-caches', [CacheController::class, 'clearAllCaches']);


/**------------  Backend Development end -------------**/











