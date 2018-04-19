<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoMon;
use Session;
use App\Admin;
use App\LoaiDoAn;
use App\NguyenVongDoAn;
class admin_thong_tin_bmController extends Controller
{
    public function dsbm(){
        $dem=NguyenVongDoAn::all()->count();
       $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
        $bomon=BoMon::all();
        $bomon1 = BoMon::paginate(5);
        return view('admin.bo_mon.danh_sach_bm',['bomon1'=>$bomon1,'bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    }
    public function thembm(){
        $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
    	$bomon=BoMon::all();
    	return view('admin.bo_mon.them_bo_mon',['bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    }

     public function them(Request $request){
        $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
    	$bomon=BoMon::all();
    	$them_bo_mon = new BoMon;
    	$them_bo_mon->id=$request->id_bm;
    	$them_bo_mon->ten_bo_mon=$request->ten_bm;
    	$them_bo_mon->ten_bo_mon_viet_tat=$request->ten_viet_tat;
    	$them_bo_mon->van_phong=$request->van_phong;
    	$them_bo_mon->SDT=$request->sdt;
    	$them_bo_mon->website=$request->website;
    	$them_bo_mon->note=$request->ghichu;
    	$them_bo_mon->save();
    	return view('admin.bo_mon.them_bo_mon',['bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    }

    public function suabm($id){
        $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
    	$bomon=BoMon::all();
    	$bomona=BoMon::find($id);
    	return view('admin.bo_mon.sua_bo_mon',['bomona'=>$bomona,'bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    	//echo "hihi";
    }
    public function sua(Request $request, $id){
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
    	$sua_bo_mon=BoMon::where('id',$id)->first();
    	$sua_bo_mon->ten_bo_mon=$request->ten_bm;
    	$sua_bo_mon->ten_bo_mon_viet_tat=$request->ten_viet_tat;
    	$sua_bo_mon->van_phong=$request->van_phong;
    	$sua_bo_mon->SDT=$request->sdt;
    	$sua_bo_mon->website=$request->website;
    	$sua_bo_mon->note=$request->ghichu;
    	$sua_bo_mon->save();
    	return redirect('admin/danh_sach_bo_mon/sua_bm/'.$id);
    }

    public function xoabm($id){
       $bomon = BoMon::paginate(5);
        //$bomon=BoMon::all();
        $bomona =BoMon::where('id',$id)->first();
        $bomona->delete();
       // return redirect('admin/danhsachsinhvien/danh_sach_sinh_vien');
        return redirect('admin/danh_sach_bo_mon'); 
    }
}
