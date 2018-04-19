@extends('admin.layout.home_admin')
@section('content')

<div class="col-lg-9" style="padding-bottom:120px ;margin-left: 100px">
    <form action="/admin/danh_sach_loai_do_an/them" method="POST">
<input type="hidden" name="_token" value="{{csrf_token()}}">
                        <h3 style="text-align: center">  Thêm Loại Đồ Án</h3>
                        @if (session('success'))
                                    <div class="alert alert-success" style="text-align: center;">
                                          <p>{{ session('success') }}</p>
                                    </div>
                                    @endif 
                               <div class="form-group">
                                <label>Tên Loại Đồ Án :</label>
                                <input class="form-control" name="ten_lda" placeholder="Nhập Tên Loại Đồ Án" required/>
                            </div>     
                            
                            <button type="submit" class="btn btn-default" value="submit" style="float: left">Thêm </button>
                             </form>
                            <form style="float:left ; margin-left: 30px" action="/admin/danh_sach_loai_do_an" method="get">
                            <button type="submit" class="btn btn-default" value="submit">Back </button> 
                            </form>
                            
                    </div>
                 </form>
@endsection