@extends('admin.layout.home_admin')
@section('content')

<div class="col-lg-9" style="padding-bottom:120px ;margin-left: 100px">
    <form action="/admin/danh_sach_bo_mon/sua/{{$bomona->id}}" method="POST">
<input type="hidden" name="_token" value="{{csrf_token()}}">
                        <h3 style="text-align: center">  Sửa Thông Tin Bộ Môn</h3>
                               <div class="form-group">
                                <label>Tên Bộ Môn :</label>
                                <input class="form-control" name="ten_bm" placeholder="Nhập ID Bộ Môn" value="{{$bomona->ten_bo_mon}}" required/>
                            </div>
                            <div class="form-group">
                                <label>Tên Viết Tắt :</label>
                                <input class="form-control" name="ten_viet_tat" placeholder="Nhập Tên Viết Tắt" value="{{$bomona->ten_bo_mon_viet_tat}}" required/>
                            </div>
                            <div class="form-group">
                                <label>Văn Phòng :</label>
                                <input class="form-control" name="van_phong" placeholder="Nhập Văn Phòng" value="{{$bomona->van_phong}}" required/>
                            </div>
                            <div class="form-group">
                                <label>SDT :</label>
                                <input class="form-control" name="sdt" placeholder="Nhập SDT" value="{{$bomona->SDT}}" required/>
                            </div>
                            <div class="form-group">
                                <label>Website :</label>
                                <input class="form-control" name="website" placeholder="Nhập Website" value="{{$bomona->website}}" required/>
                            </div>
                            <div class="form-group">
                                <label>Ghi Chu :</label>
                                <input class="form-control" name="ghichu" placeholder="Nhập Ghi Chu" value="{{$bomona->note}}" required/>
                            </div>

                            <button type="submit" class="btn btn-default" value="submit" style="float: left">Sửa </button>
                             </form>
                            <form style="float:left ; margin-left: 30px" action="/admin/danh_sach_bo_mon" method="get">
                            <button type="submit" class="btn btn-default" value="submit">Back </button> 
                            </form>
                            
                    </div>
                 </form>
@endsection