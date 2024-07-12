<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_payment_details extends Model
{
    use HasFactory;
    protected $fillable = ['id','amount','user_id','transaction_no','payment_mode','payment_date'];

    public function transaction(){
        return $this->belongsTo(Welfare_transaction::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
