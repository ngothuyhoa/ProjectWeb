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
        $sinhvien=SinhVien::all();
        $bomon=BoMon::all();
        $do_an=DoAn::all();
    	$username = $request['username'];
    	$password = $request['password'];
        
        Session::put('ten',$username);
        Session::put('pass',$password);

        $a= Session::get('ten');
        $b=Session::get('pass');
    	if(Auth::attempt(['name'=>$a,'password'=>$b])){

    		if(substr($username,0,2) == "AD"){
                
                $admin= Admin::where('user_name',$a)->first();
               
                return redirect('admin/home_admin');
               
            }
            elseif (substr($username,0,2) == "GV"){
                
                $giangvien= GiangVien::where('user_name',$a)->first();
               
                return redirect('giangvien/home_giangvien');
               
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
