@extends('admin.layout.home_admin')
@section('content')
<form action="/admin/danh_sach_giang_vien/sua/{{$giangviena->user_name}}" method="POST">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="col-lg-9" style="padding-bottom:120px ;margin-left: 100px">
                        <h3 style="text-align: center">  Thêm Thông Tin Giảng Viên</h3>
                            <div class="form-group">
                                @if (session('success'))
                                    <div class="alert alert-success" style="text-align: center;">
                                          <p>{{ session('success') }}</p>
                                    </div>
                                    @endif
                                <label>Mã giảng viên :</label>
                                <input class="form-control" name="mgv" placeholder="Please Enter Username" value="{{$giangviena->user_name}}" required/>
                            </div>
                               <div class="form-group">
                                <label>Tên giảng viên :</label>
                                <input class="form-control" name="ten" placeholder="Please Enter Username" value="{{$giangviena->full_name}}" required/>
                            </div>
                            <div class="form-group">
                                <label>Ngày Sinh :</label>
                                <input class="form-control" type="date" id="datepicker" name="ngaysinh" value="{{$giangviena->birthday}}" required/>
                            </div>
                            <div class="form-group">
                                <?
                                        function checked($value, $v_compare){
                                        if($value==$v_compare)
                                            $rs =  'checked="checked"';
                                        else
                                            $rs = '';
                                        return $rs;
                                        }
                                    ?>
                                <label>Gioi Tinh :</label>
                                <form required>
                                <input type="radio" <? echo checked('Nam',$giangviena->gender) ?> name="gioitinh" value="Nam"> Nam
                                <input type="radio" <? echo checked('Nữ',$giangviena->gender) ?> name="gioitinh" value="Nữ"> Nữ
                                <input type="radio" <? echo checked('Khác',$giangviena->gender) ?> name="gioitinh" value="Khác"> Khác
                                </form>
                            </div>
                            <div class="form-group">
                                <label>Email :</label>
                                <input class="form-control" name="email" placeholder="Please Enter Username" value="{{$giangviena->email}}" required/>
                            </div>
                            <div class="form-group">
                                <label>SDT :</label>
                                <input class="form-control" name="sdt" placeholder="Please Enter Username" value="{{$giangviena->phone_number}}" required/>
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
                                <input class="form-control" name="ghichu" placeholder="Please Enter Username" value="{{$giangviena->note}}" required/>
                            </div>

                            <button type="submit" class="btn btn-default" value="submit" style="float: left">Sửa </button>
                            <form style="float:left ; margin-left: 30px" action="/admin/danh_sach_giang_vien" method="get">
                            <button type="submit" class="btn btn-default" value="submit">Back </button> 
                            </form>
                            
                    </div>
                 </form>
@endsection