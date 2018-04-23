<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DoAn;
use Session;
use App\BoMon;
use App\Admin;
use App\LoaiDoAn;
use Response;
use App\SinhVien;
use App\GiangVien;
use App\NguyenVongDoAn;
use DB;
class search_Controller extends Controller
{
    
    public function getsearch(Request $request){
        $tukhoa=Session::get('tim_kiem');
        $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $bomon=BoMon::all();
        $loaidoan=LoaiDoAn::all();
        $do_an = DB::table('do_an')
           ->join('sinh_vien', 'do_an.id_sinh_vien', '=', 'sinh_vien.id')
            ->join('giang_vien', 'do_an.id_giang_vien', '=', 'giang_vien.id')
            ->select('do_an.*','giang_vien.*','sinh_vien.*')->where('giang_vien.full_name','like',"%$tukhoa%")->orwhere('sinh_vien.full_name','like',"%$tukhoa%")->orwhere('sinh_vien.user_name','like',"%$tukhoa%")->orwhere('sinh_vien.class','like',"%$tukhoa%")->orwhere('sinh_vien.school_year','like',"%$tukhoa%")->orwhere('sinh_vien.email','like',"%$tukhoa%")->orwhere('sinh_vien.address','like',"%$tukhoa%")->orwhere('sinh_vien.phone_number','like',"%$tukhoa%")->orwhere('giang_vien.user_name','like',"%$tukhoa%")->orwhere('giang_vien.full_name','like',"%$tukhoa%")->orwhere('giang_vien.email','like',"%$tukhoa%")->orwhere('giang_vien.phone_number','like',"%$tukhoa%")->orwhere('giang_vien.phone_number','like',"%$tukhoa%")->orwhere('do_an.ten_de_tai','like',"%$tukhoa%")->orwhere('do_an.hoc_ky','like',"%$tukhoa%")->orwhere('do_an.diem','like',"%$tukhoa%")
            ->paginate(5);
                  

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
        
        
        return view('admin.search.danh_sach_search',['bomon'=>$bomon,'do_an'=>$do_an,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);

        
    }

    public function search(Request $request){
        $dem=NguyenVongDoAn::all()->count();
    	$a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
     	$bomon=BoMon::all();
        $loaidoan=LoaiDoAn::all();
        $tukhoa=$request->search;
        Session::put('tim_kiem',$tukhoa);
         /*$do=SinhVien::where('full_name','like','%$tukhoa%')->value('id');
         $do_an=$do->sinh_vien_to_do_an()->get();
         echo $do_an*/
        /*$do_an = DoAn::with('$do->do_an_to_sinh_vien()', '$do_an->do_an_to_giang_vien()')
            ->select('do_an.*', 'sinh_vien.*', 'giang_vien.*')->where('id',19)->get();
        echo $do_an;*/
       // echo $do;
        $do_an = DB::table('do_an')
           ->join('sinh_vien', 'do_an.id_sinh_vien', '=', 'sinh_vien.id')
            ->join('giang_vien', 'do_an.id_giang_vien', '=', 'giang_vien.id')
            ->select('do_an.*','giang_vien.*','sinh_vien.*')->where('giang_vien.full_name','like',"%$tukhoa%")->orwhere('sinh_vien.full_name','like',"%$tukhoa%")->orwhere('sinh_vien.user_name','like',"%$tukhoa%")->orwhere('sinh_vien.class','like',"%$tukhoa%")->orwhere('sinh_vien.school_year','like',"%$tukhoa%")->orwhere('sinh_vien.email','like',"%$tukhoa%")->orwhere('sinh_vien.address','like',"%$tukhoa%")->orwhere('sinh_vien.phone_number','like',"%$tukhoa%")->orwhere('giang_vien.user_name','like',"%$tukhoa%")->orwhere('giang_vien.full_name','like',"%$tukhoa%")->orwhere('giang_vien.email','like',"%$tukhoa%")->orwhere('giang_vien.phone_number','like',"%$tukhoa%")->orwhere('giang_vien.phone_number','like',"%$tukhoa%")->orwhere('do_an.ten_de_tai','like',"%$tukhoa%")->orwhere('do_an.hoc_ky','like',"%$tukhoa%")->orwhere('do_an.diem','like',"%$tukhoa%")
            ->paginate(5);
                  
       // $sinhvienn=SinhVien::with('do_an')->select('sinh_vien.*','do_an.id_sinh_vien')->get();
       // echo $sinhvienn;
       // $do_an=DoAn::where('ten_de_tai','like',"%$tukhoa%")->orwhere('id_sinh_vien','like',"%$tukhoa%")->paginate(5);
        /*Session::put('tim_kiem',$tukhoa);
        if(substr($tukhoa,0,2) == "SV"){
            $SinhViens=SinhVien::where('user_name',$tukhoa)->value('id');
            $do_an=DoAn::where('id_sinh_vien',$SinhViens)->paginate(5);;  
     	}

        elseif (substr($tukhoa,0,2) == "GV") {
            $GiangViens=GiangVien::where('user_name',$tukhoa)->value('id');
            $do_an=DoAn::where('id_giang_vien',$GiangViens)->paginate(5);  
        } */
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
        
        
       return view('admin.search.danh_sach_search',['bomon'=>$bomon,'do_an'=>$do_an,'admin'=>$admin,'loaidoan'=>$loaidoan,'dem'=>$dem]);


     	
    	
    }

    public function do_an_1(Request $request,$id_bo_mon,$id_loai_do_an){
        $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $bomon=BoMon::all();
        $loaidoan=LoaiDoAn::all();
        //$tukhoa=$request->search;
        //$SinhViens=SinhVien::where('user_name',$tukhoa)->value('id');
        $giangvien=GiangVien::where('id_bo_mon',$id_bo_mon)->value('id');

        $do_an=DoAn::where('id_loai_do_an',$id_loai_do_an)->where('id_bo_mon',$id_bo_mon)->paginate(3);;
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
    public function all_do_an(Request $request,$id_bo_mon){
        $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $bomon=BoMon::all();
        $loaidoan=LoaiDoAn::all();
        //$tukhoa=$request->search;
        //$SinhViens=SinhVien::where('user_name',$tukhoa)->value('id');
        $giangvien=GiangVien::where('id_bo_mon',$id_bo_mon)->value('id');
        $do_an=DoAn::where('id_bo_mon',$id_bo_mon)->paginate(3);;
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

    public function getall_do_an(Request $request,$id_bo_mon){
        $dem=NguyenVongDoAn::all()->count();
        $a= Session::get('ten');
        $admin= Admin::where('user_name',$a)->first();
        $bomon=BoMon::all();
        $loaidoan=LoaiDoAn::all();
        //$tukhoa=$request->search;
        //$SinhViens=SinhVien::where('user_name',$tukhoa)->value('id');
        $giangvien=GiangVien::where('id_bo_mon',$id_bo_mon)->value('id');
        $do_an=DoAn::where('id_bo_mon',$id_bo_mon)->paginate(3);;
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




}
