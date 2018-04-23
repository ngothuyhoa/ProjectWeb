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
use Response;
use App\NguyenVongDoAn;
use Illuminate\Support\collection;
class home_adminController extends Controller
{

     public function homestudent(){
     	$a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $bomon=BoMon::all();
        $loaidoan=LoaiDoAn::all();
        $do_an = DoAn::paginate(5);
        //$do=$collection->sortByDesc('id');
       // $do_an=$collection->paginate(5);
       // echo $do_an;
//dem ban ghi
        $dem=NguyenVongDoAn::all()->count();
        
         foreach ($do_an as $da) {
            $da->ten=SinhVien::find($da->id_sinh_vien)->full_name;
            $da->lop=SinhVien::find($da->id_sinh_vien)->class;
            $da->khoa=SinhVien::find($da->id_sinh_vien)->school_year;
            $da->ma_sv=SinhVien::find($da->id_sinh_vien)->user_name;

            $da->ma_gv=GiangVien::find($da->id_giang_vien)->user_name;
            $da->gvhd=GiangVien::find($da->id_giang_vien)->full_name;
            $da->emailgv=GiangVien::find($da->id_giang_vien)->email;
            $da->idbomon=GiangVien::find($da->id_giang_vien)->id_bo_mon;
            $da->bomon=BoMon::find($da->idbomon)->ten_bo_mon;
            $da->loaidoan=LoaiDoAn::find($da->id_loai_do_an)->ten;

            //lay ra ten viet tat cua bo mon theo id giang vien o bang do an
            $da->id_bm=GiangVien::find($da->id_giang_vien)->id_bo_mon;
            $da->ten_viet_tat=BoMon::find($da->id_bm)->ten_bo_mon_viet_tat;
            //lay ra ten loai do an
            $da->ten_da=LoaiDoAn::find($da->id_loai_do_an)->ten;

        
        }
        
       return view('admin.do_an.phan_cong_do_an',['bomon'=>$bomon,'do_an'=>$do_an,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    }

    public function getthemda(){
       // $do_an=DoAn::where('id_bo_mon',1);
        Session::put('ten_bm','All');
        $ten=Session::get('ten_bm');
        $dem=NguyenVongDoAn::all()->count();
        $giangvien=GiangVien::all();      
        $loaidoan=LoaiDoAn::all();
        $bomon=BoMon::all();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        return view('admin.do_an.them_do_an',['bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'giangvien'=>$giangvien,'dem'=>$dem,'ten'=>$ten]);
    }

    public function themda(){
       // $do_an=DoAn::where('id_bo_mon',1);
        Session::put('ten_bm','All');
        $ten=Session::get('ten_bm');
        $dem=NguyenVongDoAn::all()->count();
        $giangvien=GiangVien::all();      
    	$loaidoan=LoaiDoAn::all();
    	$bomon=BoMon::all();
    	$a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        return view('admin.do_an.them_do_an',['bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'giangvien'=>$giangvien,'dem'=>$dem,'ten'=>$ten]);
    }

    public function chongv(Request $request,$id){
        $dem=NguyenVongDoAn::all()->count();
        $loaidoan=LoaiDoAn::all();
        $bomon=BoMon::all();
        $ten=$request->ten_bm;
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
         $giangvien=GiangVien::where('id_bo_mon',$id)->get();  
         return view('admin.do_an.them_do_an',['bomon'=>$bomon,'admin'=>$admin,'loaidoan'=>$loaidoan,'giangvien'=>$giangvien,'dem'=>$dem,'ten'=>$ten]);
    }

    public function them(Request $request){
        $ten=$request->ten_bm;
        $dem=NguyenVongDoAn::all()->count();
        $giangvien=GiangVien::all();
    	$a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
    	$bomon=BoMon::all();
    	$loaidoan=LoaiDoAn::all();
    	$them_do_an=new DoAn();
    	$request->ma_sv=SinhVien::where('user_name',$request->ma_sv)->value('id');
    	$them_do_an->id_sinh_vien=$request->ma_sv;

    	$request->ma_gv=GiangVien::where('full_name',$request->ma_gv)->value('id');
    	$them_do_an->id_giang_vien=$request->ma_gv;


    	$request->loaidoan=LoaiDoAn::where('ten',$request->loaidoan)->value('id');
    	$them_do_an->id_loai_do_an=$request->loaidoan;

    	$them_do_an->ten_de_tai=$request->ten_de_tai;

    	if($request->hasFile('filesTest')){
     		$file = $request->file('filesTest');
     		//Lấy Đuôi File
			$ext = $file->getClientOriginalExtension();
			$url =rand(1,100000) . "_" . $file->getClientOriginalName(); 
			$file->move("upload",$url);
			$them_do_an->file_bao_cao=$url;
			
     	}
        $idbomon=GiangVien::find($request->ma_gv)->id_bo_mon;
        $them_do_an->id_bo_mon=$idbomon;
     	$them_do_an->hoc_ky=$request->hoc_ky;
     	//$them_do_an->diem=$request->diem;
     	$them_do_an->note=$request->ghichu;

     	$them_do_an->save();

     	return redirect('/admin/them_do_an')->with('success','BẠN ĐÃ THÊM THÀNH CÔNG');
}

	public function suada(Request $request,$id){
	    $a= Session::get('ten');
        $do_an=DoAn::all();
        $admin= Admin::where('user_name',$a)->first();
    	$sua_do_an=DoAn::where('id',$id)->first();
    	$sua_do_an->ten_de_tai=$request->ten_de_tai;
        //lay ra id sinh vien trong bang sinh vien
        $request->msv=SinhVien::where('user_name',$request->msv)->value('id');
        $sua_do_an->id_sinh_vien=$request->msv;
        //lay ra id giang vien trong bang giang vien
        $request->mgv=GiangVien::where('user_name',$request->mgv)->value('id');
        $sua_do_an->id_giang_vien=$request->mgv;
    	$sua_do_an->hoc_ky=$request->hoc_ky;
    	$sua_do_an->diem=$request->diem;
        $request->loai_da=LoaiDoAn::where('ten',$request->loai_da)->value('id');
        $sua_do_an->id_loai_do_an=$request->loai_da;
        $idbomon=GiangVien::find($request->mgv)->id_bo_mon;
        $sua_do_an->id_bo_mon=$idbomon;
    	$sua_do_an->save();
    	return redirect('/admin/home_admin')->with('success','BẠN ĐÃ SỬA THÀNH CÔNG');
	    }

	public function xoada($id){
	       $do_an = DoAn::paginate(5);
	        //$bomon=BoMon::all();
	        $do_an_a =DoAn::where('id',$id)->first();
	        $do_an_a->delete();
	       // return redirect('admin/danhsachsinhvien/danh_sach_sinh_vien');
	        return redirect('/admin/home_admin')->with('success','BẠN ĐÃ XÓA THÀNH CÔNG');; 
	    }

    public function file(Request $request, $id){
         $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $loaidoan=LoaiDoAn::all();
        $do_an=DoAn::where('id',$id)->first();
        $admin= Admin::where('user_name',$a)->first();
        $bomon=BoMon::all();
       return view('admin.do_an.xu_ly_file',['admin'=>$admin,'bomon'=>$bomon,'do_an'=>$do_an,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    }

    public function sua_file(Request $request,$id){
        $sua_file=DoAn::where('id',$id)->first();
        if($request->hasFile('filesTest')){
            $file = $request->file('filesTest');
            //Lấy Đuôi File
            $ext = $file->getClientOriginalExtension();
            $url =rand(1,100000) . "_" . $file->getClientOriginalName(); 
            $file->move("upload",$url);
            $sua_file->file_bao_cao=$url;   
        }
        $sua_file->save();
        return redirect('/admin/file_bao_cao/'.$id)->with('success','BẠN ĐÃ UPLOAD FILE THÀNH CÔNG');
    }

    public function getDownload(Request $request,$id){
        $dowload_file=DoAn::where('id',$id)->value('file_bao_cao');
        $file="upload/$dowload_file";
        return Response::download($file);
}
}
