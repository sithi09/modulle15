<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        return view('hello');
    }

    public function profile(){
        $name = "mr. X";
        
        return view('profile')->with('name', $name);


    }
}
