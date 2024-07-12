<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $fillable =["name","is_deleted"];

    public function cities(){
        return $this->hasMany(City::class);
    }

    public function users(){
        return $this->hasManyThrough(User::class,City::class);
    }

}
