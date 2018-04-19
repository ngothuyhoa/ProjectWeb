<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoMon;
use App\GiangVien;
use App\User;
use Session;
use App\Admin;
use App\DoAn;
use App\LoaiDoAn;
use App\NguyenVongDoAn;
class admin_thong_tin_gvController extends Controller
{
     public function dsgv(){
        $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
     	$bomon=BoMon::all();
     	$giangvien=GiangVien::paginate(5);
     	foreach ($giangvien as $gv) {
            $gv->tenbomon = BoMon::find($gv->id_bo_mon)->ten_bo_mon;
        }
    	return view('admin.giang_vien.danh_sach_gv',['bomon'=>$bomon,'giangvien'=>$giangvien,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    }
    
     public function postdsgv(){
        $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
        $bomon=BoMon::all();
        $giangvien=GiangVien::paginate(5);
        foreach ($giangvien as $gv) {
            $gv->tenbomon = BoMon::find($gv->id_bo_mon)->ten_bo_mon;
        }
        return view('admin.giang_vien.danh_sach_gv',['bomon'=>$bomon,'giangvien'=>$giangvien,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    }

    public function themgv(){
        $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
    	$bomon=BoMon::all();
    	$giangvien = GiangVien::all();
    	foreach ($giangvien as $gv) {
	 		$gv->tenbomon = BoMon::find($gv->id_bo_mon)->ten_bo_mon;
	 	}
    	return view('admin.giang_vien.them_giang_vien',['bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    }

    public function them(Request $request){
        $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
    	$bomon=BoMon::all();
    	$giangvien=GiangVien::paginate(5);
    	$this->validate($request,
            [
                'msv'=>'|max:10|unique:giang_vien,user_name',
            ],
            [
                'msv'=>'Nhieu nhat 10 ky tu',
                'msv.unique'=>'Ma đã tồn tại',
            ]
        );
        $them_user= new User;
    	$them_giang_vien = new GiangVien;
    	$them_giang_vien->user_name=$request->msv;
    	$them_giang_vien->full_name=$request->ten;
    	$them_giang_vien->birthday=$request->ngaysinh;
    	$them_giang_vien->gender=$request->gioitinh;
    	$them_giang_vien->email=$request->email;
    	$them_giang_vien->phone_number=$request->sdt;

		$request->bomon = BoMon::where('ten_bo_mon',$request->bomon)->value('id');
    	$them_giang_vien->id_bo_mon=$request->bomon;

    	$them_giang_vien->note=$request->ghichu;

        $them_user->name=$request->msv;
        $them_user->password=bcrypt($request->msv);
    	$them_giang_vien->save();
        $them_user->save();
        return view('admin.giang_vien.them_giang_vien',['bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    
}

	public function suagv($user_name){
        $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $bomon=BoMon::all();
        $loaidoan=LoaiDoAn::all();
        $giangviena =GiangVien::where('user_name',$user_name)->first();
        return view('admin.giang_vien.sua_giang_vien',['bomon'=>$bomon,'giangviena'=>$giangviena,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    }

    public function sua(Request $request,$user_name){
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $giangviena =GiangVien::where('user_name',$user_name)->first();
        $giangvien = GiangVien::all();
        $bomon=BoMon::all();
        $sua_giang_vien =giangVien::where('user_name',$user_name)->first();
        $sua_user= User::where('name',$user_name)->first();
        $sua_giang_vien->user_name=$request->mgv;
        $sua_giang_vien->full_name=$request->ten;
        $sua_giang_vien->birthday=$request->ngaysinh;
        $sua_giang_vien->gender=$request->gioitinh;
        $sua_giang_vien->email=$request->email;
        $sua_giang_vien->phone_number=$request->sdt;

        $request->bomon = BoMon::where('ten_bo_mon',$request->bomon)->value('id');
        $sua_giang_vien->id_bo_mon=$request->bomon;

        $sua_giang_vien->note=$request->ghichu;
        $sua_user->name=$request->mgv;
        $sua_user->password=bcrypt($request->mgv);
        $sua_giang_vien->save();
        $sua_user->save();

        return redirect('admin/danh_sach_giang_vien/sua_gv/'.$request->mgv)->with('success','BẠN ĐÃ SỬA THÀNH CÔNG');

        
    }

    public function xoagv($user_name){
       $giangvien = GiangVien::paginate(5);
      // $sinhvien1 = SinhVien::find(1);
        $bomon=BoMon::all();
        $giangvienb =GiangVien::where('user_name',$user_name)->first();
        $users=User::where('name',$user_name)->first();

        //tim id giang vien bi xoa trong bang sinh vien roi xoa trong bang do an
        $gv=GiangVien::where('user_name',$user_name)->value('id');
        $do_an=DoAn::where('id_giang_vien',$gv)->delete();  
        $users->delete();
        $giangvienb->delete();
       
       // return redirect('admin/danhsachsinhvien/danh_sach_sinh_vien');
        return redirect('admin/danh_sach_giang_vien'); 
    }

    public function getloc($id){
        $dem=NguyenVongDoAn::all()->count();
        $loaidoan=LoaiDoAn::all();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $bomon=BoMon::all();
        //$sinhvien1 = SinhVien::find(1);
        $giangvien = GiangVien::where('id_bo_mon',$id)->paginate(5);
        foreach ($giangvien as $gv) {
            $gv->tenbomon = BoMon::find($gv->id_bo_mon)->ten_bo_mon;
            $gv->ten_viet_tat=BoMon::find($gv->id_bo_mon)->ten_bo_mon_viet_tat;
        }
        return view('admin.giang_vien.danh_sach_gv',['giangvien'=>$giangvien,'bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);


    }

    public function loc($id){
        $dem=NguyenVongDoAn::all()->count();
       $loaidoan=LoaiDoAn::all();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $bomon=BoMon::all();
       
        $giangvien = GiangVien::where('id_bo_mon',$id)->paginate(5);
        foreach ($giangvien as $gv) {
            $gv->tenbomon = BoMon::find($gv->id_bo_mon)->ten_bo_mon;
            $gv->ten_viet_tat=BoMon::find($gv->id_bo_mon)->ten_bo_mon_viet_tat;
        }
        return view('admin.giang_vien.danh_sach_gv',['giangvien'=>$giangvien,'bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);


    }
}
