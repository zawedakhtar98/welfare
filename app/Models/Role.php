<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $fillable  = ['type']; 

    public function users(){
        return $this->belongsToMany(Role::class);
    }

    public function usertype(){
        return $this->hasMany(Usertype::class);
    }
}
