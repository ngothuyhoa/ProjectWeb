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
class admin_thong_tin_qtvController extends Controller
{
    public function dsqtv(){
        $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
     	$bomon=BoMon::all();
     	$admina=Admin::paginate(5);
    	return view('admin.quan_tri_vien.danh_sach_quan_tri_vien',['bomon'=>$bomon,'admin'=>$admin,'admina'=>$admina,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    }
    public function themqtv(){
        $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
    	$bomon=BoMon::all();
    	$adminb = Admin::all();
    	return view('admin.quan_tri_vien.them_quan_tri_vien',['bomon'=>$bomon,'admin'=>$admin,'adminb'=>$adminb,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    }

    public function them(Request $request){
        $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
    	$bomon=BoMon::all();
    	$admina=Admin::paginate(5);
    	//$this->validate($request);
        $them_user= new User;
    	$them_admin = new Admin;
    	$them_admin->user_name=$request->msv;
    	$them_admin->full_name=$request->ten;
    	$them_admin->birthday=$request->ngaysinh;
    	$them_admin->gender=$request->gioitinh;
    	$them_admin->email=$request->email;
    	$them_admin->phone_number=$request->sdt;
    	$them_admin->note=$request->ghichu;

        $them_user->name=$request->msv;
        $them_user->password=bcrypt($request->msv);
    	$them_admin->save();
        $them_user->save();
        return view('admin.quan_tri_vien.them_quan_tri_vien',['bomon'=>$bomon,'admin'=>$admin,'admina'=>$admina,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    }

    public function suaqtv($user_name){
        $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
        $bomon=BoMon::all();
        return view('admin.quan_tri_vien.sua_quan_tri_vien',['bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    }

    public function sua(Request $request,$user_name){
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $admina=Admin::all();
        $bomon=BoMon::all();
        $sua_admin =Admin::where('user_name',$user_name)->first();
        $sua_user= User::where('name',$user_name)->first();
       
        $sua_admin->user_name=$request->msv;
        $sua_admin->full_name=$request->ten;
        $sua_admin->birthday=$request->ngaysinh;
        $sua_admin->gender=$request->gioitinh;
        $sua_admin->email=$request->email;
        $sua_admin->phone_number=$request->sdt;
        $sua_admin->note=$request->ghichu;

        $sua_user->name=$request->msv;
       // $sua_user->password=bcrypt($request->msv);
        $sua_admin->save();
        $sua_user->save();
        
        return redirect('/admin/danh_sach_quan_tri_vien')->with('success','BẠN ĐÃ SỬA THÀNH CÔNG');

    }

    public function xoa($user_name){
        $admina =Admin::where('user_name',$user_name)->first();
        $users=User::where('name',$user_name)->first();
        $users->delete();
        $admina->delete();
        return redirect('admin/danh_sach_quan_tri_vien')->with('success','BẠN ĐÃ XOA THÀNH CÔNG');
    }

    public function pass($user_name){
        $dem=NguyenVongDoAn::all()->count();
    	$a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
        $bomon=BoMon::all();
        return view('admin.quan_tri_vien.doi_pass',['bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);	
    }
    public function getPass($user_name){
        $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
        $bomon=BoMon::all();
        return view('admin.quan_tri_vien.doi_pass',['bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);    
    }
     public function check(Request $request,$user_name){
        $dem=NguyenVongDoAn::all()->count();
    	$a= Session::get('ten');
    	$b=Session::get('pass');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
        $bomon=BoMon::all();
        //$pass_cu=User::where('name',$user_name)->value('password');
        if($request->mat_khau_cu==$b){
        	return view('admin.quan_tri_vien.thuc_hien_doi',['bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);
        }
        elseif ($request->mat_khau_cu!=$b) {
         return redirect('/admin/thong_tin_ca_nhan/doi_mat_khau/'.$a)->with('success','MẬT KHẨU KHÔNG ĐÚNG');
        	
        }

        
    }
    public function doi(Request $request,$user_name){
    	$a= Session::get('ten');
    	$b=Session::get('pass');
        $admin= Admin::where('user_name',$a)->first();
        $loaidoan=LoaiDoAn::all();
        $bomon=BoMon::all();
        //$pass_cu=User::where('name',$user_name)->value('password');
        if($request->mat_khau_moi==$request->xac_nhan){
        	$sua_user= User::where('name',$user_name)->first();
        	$sua_user->password=bcrypt($request->xac_nhan);
        	$sua_user->save();
        	return redirect('/admin/home_admin')->with('success','DOI MẬT KHẨU THANH CONG');
        	
;        }
        else
        	echo "nhap sai";
        	
        }

        
    

}
