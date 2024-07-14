<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_user extends Model
{
    use HasFactory;

    public $table = 'role_user';
    public $timestamps = false;

    public function role(){
        return $this->belongsTo(Role::class);
    }
}
