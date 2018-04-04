<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SinhVien;

class home_studentController extends Controller
{
     public function homestudent(){
     	$sinhvien1 = SinhVien::where('MSV','20155615')->first();
    	return view('student.layout.home_admin',['sinhvien1'=>$sinhvien1]);
    }
}
