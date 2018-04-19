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
class home_giangvienController extends Controller
{
     public function dssv(){

     	$a= Session::get('ten');
        $giangvien= GiangVien::where('user_name',$a)->value('id');
     	$bomon=BoMon::all();
        $loaidoan=LoaiDoAn::all();
     	$do_an=DoAn::where('id_giang_vien',$giangvien)->paginate(5);
     	foreach ($do_an as $da) {
     		$da->ten=SinhVien::find($da->id_sinh_vien)->full_name;
     		$da->lop=SinhVien::find($da->id_sinh_vien)->class;
     		$da->khoa=SinhVien::find($da->id_sinh_vien)->school_year;
            $da->ma_sv=SinhVien::find($da->id_sinh_vien)->user_name;

     		$da->ma_gv=GiangVien::find($giangvien)->user_name;
            $da->gvhd=GiangVien::find($giangvien)->full_name;
     		$da->emailgv=GiangVien::find($da->id_giang_vien)->email;
     		$da->idbomon=GiangVien::find($da->id_giang_vien)->id_bo_mon;
     		$da->bomon=BoMon::find($da->idbomon)->ten_bo_mon;
     		$da->loaidoan=LoaiDoAn::find($da->id_loai_do_an)->ten;
     	
            //lay ra ten viet tat cua bo mon theo id giang vien o bang do an
            $da->id_bm=GiangVien::find($da->id_giang_vien)->id_bo_mon;
            $da->ten_viet_tat=BoMon::find($da->id_bm)->ten_bo_mon_viet_tat;
            // //lay ra ten loai do an
             $da->ten_da=LoaiDoAn::find($da->id_loai_do_an)->ten; 

     	}
     	
    	return view('giangvien.layout.danh_sach_sinh_vien',['bomon'=>$bomon,'do_an'=>$do_an,'giangvien'=>$giangvien,'loaidoan'=>$loaidoan]);
    }

    public function suada(Request $request,$id){
	    $a= Session::get('ten');
        $do_an=DoAn::all();
        $giangvien= GiangVien::where('user_name',$a)->first();

    	$sua_do_an=DoAn::where('id',$id)->first();
    	$sua_do_an->diem=$request->diem;
    	$sua_do_an->note=$request->note;
    	$sua_do_an->save();
    	return redirect('/giangvien/home_giangvien')->with('success','BẠN ĐÃ SỬA THÀNH CÔNG');
    }

     public function file(Request $request, $id){
        $a= Session::get('ten');
        $do_an=DoAn::where('id',$id)->first();
        $giangvien= GiangVien::where('user_name',$a)->first();
        $bomon=BoMon::all();
       return view('giangvien.file.xu_ly_file',['admin'=>$admin,'bomon'=>$bomon,'do_an'=>$do_an]);
    }

    public function getDownload(Request $request,$id){
         $dowload_file=DoAn::where('id',$id)->value('file_bao_cao');
        $file="upload/$dowload_file";
        return Response::download($file);
}

}
