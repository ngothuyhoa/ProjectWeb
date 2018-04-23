@extends('admin.layout.home_admin')
@section('content')
                                  
      <div class="panel-footer" style="width: 960px ;margin-right: 10px" >
                    <?
                      function checked($value, $v_compare){
                          $rs='';
                          if($value==$v_compare)
                             $rs ='selected="selected"';
                          return $rs;
                                        }
                    ?>
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
      <h3 style="text-align:center">Danh Sách Sinh Viên  </h3>
      <div class="form-group">
                            
                            <li class="dropdown" style="list-style-type: none;">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                 Lọc theo bộ môn
                                <span class="caret"> </span></a>                      
                              <ul class="dropdown-menu">
                                <li>
                                  <form method="POST" action="/admin/danh_sach_sinh_vien">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="submit" class="btn-link" name="go" value="all" style="color:black"/>
                                  </form>
                                  </li>
                                @foreach($bomon as $bm)
                                <li>
                                  <form method="POST" action="/admin/danh_sach_sinh_vien/loc_sinh_vien/{{$bm->id}}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="submit" class="btn-link" name="go" value="{{$bm->ten_bo_mon}}" style="color:black"/>
                                  </form>
                                  </li>
                                  @endforeach
                              </ul>
                            
                                
      <form action="/admin/danh_sach_sinh_vien/them_sv" method="post">
        <input type="submit" name="Them" value="   Thêm" style="float: right ;margin-bottom:10px;width: 70px "> 

          {{ csrf_field() }}
      </div>
      </form>
                  <table class="table" style="text-align: center" style="width: 900px">
                    <thead class="thead-inverse" style="background-color:black; color:white">    
                        <tr>
                            <td style="text-align:center">STT</td>
                            <td style="text-align:center">MSSV</td>
                            <td style="text-align:center">Họ tên</td>
                            <td style="text-align:center">Ngày Sinh</td>
                            <td style="text-align:center">Giới Tính</td>
                            <td style="text-align:center">Địa Chỉ</td> 
                            <td style="text-align:center">SDT</td>
                            <td style="text-align:center">Email</td>
                            <td style="text-align:center">Lớ́p</td>
                             <td style="text-align:center">Khóa</td>
                            <td style="text-align:center">Bộ Môn</td>
                            <td style="text-align:center">Ghi Chú</td>
                            <td style="text-align:center" colspan="2">Thao Tac</td>
                        </tr>
                        {{ csrf_field() }}
                        </thead>
                        <?php $i=0; ?>

                        @foreach($sinhvien as $sv)
                          <form action="/admin/danh_sach_sinh_vien/sua/{{$sv->user_name}}" method="post">
                         <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <td><input type="text" name="msv" value="{{$sv->user_name}}" style="width: 50px ;background: #F8F8FF ;border: 0px"></td>

                            <td><textarea style="width: 80px;background: #F8F8FF ;border: 0px;text-align: center;" name="ten"> {{$sv->full_name}}</textarea></td>

                            <td><textarea style="width: 60px;background: #F8F8FF ;border: 0px;text-align: center;" name="ngaysinh"> {{$sv->birthday}}</textarea></td>
                             
                            <td>
                              <select  name="gioitinh" style="width: 50px ;background: #F8F8FF ;border: 0px">
                                <option value="Nam" <?php echo checked('Nam',$sv->gender)?>>Nam</option>
                                <option value="Nữ" <?php echo checked('Nữ',$sv->gender)?>>Nữ</option>
                                <option value="Khác"<?php echo checked('Khác',$sv->gender)?>>Khác</option>
                              </select>

                          </td>

                            <td><textarea style="width: 70px;background: #F8F8FF ;border: 0px;text-align: center;" name="diachi">{{$sv->address}}</textarea></td>

                            <td><textarea style="width: 50px;background: #F8F8FF ;border: 0px;text-align: center;" name="sdt">{{$sv->phone_number}}</textarea></td>

                            <td><textarea style="width: 60px;background: #F8F8FF ;border: 0px;text-align: center;" name="email"> {{$sv->email}}</textarea></td>

                            <td><textarea style="width: 60px;background: #F8F8FF ;border: 0px;text-align: center;" name="lop">{{$sv->class}}</textarea></td>

                            <td><input type="text" name="khoa" value="{{$sv->school_year}}" style="width: 30px ;background: #F8F8FF ;border: 0px"></td>
                            <td>
                              <select  id="" class="form-control" name="bomon" style="width:70px;background: #F8F8FF ;border: 0px ;padding-left: 0px;margin-left: 0px" >
                                    @foreach($bomon as $bm)
                                     <option <?php echo checked($bm->ten_bo_mon_viet_tat,$sv->ten_viet_tat); ?>>{{$bm->ten_bo_mon_viet_tat}}</option>
                                 @endforeach
                             </select>

                          </td>
                            <td><textarea style="width: 60px;background: #F8F8FF ;border: 0px;text-align: center;" name="ghichu">{{$sv->note}}</textarea></td>
                            
                            <td><input type="submit" name="sua" value="Sua">
                                {{ csrf_field() }}
                              </form>
                              <form action="/admin/danh_sach_sinh_vien/xoa_sv/{{$sv->user_name}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input style="margin-top: 10px" type="submit" name="" value="Xoa">
                              </form>
                             </td>
                           
                        </tr>
                        @endforeach
 
                    
                    <tbody></tbody>
                  </table>
              </div>
        <div class="panel-footer" style="width: 960px">
          <div class="row">
            <div class="col col-xs-4"> </div>
            <div class="col col-xs-8">
              <ul class="pagination hidden-xs pull-right">
               {!!$sinhvien->links()!!}
              </ul>
              <ul class="pagination visible-xs pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
        </div>
@endsection
