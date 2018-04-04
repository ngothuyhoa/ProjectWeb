<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('home_student','home_studentController@homestudent');
	

	Route::get('capnhat','TTCa_NhanController@capnhat');

	Route::post('danh_sach_sinh_vien','home_dssvController@dssv');

	Route::post('danh_sach_giang_vien','home_dsgvController@dsgv');

	Route::post('danh_sach_bo_mon','home_bomonController@bomon');

	Route::post('change_password','change_passwordController@change_password');

	Route::post('dangky','home_dangkynvController@dangky');
