<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class change_passwordController extends Controller
{
    public function change_password(){
    	return view('student.tt_ca_nhan.home_password');
    }
}
