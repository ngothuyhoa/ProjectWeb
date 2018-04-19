@extends('admin.layout.home_admin')
@section('content')


    <form action="{{ url('/admin/them') }}" enctype="multipart/form-data" method="POST">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="col-lg-9" style="padding-bottom:120px ;margin-left: 100px">
                        @if (session('success'))
                                    <div class="alert alert-success" style="text-align: center;">
                                          <p>{{ session('success') }}</p>
                                    </div>
                                    @endif
                        <h3 style="text-align: center">  Thêm Đồ Án</h3>
                        <div class="form-group" style="">
                          <span>
                            
                            <label style="float: left;padding-top: 1px"> Chon bo mon :</label>     
                            <li class="dropdown" style="list-style-type:none;">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                   Chọn bộ môn  
                                <span class="caret"> </span></a>                      
                              <ul class="dropdown-menu">
                                <form method="POST" action="">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="submit" class="btn-link" name="go" value="ALL" style="color:black"/>
                                  </form>
                                @foreach($bomon as $bm)
                                <li>
                                  <form method="POST" action="/admin/chon_giang_vien/{{$bm->id}}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="submit" class="btn-link" name="ten_bm" value="{{$bm->ten_bo_mon}}" style="color:black"/>
                                  </form>
                                  @endforeach
                              </ul>
                              <input style="width: 300px ;background: #dedede ;border: 0px" type="text" name="" value="{{$ten}}" readonly>
                            </li>
                             </span>
                              </div>
                               <div class="form-group">
                                <label>Ma Sinh vien</label>
                                <input class="form-control" name="ma_sv" placeholder="Nhập MSV" required/>
                            </div>
                              
                            <div class="form-group">
                                <label>Giang vien</label>
                                
                                <select id="" class="form-control" name="ma_gv">  
                                    @foreach($giangvien as $gv)
                                 <option>{{$gv->full_name}}</option>
                                 @endforeach
                             </select>
                            </div>
                            <div class="form-group">
                                <label>Ten De Tai :</label>
                                <input class="form-control" name="ten_de_tai" placeholder="Nhập Ten De Tai" required/>
                            </div>
                            <div class="form-group">
                                <label>Loai Do An</label>
                                
                                <select id="" class="form-control" name="loaidoan">  
                                    @foreach($loaidoan as $lda)
                                 <option>{{$lda->ten}}</option>
                                 @endforeach
                             </select>
                            </div>
                            <div class="form-group">
                                <label>Hoc Ky</label>
                                <input class="form-control" name="hoc_ky" placeholder="Nhập Hoc Ky" required/>
                            </div>
                            <div class="form-group">
                                <label>Diem</label>
                                <input class="form-control" name="diem" placeholder="Nhập Diem" />
                            </div>
                            <div class="form-group">
                                <label>File bao cao</label>
                                <input type="file" name="filesTest" />
                            </div>
                            <div class="form-group">
                                <label>Ghi Chu</label>
                                <input class="form-control" name="ghichu" placeholder="Nhập Ghi Chu" required/>
                            </div>

                            <button type="submit" class="btn btn-default" value="submit" style="float: left">Thêm </button>
                            </form> 
                            <form style="float:left ; margin-left: 30px" action="/admin/home_admin" method="get">
                            <button type="submit" class="btn btn-default" value="submit">Back </button> 
                            </form>   
                    </div>
                    
              
@endsection