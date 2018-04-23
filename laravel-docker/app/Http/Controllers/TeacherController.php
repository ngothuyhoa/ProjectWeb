<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use App\Http\Controllers\Controller;
use App\SinhVien;
use App\BoMon;
use App\DoAn;
use App\GiangVien;
use App\LoaiDoAn;
use App\User;

class TeacherController extends Controller
{
    //
    public function homeTeacher(){

    	$username = session('ten');
        $password = session('pass');

    	$bo_mon = BoMon::all();
    	session()->put('bo_mon', $bo_mon);

    	$teacher = GiangVien::where('user_name', $username)->first();
    	session()->put('teacher',$teacher);

    	$project = DoAn::where('id_giang_vien', $teacher->id)->get()->toArray();

        for($i=0; $i<count($project); $i++){

            $student = SinhVien::find($project[$i]['id_sinh_vien']);
            $project[$i]['ten_sinh_vien'] = $student['full_name'];
            $project[$i]['class'] = $student['class'];
            $project[$i]['school_year'] = $student['school_year'];
            $project[$i]['email'] = $student['email'];
            $project[$i]['phone_number'] = $student['phone_number'];
            $project[$i]['loai_do_an'] = LoaiDoAn::find($project[$i]['id_loai_do_an'])->ten;
        }

        return view('teacher.home_teacher',['home'=>'home_teacher','project'=>$project]);
    }

    public function updateScore(){

    	$username = session('ten');
    	$teacher = GiangVien::where('user_name', $username)->first();

    	$project = DoAn::where('id_giang_vien', $teacher->id)->where('diem', 0)->get()->toArray();

        for($i=0; $i<count($project); $i++){

            $student = SinhVien::find($project[$i]['id_sinh_vien']);
            $project[$i]['ten_sinh_vien'] = $student['full_name'];
            $project[$i]['class'] = $student['class'];
            $project[$i]['school_year'] = $student['school_year'];
            $project[$i]['email'] = $student['email'];
            $project[$i]['phone_number'] = $student['phone_number'];
            $project[$i]['loai_do_an'] = LoaiDoAn::find($project[$i]['id_loai_do_an'])->ten;
        }

        return view('teacher.update_score', ['home'=>'home_teacher','project'=>$project]);
    }

    public function saveScore(Request $request){

    	$diem = $request['diem'];
    	$id_do_an = $request['id_do_an'];

    	DoAn::where('id', $id_do_an)->update(array('diem'=>$diem));

    	return view('teacher.update_score', ['home'=>'home_teacher', 'flag'=>'complete']);
    }

    public function changePassword(){
        
        $username = session('ten');
        $password = session('pass');

        $bo_mon = BoMon::all();

        $teacher = GiangVien::where('user_name', $username)->first();

        return view('teacher.change_password', ['teacher'=>$teacher, 'bo_mon'=>$bo_mon, 'home'=>'home_teacher']);

    }

    public function checkOldPassword( Request $request){

        $bo_mon = BoMon::all();

        $username = session('ten');

        $teacher = GiangVien::where('user_name', $username)->first();

        $oldPassword = $request['oldPassword'];
        
        if($oldPassword == session('pass')) return view('teacher.new_password', ['teacher'=>$teacher, 'bo_mon'=>$bo_mon, 'home'=>'home_teacher']);

        else return view('teacher.change_password',['teacher'=>$teacher, 'bo_mon'=>$bo_mon, 'home'=>'home_teacher', 'error'=>"<div class='btn-danger btn btn-lg btn-block' style='width:250px'>Mật khẩu cũ sai</div>"]);
    }

    public function updatePassword(Request $request){

        $username = session('ten');

        session()->forget('pass');

        session()->put('pass', $request['newPassword']);

        $newPassword = bcrypt($request['newPassword']);

        User::where('name', $username)->update(array('password' => $newPassword));

        return view('teacher.new_password', ['home' => 'home_teacher', 'flag' => 'complete']);
    } 

    public function updateInformationPrivate(Request $request){

        $username = session('ten');

        GiangVien::where('user_name', $username)->update(array('gender'=>$request['gender'], 'phone_number'=>$request['phone_number'], 'email'=>$request['email'], 'birthday'=>$request['birthday'], 'note'=>$request['note']));
    
        session()->forget('teacher');

        $teacher = GiangVien::where('user_name', $username)->first();

        session()->put('teacher', $teacher);

        $project = DoAn::where('id_giang_vien', $teacher->id)->get()->toArray();

        for($i=0; $i<count($project); $i++){

            $student = SinhVien::find($project[$i]['id_sinh_vien']);
            $project[$i]['ten_sinh_vien'] = $student['full_name'];
            $project[$i]['class'] = $student['class'];
            $project[$i]['school_year'] = $student['school_year'];
            $project[$i]['email'] = $student['email'];
            $project[$i]['phone_number'] = $student['phone_number'];
            $project[$i]['loai_do_an'] = LoaiDoAn::find($project[$i]['id_loai_do_an'])->ten;
        }
        return view('teacher.home_teacher', ['home'=>'home_teacher','project'=>$project]);
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

        return view('teacher.result_search',['home'=>'home_teacher', 'student'=>$student, 'teacher'=>$teacher]);
    }
}
