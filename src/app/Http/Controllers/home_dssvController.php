<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SinhVien;
class home_dssvController extends Controller
{
	 public function dssv(){
	 	$sinhvien1 = SinhVien::find(1);
	 	$sinhvien = SinhVien::all();
    	return view('student.danh_sach_sinh_vien.home_ds_sv',['sinhvien'=>$sinhvien,'sinhvien1'=>$sinhvien1]);
    }
}
