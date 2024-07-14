<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function roles(){
        // return $this->belongsToMany(Role::class,'user_role','user_id','role_id');
        return $this->belongsToMany(Role::class);
    }

    public function usertype(){
        return $this->belongsTo(Role_user::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function state(){
        return $this->belongsTo(State::class);
    }
    public function payment_details(){
        return $this->hasMany(Users_payment_details::class);
    }    
    //member payment screenshot details 
    public function payment_screenshot(){
        return $this->hasMany(Payment_screenshot::class,"member_id");
    }

}
