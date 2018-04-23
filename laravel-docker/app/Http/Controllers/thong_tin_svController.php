<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bo_mon;
use App\SinhVien;
use App\users;

class thong_tin_svController extends Controller
{
    public function themsv(){
    	$bomon=bo_mon::all();
    	$sinhvien = SinhVien::all();
    	foreach ($sinhvien as $sv) {
	 		$sv->tenbomon = bo_mon::find($sv->id_bo_mon)->ten_bo_mon;
	 	}
    	return view('admin.sinh_vien.them_sinh_vien',['bomon'=>$bomon]);
    }

    public function them(Request $request){
    	$bomon=bo_mon::all();
    	//$this->validate($request);
        $them_user= new users;
    	$them_sinh_vien = new SinhVien;
    	$them_sinh_vien->user_name=$request->msv;
    	$them_sinh_vien->full_name=$request->ten;
    	$them_sinh_vien->birthday=$request->ngaysinh;
    	$them_sinh_vien->gender=$request->gioitinh;
    	$them_sinh_vien->address=$request->diachi;
    	$them_sinh_vien->email=$request->email;
    	$them_sinh_vien->phone_number=$request->sdt;
    	$them_sinh_vien->class=$request->lop;
		$them_sinh_vien->school_year=$request->khoa;

		$request->bomon = bo_mon::where('ten_bo_mon',$request->bomon)->value('id');
    	$them_sinh_vien->id_bo_mon=$request->bomon;

    	$them_sinh_vien->note=$request->ghichu;

        $them_user->name=$request->msv;
        $them_user->password=bcrypt($request->msv);
    	$them_sinh_vien->save();
        $them_user->save();

    	return view('admin.sinh_vien.them_sinh_vien',['bomon'=>$bomon]);
    	//return view('admin.layout.home_admin',['bomon'=>$bomon]);

    }

    public function suasv($user_name){
        $bomon=bo_mon::all();
        $sinhviena =SinhVien::where('user_name',$user_name)->first();
        return view('admin.sinh_vien.sua_sinh_vien',['bomon'=>$bomon,'sinhviena'=>$sinhviena]);
    }

    public function sua(Request $request,$user_name){
        $sinhviena =SinhVien::where('user_name',$user_name)->first();
        $sinhvien = SinhVien::all();
        $bomon=bo_mon::all();
         $sua_sinh_vien =SinhVien::where('user_name',$user_name)->first();

        $sua_sinh_vien->user_name=$request->msv;
        $sua_sinh_vien->full_name=$request->ten;
        $sua_sinh_vien->birthday=$request->ngaysinh;
        $sua_sinh_vien->gender=$request->gioitinh;
        $sua_sinh_vien->address=$request->diachi;
        $sua_sinh_vien->email=$request->email;
        $sua_sinh_vien->phone_number=$request->sdt;
        $sua_sinh_vien->class=$request->lop;
        $sua_sinh_vien->school_year=$request->khoa;

        $request->bomon = bo_mon::where('ten_bo_mon',$request->bomon)->value('id');
        $sua_sinh_vien->id_bo_mon=$request->bomon;

        $sua_sinh_vien->note=$request->ghichu;
        $sua_sinh_vien->save();

        return redirect('admin/danhsachsinhvien/sua_sv/'.$user_name)->with('thong bao','Ban da sua thanh cong');

        //return view('admin.sinh_vien.sua_sinh_vien',['bomon'=>$bomon,'sinhvien'=>$sinhvien,'sinhviena'=>$sinhviena]);
    }

    public function xoasv($user_name){
       $sinhvien = SinhVien::paginate(5);
       $sinhvien1 = SinhVien::find(1);
        $bomon=bo_mon::all();
        $sinhvienb =SinhVien::where('user_name',$user_name)->first();
        $sinhvienb->delete();
        return redirect('admin/danhsachsinhvien/danh_sach_sinh_vien');
         
    }

}
