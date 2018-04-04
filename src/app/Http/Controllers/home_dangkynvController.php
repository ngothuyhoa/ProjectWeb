<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SinhVien;

class home_dangkynvController extends Controller
{
     public function dangky(){
     	$sinhvien1 = SinhVien::find(1);
    	return view('student.dang_ky_nguyen_vong.home_dang_ky_nguyen_vong',['sinhvien1'=>$sinhvien1]);
    }
}
