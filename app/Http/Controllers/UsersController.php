<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index(){
        return view('user');
    }

    public function add_new_user($id=''){
        return "<h2>create new user function is called ". $id."</h2>";
    }

    public function update_user($id){
        return "<h2> User update function is called ".$id."</h2>";
    }
}
