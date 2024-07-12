<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\State;

use Illuminate\Http\Request;

class Testlist extends Controller
{
    public function index(){
        return State::with('cities')->find(1);
    }

    public function all_city(){
        return City::all("*");
    }

}

