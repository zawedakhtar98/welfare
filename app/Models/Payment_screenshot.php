<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_screenshot extends Model
{
    use HasFactory;
    protected $table = 'payment_screenshot';

    public function user(){
        return $this->belongsTo(User::class,'member_id');
    }
}
