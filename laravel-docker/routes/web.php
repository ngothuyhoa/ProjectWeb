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

	

// Login Logout
	Route::get('login_form',function(){
		return view('login.login');
	});

	Route::group(['middleware'=>['web']],function(){
		Route::post('admin/login','loginController@login');});
	Route::get('logout','loginController@logout');


//Sinh vien
	Route::get('admin/danh_sach_sinh_vien','admin_thong_tin_svController@dssv');
	Route::post('admin/danh_sach_sinh_vien','admin_thong_tin_svController@postdssv');
	Route::get('admin/danh_sach_sinh_vien/them_sv','admin_thong_tin_svController@getthemsv');
	Route::post('admin/danh_sach_sinh_vien/them_sv','admin_thong_tin_svController@themsv');
	Route::post('admin/danh_sach_sinh_vien/them','admin_thong_tin_svController@them');
	//Route::get('admin/danh_sach_sinh_vien/sua_sv/{user_name}','admin_thong_tin_svController@suasv');
	Route::post('admin/danh_sach_sinh_vien/sua/{user_name}','admin_thong_tin_svController@sua');
	Route::post('admin/danh_sach_sinh_vien/xoa_sv/{user_name}','admin_thong_tin_svController@xoasv');
	Route::get('admin/danh_sach_sinh_vien/loc_sinh_vien/{id}','admin_thong_tin_svController@getloc');
	Route::post('admin/danh_sach_sinh_vien/loc_sinh_vien/{id}','admin_thong_tin_svController@loc');

//Giang Vien
	Route::get('admin/danh_sach_giang_vien','admin_thong_tin_gvController@dsgv');
	Route::post('admin/danh_sach_giang_vien','admin_thong_tin_gvController@postdsgv');
	Route::post('admin/danh_sach_giang_vien/them_gv','admin_thong_tin_gvController@themgv');
	Route::post('admin/danh_sach_giang_vien/them','admin_thong_tin_gvController@them');
	Route::get('admin/danh_sach_giang_vien/sua_gv/{user_name}','admin_thong_tin_gvController@suagv');
	Route::post('admin/danh_sach_giang_vien/sua/{user_name}','admin_thong_tin_gvController@sua');
	Route::get('admin/danh_sach_giang_vien/xoa_gv/{user_name}','admin_thong_tin_gvController@xoagv');
	Route::get('admin/danh_sach_giang_vien/loc_sinh_vien/{id}','admin_thong_tin_gvController@getloc');
	Route::post('admin/danh_sach_giang_vien/loc_sinh_vien/{id}','admin_thong_tin_gvController@loc');

// Bo Mon

	Route::get('admin/danh_sach_bo_mon','admin_thong_tin_bmController@dsbm');
	Route::post('admin/danh_sach_bo_mon/them_bm','admin_thong_tin_bmController@thembm');
	Route::post('admin/danh_sach_bo_mon/them','admin_thong_tin_bmController@them');
	Route::get('admin/danh_sach_bo_mon/sua_bm/{id}','admin_thong_tin_bmController@suabm');
	Route::post('admin/danh_sach_bo_mon/sua/{id}','admin_thong_tin_bmController@sua');
	Route::get('admin/danh_sach_bo_mon/xoa_bm/{id}','admin_thong_tin_bmController@xoabm');
//Loai do an
	Route::get('admin/danh_sach_loai_do_an','admin_thong_tin_ldaController@dslda');
	Route::get('admin/danh_sach_loai_do_an/them_lda','admin_thong_tin_ldaController@getthemlda');
	Route::post('admin/danh_sach_loai_do_an/them_lda','admin_thong_tin_ldaController@themlda');
	Route::post('admin/danh_sach_loai_do_an/them','admin_thong_tin_ldaController@them');
	Route::post('admin/danh_sach_loai_do_an/sua/{id}','admin_thong_tin_ldaController@sua');
	Route::post('admin/danh_sach_loai_do_an/xoa/{id}','admin_thong_tin_ldaController@xoa');
// Do An
	Route::get('admin/home_admin','home_adminController@homestudent');
	Route::get('admin/them_do_an','home_adminController@getthemda');
	Route::post('admin/them_do_an','home_adminController@themda');
	Route::post('admin/them','home_adminController@them');
	Route::post('admin/sua_da/{id}','home_adminController@suada');	
	Route::get('admin/file_bao_cao/{id}','home_adminController@file');
	Route::post('admin/file_bao_cao/sua/{id}','home_adminController@sua_file');
	Route::get('download/{id}','home_adminController@getDownload');
	Route::post('admin/chon_giang_vien/{id}','home_adminController@chongv');

//Quan tri vien
	Route::get('admin/danh_sach_quan_tri_vien','admin_thong_tin_qtvController@dsqtv');
	Route::post('admin/danh_sach_quan_tri_vien/them_qtv','admin_thong_tin_qtvController@themqtv');
	Route::post('admin/danh_sach_quan_tri_vien/them','admin_thong_tin_qtvController@them');
	Route::post('admin/danh_sach_quan_tri_vien/sua/{user_name}','admin_thong_tin_qtvController@sua');
	Route::post('admin/thong_tin_ca_nhan/sua_qtv/{user_name}','admin_thong_tin_qtvController@suaqtv');
	Route::post('admin/danh_sach_quan_tri_vien/xoa_qtv/{user_name}','admin_thong_tin_qtvController@xoa');
	Route::post('admin/thong_tin_ca_nhan/doi_mat_khau/{user_name}','admin_thong_tin_qtvController@pass');
	Route::get('admin/thong_tin_ca_nhan/doi_mat_khau/{user_name}','admin_thong_tin_qtvController@getPass');
	Route::post('admin/thong_tin_ca_nhan/doi_mat_khau/check/{user_name}','admin_thong_tin_qtvController@check');
	Route::post('admin/thong_tin_ca_nhan/doi_mat_khau/thuc_hien_doi/{user_name}','admin_thong_tin_qtvController@doi');
//Searcht
	Route::get('admin/search','search_Controller@getsearch');
	Route::post('admin/search','search_Controller@search');
	Route::post('admin/do_an/{id_bo_mon}/{id_loai_do_an}','search_Controller@do_an_1');
	Route::post('admin/do_an/{id_bo_mon}','search_Controller@all_do_an');
	Route::get('admin/do_an/{id_bo_mon}','search_Controller@getall_do_an');

//file
Route::post('file','home_adminController@doUpload');
//Duyet do an
Route::get('admin/duyet_do_an','admin_nguyen_vong_do_anController@duyetnv');
Route::post('admin/duyet_do_an/{id}','admin_nguyen_vong_do_anController@duyet');

// Dang nhap cho giang vien
	Route:: get('giangvien/home_giangvien','home_giangvienController@dssv');
	Route::post('giangvien/ghichu/{id}','home_giangvienController@ghichu');	
	Route::get('giangvien/file_bao_cao/{id}','home_giangvienController@file');
	Route::get('download/{id}','home_giangvienController@getDownload');

// test 
	Route::get('gui_mail','admin_nguyen_vong_do_anController@mail');
