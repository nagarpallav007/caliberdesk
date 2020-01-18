<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class welcomeController extends Controller
{
    //Index Method
    public function index()
    {
		$test  = array(); 
   		return view('fronted.welcome', compact('test'));


    }
}
