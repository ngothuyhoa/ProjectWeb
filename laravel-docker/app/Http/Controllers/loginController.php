<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\SinhVien;
use App\BoMon;
use App\GiaoVu;
use App\Admin;
use App\DoAn;
use Session;
use App\LoaiDoAn;
use App\GiangVien;
class loginController extends Controller
{
    public function login(Request $request){
        //$sinhvien=SinhVien::all();
        $bomon=BoMon::all();
       // $do_an=DoAn::all();
    	$username = $request['username'];
    	$password = $request['password'];
        
        Session::put('ten',$username);
        Session::put('pass',$password);

        $a= Session::get('ten');
        $b=Session::get('pass');
        
        $bo_mon=BoMon::all();
        session()->put('bo_mon',$bo_mon);
        $loai_do_an=LoaiDoAn::all();
        session()->put('loai_do_an',$loai_do_an);

    	if(Auth::attempt(['name'=>$a,'password'=>$b])){


    		if(substr($username,0,2) == "AD"){
                $do_an=DoAn::all();
                $admin= Admin::where('user_name',$a)->first();
               
                return redirect('admin/home_admin');
               
            }
            else if(substr($username,0,2) == "SV"){
              
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

                session()->put('project', $project);

                return view('student.home_student',['home' => 'home_student']);
            
            } else if(substr($username,0,2) == "GV"){
                $loaidoan=LoaiDoAn::all();
                $teacher = GiangVien::where('user_name',$username)->first();
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

                return view('teacher.home_teacher',['home'=>'home_teacher','project'=>$project,'bomon'=>$bomon,'loaidoan'=>$loaidoan]);
            }
    	}	
    	else
    		return redirect('login_form')->with('success','USENAME HOẶC PASSWORD SAI, VUI LÒNG NHẬP LẠI');
    }

    public function logout(){
        Auth::logout();
        return view('login.login');
    }

}
