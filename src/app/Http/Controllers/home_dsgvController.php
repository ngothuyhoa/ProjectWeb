<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class home_dsgvController extends Controller
{
     public function dsgv(){
    	return view('student.danh_sach_giang_vien.home_ds_gv');
    }
}
