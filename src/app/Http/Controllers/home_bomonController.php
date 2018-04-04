<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class home_bomonController extends Controller
{
    public function bomon(){
    	return view('student.danh_sach_bo_mon.home_ds_bo_mon');
    }
}
