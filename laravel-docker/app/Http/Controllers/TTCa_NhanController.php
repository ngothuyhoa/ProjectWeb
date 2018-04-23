<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TTCa_NhanController extends Controller
{
    public function capnhat(){
    	return view('admin.tt_ca_nhan.Update_TT_Ca_Nhan');
    }
}
