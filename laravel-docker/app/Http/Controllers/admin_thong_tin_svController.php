<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoMon;
use App\SinhVien;
use App\User;
use App\Admin;
use Session;
use App\DoAn;
use App\LoaiDoAn;
use App\NguyenVongDoAn;
class admin_thong_tin_svController extends Controller
{

public function dssv(){
    $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
        $bomon=BoMon::all();
        $sinhvien1 = SinhVien::find(1);
        $sinhvien = SinhVien::paginate(5);
        foreach ($sinhvien as $sv) {
            $sv->tenbomon = BoMon::find($sv->id_bo_mon)->ten_bo_mon;
            $sv->ten_viet_tat=BoMon::find($sv->id_bo_mon)->ten_bo_mon_viet_tat;
        }
        return view('admin.sinh_vien.danh_sach_sv',['sinhvien'=>$sinhvien,'sinhvien1'=>$sinhvien1,'bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    }
    public function postdssv(){
        $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
        $bomon=BoMon::all();
        $sinhvien1 = SinhVien::find(1);
        $sinhvien = SinhVien::paginate(5);
        foreach ($sinhvien as $sv) {
            $sv->tenbomon = BoMon::find($sv->id_bo_mon)->ten_bo_mon;
            $sv->ten_viet_tat=BoMon::find($sv->id_bo_mon)->ten_bo_mon_viet_tat;
        }
        return view('admin.sinh_vien.danh_sach_sv',['sinhvien'=>$sinhvien,'sinhvien1'=>$sinhvien1,'bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    }
    public function getthemsv(){
        $dem=NguyenVongDoAn::all()->count();
        $loaidoan=LoaiDoAn::all();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $bomon=BoMon::all();
        $sinhvien = SinhVien::all();
        foreach ($sinhvien as $sv) {
            $sv->tenbomon = BoMon::find($sv->id_bo_mon)->ten_bo_mon;
        }
        return view('admin.sinh_vien.them_sinh_vien',['bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    }
    public function themsv(){
        $dem=NguyenVongDoAn::all()->count();
        $loaidoan=LoaiDoAn::all();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
    	$bomon=BoMon::all();
    	$sinhvien = SinhVien::all();
    	foreach ($sinhvien as $sv) {
	 		$sv->tenbomon = BoMon::find($sv->id_bo_mon)->ten_bo_mon;
	 	}
    	return view('admin.sinh_vien.them_sinh_vien',['bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    }

    public function them(Request $request){
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
    	$bomon=BoMon::all();
    	//$this->validate($request);
        $this->validate($request,
            [
                'msv'=>'|max:10|unique:sinh_vien,user_name',
                'sdt'=>'|max:15|',
                'email'=>'|email|',
            ],
            [
                'msv.max'=>'MSV KHÔNG ĐƯỢC VƯỢT QUÁ 10 KÝ TỰ',
                'msv.unique'=>'MÃ ĐÃ TỒN TẠI',
                'sdt.max'=>'SDT KHÔNG ĐƯỢC VƯỢT QUÁ 15 KÝ TỰ',
                'email.email'=>'NHẬP SAI EMAIL',
            ]
        );
        $them_user= new User;
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

		$request->bomon = BoMon::where('ten_bo_mon',$request->bomon)->value('id');
    	$them_sinh_vien->id_bo_mon=$request->bomon;

    	$them_sinh_vien->note=$request->ghichu;

        $them_user->name=$request->msv;
        $them_user->password=bcrypt($request->msv);
    	$them_sinh_vien->save();
        $them_user->save();

    	return redirect('admin/danh_sach_sinh_vien/them_sv')->with('success','BẠN ĐÃ THÊM THÀNH CÔNG');
    	//return view('admin.layout.home_admin',['bomon'=>$bomon]);

    }


    public function sua(Request $request,$user_name){
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $sinhviena =SinhVien::where('user_name',$user_name)->first();
        $sinhvien = SinhVien::all();
        $bomon=BoMon::all();
        $this->validate($request,
            [
                'msv'=>'|max:10|',
                'sdt'=>'|max:15|',
                
            ],
            [
                'msv.max'=>'MSV KHÔNG ĐƯỢC VƯỢT QUÁ 10 KÝ TỰ',
                'sdt.max'=>'SDT KHÔNG ĐƯỢC VƯỢT QUÁ 15 KÝ TỰ',
                
            ]
        );
        $sua_sinh_vien =SinhVien::where('user_name',$user_name)->first();
        $sua_user= User::where('name',$user_name)->first();     
        $sua_sinh_vien->user_name=$request->msv;
        $sua_sinh_vien->full_name=$request->ten;
        $sua_sinh_vien->birthday=$request->ngaysinh;
        $sua_sinh_vien->gender=$request->gioitinh;
        $sua_sinh_vien->address=$request->diachi;
        $sua_sinh_vien->email=$request->email;
        $sua_sinh_vien->phone_number=$request->sdt;
        $sua_sinh_vien->class=$request->lop;
        $sua_sinh_vien->school_year=$request->khoa;

        $request->bomon=BoMon::where('ten_bo_mon_viet_tat',$request->bomon)->value('id');
        $sua_sinh_vien->id_bo_mon=$request->bomon;
        $sua_sinh_vien->note=$request->ghichu;

        $sua_user->name=$request->msv;
        $sua_user->password=bcrypt($request->msv);
        $sua_sinh_vien->save();
        $sua_user->save();
        //$sinhviens=SinhVien::where('user_name',$request->msv)->first();
        return redirect('admin/danh_sach_sinh_vien')->with('success','BẠN ĐÃ SỬA THÀNH CÔNG');

        //return view('admin.sinh_vien.sua_sinh_vien',['bomon'=>$bomon,'sinhvien'=>$sinhvien,'sinhviena'=>$sinhviena,'sua_sinh_vien'=>$sua_sinh_vien]);
    }

    public function xoasv($user_name){
       $sinhvien = SinhVien::paginate(5);
       $sinhvien1 = SinhVien::find(1);
        $bomon=BoMon::all();
        $sinhvienb =SinhVien::where('user_name',$user_name)->first();
        $users=User::where('name',$user_name)->first();
        
        //tim id sinh vien bi xoa trong bang sinh vien roi xoa trong bang do an
        $sv=SinhVien::where('user_name',$user_name)->value('id');
        $do_an=DoAn::where('id_sinh_vien',$sv)->delete();

        $users->delete();
        $sinhvienb->delete();
       // return redirect('admin/danhsachsinhvien/danh_sach_sinh_vien');
        return redirect('admin/danh_sach_sinh_vien')->with('success','BẠN ĐÃ XÓA THÀNH CÔNG');;
    }

    public function getloc($id){
        $dem=NguyenVongDoAn::all()->count();
       $loaidoan=LoaiDoAn::all();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $bomon=BoMon::all();
        $sinhvien1 = SinhVien::find(1);
        $sinhvien = SinhVien::where('id_bo_mon',$id)->paginate(5);
        foreach ($sinhvien as $sv) {
            $sv->tenbomon = BoMon::find($sv->id_bo_mon)->ten_bo_mon;
            $sv->ten_viet_tat=BoMon::find($sv->id_bo_mon)->ten_bo_mon_viet_tat;
        }
        return view('admin.sinh_vien.danh_sach_sv',['sinhvien'=>$sinhvien,'sinhvien1'=>$sinhvien1,'bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);


    }

    public function loc($id){
        $dem=NguyenVongDoAn::all()->count();
       $loaidoan=LoaiDoAn::all();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $bomon=BoMon::all();
        $sinhvien1 = SinhVien::find(1);
        $sinhvien = SinhVien::where('id_bo_mon',$id)->paginate(5);
        foreach ($sinhvien as $sv) {
            $sv->tenbomon = BoMon::find($sv->id_bo_mon)->ten_bo_mon;
            $sv->ten_viet_tat=BoMon::find($sv->id_bo_mon)->ten_bo_mon_viet_tat;
        }
        return view('admin.sinh_vien.danh_sach_sv',['sinhvien'=>$sinhvien,'sinhvien1'=>$sinhvien1,'bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);


    }

}
