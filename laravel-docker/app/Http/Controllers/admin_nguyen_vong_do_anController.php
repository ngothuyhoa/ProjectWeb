<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\Nguyen_Vong_Do_An;
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

class admin_nguyen_vong_do_anController extends Controller
{
    public function duyetnv(){
    	$a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $bomon=BoMon::all();
        $loaidoan=LoaiDoAn::all();
        $nv_do_an=NguyenVongDoAn::paginate(5);
         $dem=NguyenVongDoAn::all()->count();
        foreach ($nv_do_an as $nv_da) {
            $nv_da->ten=SinhVien::find($nv_da->id_sinh_vien)->full_name;
            $nv_da->lop=SinhVien::find($nv_da->id_sinh_vien)->class;
            $nv_da->khoa=SinhVien::find($nv_da->id_sinh_vien)->school_year;
            $nv_da->ma_sv=SinhVien::find($nv_da->id_sinh_vien)->user_name;

            $nv_da->ma_gv=GiangVien::find($nv_da->id_giang_vien)->user_name;
            $nv_da->gvhd=GiangVien::find($nv_da->id_giang_vien)->full_name;
            $nv_da->emailgv=GiangVien::find($nv_da->id_giang_vien)->email;
            $nv_da->idbomon=GiangVien::find($nv_da->id_giang_vien)->id_bo_mon;
            $nv_da->bomon=BoMon::find($nv_da->idbomon)->ten_bo_mon;
            $nv_da->loaidoan=LoaiDoAn::find($nv_da->id_loai_do_an)->ten;

            //lay ra ten viet tat cua bo mon theo id giang vien o bang do an
            $nv_da->id_bm=GiangVien::find($nv_da->id_giang_vien)->id_bo_mon;
            $nv_da->ten_viet_tat=BoMon::find($nv_da->id_bm)->ten_bo_mon_viet_tat;
            //lay ra ten loai do an
            $nv_da->ten_da=LoaiDoAn::find($nv_da->id_loai_do_an)->ten;

        
        }
        return view('admin.nv_do_an.danh_sach_nguyen_vong',['bomon'=>$bomon,'nv_do_an'=>$nv_do_an,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);
    }

    public function duyet($id){
    	$a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $bomon=BoMon::all();
        $loaidoan=LoaiDoAn::all();
        $nv_do_an=NguyenVongDoAn::find($id);
        $dem=NguyenVongDoAn::all()->count();
       	$them_do_an=new DoAn();
        $them_do_an->id_sinh_vien=$nv_do_an->id_sinh_vien;
        $them_do_an->id_giang_vien=$nv_do_an->id_giang_vien;
        $them_do_an->id_loai_do_an=$nv_do_an->id_loai_do_an;
        $them_do_an->ten_de_tai=$nv_do_an->ten_de_tai;
        $them_do_an->hoc_ky=$nv_do_an->hoc_ky;

        //tim bo mon theo giang vien
        $tim_bm=GiangVien::find($nv_do_an->id_giang_vien)->id_bo_mon;
        $them_do_an->id_bo_mon=$tim_bm;
       	$them_do_an->save();      
        $nv_do_an->delete();

        //lay ra dia chi mail cua sinh vien;
        $email=SinhVien::find($them_do_an->id_sinh_vien)->email;
        //gui mail
        $mail=$email;
        Mail::to($mail)->send(new Nguyen_Vong_Do_An);
       	return redirect('admin/duyet_do_an')->with('success','BẠN ĐÃ DUYET THÀNH CÔNG');


    }

    public function mail(){
        $mail='20155615@student.hust.edu.vn';
        Mail::to($mail)->send(new Nguyen_Vong_Do_An);
        dd('mail send successfully');
    }
}
