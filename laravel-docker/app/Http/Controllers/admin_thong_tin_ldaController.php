<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SinhVien;
use App\BoMon;
use App\DoAn;
use Session;
use App\Admin;
use App\GiangVien;
use App\LoaiDoAn;
use App\NguyenVongDoAn;
class admin_thong_tin_ldaController extends Controller
{
    public function dslda(){
        $dem=NguyenVongDoAn::all()->count();
       $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $bomon=BoMon::all();
        $loaidoan = LoaiDoAn::paginate(5);
        return view('admin.loai_do_an.danh_sach_loai_do_an',['loaidoan'=>$loaidoan,'bomon'=>$bomon,'admin'=>$admin,'dem'=>$dem]);
    }
    public function getthemlda(){
        $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
        $bomon=BoMon::all();
        return view('admin.loai_do_an.them_loai_do_an',['bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    }
    public function themlda(){
        $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
    	$bomon=BoMon::all();
    	return view('admin.loai_do_an.them_loai_do_an',['bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    }
    public function them(Request $request){
        $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
    	$bomon=BoMon::all();
    	$them_loai_do_an = new LoaiDoAn;
    	$them_loai_do_an->ten=$request->ten_lda;
    	$them_loai_do_an->save();
    	return redirect('admin/danh_sach_loai_do_an/them_lda')->with('success','BẠN ĐÃ THÊM THÀNH CÔNG');

    }

    public function sua(Request $request,$id){
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $bomon=BoMon::all();
        $sua_loai_do_an =LoaiDoAn::where('id',$id)->first();      
        $sua_loai_do_an->ten=$request->ten_loai_do_an;      
        $sua_loai_do_an->save();
        //$sinhviens=SinhVien::where('user_name',$request->msv)->first();
        return redirect('admin/danh_sach_loai_do_an')->with('success','BẠN ĐÃ SỬA THÀNH CÔNG');

    }
  
    public function xoa($id){
        $bomon=BoMon::all();
        $xoa_loai_do_an =LoaiDoAn::where('id',$id)->first();
        $xoa_loai_do_an->delete();
       // return redirect('admin/danhsachsinhvien/danh_sach_sinh_vien');
        return redirect('admin/danh_sach_loai_do_an')->with('success','BẠN ĐÃ XOA THÀNH CÔNG');
    }
}
