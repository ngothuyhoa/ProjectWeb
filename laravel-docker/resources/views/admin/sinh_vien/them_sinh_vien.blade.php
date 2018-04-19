@extends('admin.layout.home_admin')
@section('content')
<form action="/admin/danh_sach_sinh_vien/them" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="col-lg-9" style="padding-bottom:120px ;margin-left: 100px">
                         @if(count($errors) > 0)
                             <div class="alert alert-danger" style="text-align: center;">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach()
                        </div>
                         @endif
                         @if (session('success'))
                             <div class="alert alert-success" style="text-align: center;">
                                <p>{{ session('success') }}</p>
                            </div>
                                    @endif
                        <h3 style="text-align: center">  Thêm Thông Tin Sinh Viên</h3>
                            <div class="form-group">
                                <label>Mã sinh viên :</label>
                                <input class="form-control" name="msv" placeholder="Please Enter Username" required/>
                            </div>
                               <div class="form-group">
                                <label>Tên sinh viên :</label>
                                <input class="form-control" name="ten" placeholder="Please Enter Fullname" required/>
                            </div>
                            <div class="form-group">
                                <label>Ngày Sinh :</label>
                                <input class="form-control" type="date" id="datepicker" name="ngaysinh" required/>
                            </div>
                            <div class="form-group">
                                <label>Gioi Tinh :</label>
                                <form required>
                                <input type="radio" name="gioitinh" value="Nam" checked="checked"> Nam
                                <input type="radio" name="gioitinh" value="Nữ"> Nữ
                                <input type="radio" name="gioitinh" value="Khác"> Khác
                                </form>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ :</label>
                                <input class="form-control" name="diachi" placeholder="Please Enter Address" required/>
                            </div>
                            <div class="form-group">
                                <label>Email :</label>
                                <input class="form-control" name="email" placeholder="Please Enter Email" required/>
                            </div>
                            <div class="form-group">
                                <label>SDT :</label>
                                <input class="form-control" name="sdt" placeholder="Please Enter PhoneNumber" required/>
                            </div>
                            <div class="form-group">
                                <label>Lop :</label>
                                <input class="form-control" name="lop" placeholder="Please Enter Class" required/>
                            </div>
                            <div class="form-group">
                                <label>Khóa :</label>
                                <input class="form-control" name="khoa" placeholder="Please Enter Course" required/>
                            </div>
                           
                            <div class="form-group">
                                <label>Bộ môn</label>
                                
                                <select id="" class="form-control" name="bomon">  
                                    @foreach($bomon as $bm)
                                 <option>{{$bm->ten_bo_mon}}</option>
                                 @endforeach
                             </select>
                            </div>
                            <div class="form-group">
                                <label>Ghi Chu :</label>
                                <input class="form-control" name="ghichu" placeholder="Please Enter Note" required/>
                            </div>

                            <button type="submit" class="btn btn-default" value="submit" style="float: left">Thêm </button>
                            <form style="float:left ; margin-left: 30px" action="/admin/danh_sach_sinh_vien" method="get">
                            <button type="submit" class="btn btn-default" value="submit">Back </button> 
                            </form>
                            
                    </div>
                 </form>
@endsection