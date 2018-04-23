<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SinhVien;
use App\bo_mon;
use App\admin;

class home_dssvController extends Controller
{
	 public function dssv(){
	 	$admin= admin::where('user_name',$username)->first();
	 	$bomon=bo_mon::all();
	 	$sinhvien1 = SinhVien::find(1);
	 	$sinhvien = SinhVien::paginate(5);
	 	foreach ($sinhvien as $sv) {
	 		$sv->tenbomon = bo_mon::find($sv->id_bo_mon)->ten_bo_mon;
	 	}
    	return view('admin.sinh_vien.danh_sach_sv',['sinhvien'=>$sinhvien,'sinhvien1'=>$sinhvien1,'bomon'=>$bomon,'admin'=>$admin]);
    }
}
