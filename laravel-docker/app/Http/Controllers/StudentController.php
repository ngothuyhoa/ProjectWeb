<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use App\Http\Controllers\Controller;
use App\Http\Controllers\XuLyXau;
use App\Http\Controllers\SearchController;
use App\SinhVien;
use App\BoMon;
use App\DoAn;
use App\GiangVien;
use App\LoaiDoAn;
use App\User;

class StudentController extends Controller
{
    //
    public function homeStudent(){

    	$username = session('ten');
        $password = session('pass');

    	$bo_mon = BoMon::all();
        session()->put('bo_mon',$bo_mon);

    	$student = SinhVien::where('user_name', $username)->first();
        session()->put('student', $student);

        $project = DoAn::where('id_sinh_vien', $student->id)->get()->toArray();

        for($i =0; $i<count($project); $i++){
                    
            $project[$i]['ten_giang_vien'] = GiangVien::find($project[$i]['id_giang_vien'])->full_name;
            $project[$i]['phone_number'] = GiangVien::find($project[$i]['id_giang_vien'])->phone_number;
            $project[$i]['email'] = GiangVien::find($project[$i]['id_giang_vien'])->email;
            $project[$i]['bo_mon'] = BoMon::find($project[$i]['id_bo_mon'])->ten_bo_mon;
            $project[$i]['loai_do_an'] = LoaiDoAn::find($project[$i]['id_loai_do_an'])->ten;
        }

        return view('student.home_student',['home' => 'home_student', 'project'=>$project]);
    }

    public function changePassword(){
    	
    	$username = session('ten');
        $password = session('pass');

    	$bo_mon = BoMon::all();

    	$student = SinhVien::where('user_name', $username)->first();

    	return view('student.change_password', ['student'=>$student, 'bo_mon'=>$bo_mon, 'home'=>'home_student']);

    }

    public function checkOldPassword(Request $request){

        $bo_mon = BoMon::all();

        $username = session('ten');

        $student = SinhVien::where('user_name', $username)->first();

    	$oldPassword = $request['oldPassword'];
    	
        if($oldPassword == session('pass')) return view('student.new_password', ['student'=>$student, 'bo_mon'=>$bo_mon, 'home'=>'home_student']);

        else return view('student.change_password',['student'=>$student, 'bo_mon'=>$bo_mon, 'home'=>'home_student', 'error'=>"<div class='btn-danger btn btn-lg btn-block' style='width:250px'>Mật khẩu cũ sai</div>"]);
    }

    public function updatePassword(Request $request){

        $username = session('ten');

        session()->forget('pass');

        session()->put('pass', $request['newPassword']);

        $newPassword = bcrypt($request['newPassword']);

        User::where('name', $username)->update(array('password' => $newPassword));

        return view('student.new_password', ['home' => 'home_student', 'flag' => 'complete']);
    }

    public function updateInformationPrivate(Request $request){

        $username = session('ten');

        SinhVien::where('user_name', $username)->update(array('gender'=>$request['gender'], 'phone_number'=>$request['phone_number'], 'email'=>$request['email'], 'class'=>$request['class'], 'school_year'=>$request['school_year'], 'birthday'=>$request['birthday'], 'address'=>$request['address'], 'note'=>$request['note']));
    
        session()->forget('student');

        $student = SinhVien::where('user_name', $username)->first();

        session()->put('student', $student);

        return view('student.home_student', ['home'=>'home_student']);
    }

public function getprojectRefer(Request $request){

        $id_bo_mon = session('id_bo_mon');
        $id_loai_do_an = session('id_loai_do_an');

        if($id_loai_do_an != 0){
            $project = DoAn::where('id_loai_do_an', $id_loai_do_an)->where('id_bo_mon', $id_bo_mon)->paginate(5);
            $loai_do_an = LoaiDoAn::find($id_loai_do_an)->ten;
            $bo_mon = BoMon::find($id_bo_mon)->ten_bo_mon;

            for($i=0; $i<count($project); $i++){
                
                $project[$i]['ten_sinh_vien'] = SinhVien::find($project[$i]['id_sinh_vien'])->full_name;
                $project[$i]['ten_giang_vien'] = GiangVien::find($project[$i]['id_giang_vien'])->full_name;
            }

            return view('student.refer_project', ['home'=>'home_student', 'bo_mon'=>$bo_mon, 'loai_do_an'=>$loai_do_an, 'project'=>$project]);
        }
        else {

            $project = DoAn::where('id_bo_mon', $id_bo_mon)->paginate(5);
            $bo_mon = BoMon::find($id_bo_mon)->ten_bo_mon;

            for($i=0; $i<count($project); $i++){
                
                $project[$i]['ten_sinh_vien'] = SinhVien::find($project[$i]['id_sinh_vien'])->full_name;
                $project[$i]['ten_giang_vien'] = GiangVien::find($project[$i]['id_giang_vien'])->full_name;
            }

            return view('student.refer_project', ['home'=>'home_student', 'bo_mon'=>$bo_mon, 'project'=>$project]);
        
        }
    }
    public function projectRefer(Request $request){

        session()->put('id_bo_mon',$request['id_bo_mon']);
        session()->put('id_loai_do_an',$request['id_loai_do_an']);


        $id_bo_mon = session('id_bo_mon');
        $id_loai_do_an = session('id_loai_do_an');

        if($id_loai_do_an != 0){
            $project = DoAn::where('id_loai_do_an', $id_loai_do_an)->where('id_bo_mon', $id_bo_mon)->paginate(5);
            $loai_do_an = LoaiDoAn::find($id_loai_do_an)->ten;
            $bo_mon = BoMon::find($id_bo_mon)->ten_bo_mon;

            for($i=0; $i<count($project); $i++){
                
                $project[$i]['ten_sinh_vien'] = SinhVien::find($project[$i]['id_sinh_vien'])->full_name;
                $project[$i]['ten_giang_vien'] = GiangVien::find($project[$i]['id_giang_vien'])->full_name;
            }

            return view('student.refer_project', ['home'=>'home_student', 'bo_mon'=>$bo_mon, 'loai_do_an'=>$loai_do_an, 'project'=>$project]);
        }
        else {

            $project = DoAn::where('id_bo_mon', $id_bo_mon)->paginate(5);
            $bo_mon = BoMon::find($id_bo_mon)->ten_bo_mon;

            for($i=0; $i<count($project); $i++){
                
                $project[$i]['ten_sinh_vien'] = SinhVien::find($project[$i]['id_sinh_vien'])->full_name;
                $project[$i]['ten_giang_vien'] = GiangVien::find($project[$i]['id_giang_vien'])->full_name;
            }

            return view('student.refer_project', ['home'=>'home_student', 'bo_mon'=>$bo_mon, 'project'=>$project]);
        
        }
    }

    public function search(Request $request){

        $key_word = XuLyXau::handlingString($request['key_word']);

        $key_word = explode(' ', $key_word);

        $student = SearchController::searchByStudent($key_word);

        $teacher = SearchController::searchByTeacher($key_word);
       for($i =0; $i<count($student); $i++){
            $student[$i]['bo_mon'] = BoMon::find($student[$i]['id_bo_mon'])->ten_bo_mon;
        }
        
        $teacher = SearchController::searchByTeacher($key_word);

        for($i = 0; $i<count($teacher); $i++){
            $teacher[$i]['bo_mon'] = BoMon::find($teacher[$i]['id_bo_mon'])->ten_bo_mon;
        }

        return view('student.result_search',['home'=>'home_student', 'student'=>$student, 'teacher'=>$teacher]);

    }
}
