@extends('admin.layout.home_admin')
@section('content')
<?
                      function checked($value, $v_compare){
                          $rs='';
                          if($value==$v_compare)
                             $rs ='selected="selected"';
                          return $rs;
                                        }
                    ?>
                     @if (session('success'))
                           <div class="alert alert-success" style="text-align: center;">
                              <p>{{ session('success') }}</p>
                           </div>
                      @endif 
<div class="panel-footer" style="width: 960px ;margin-right: 10px" >
      <h3 style="text-align:center">Danh Sách Giảng Viên  </h3>
       <div class="form-group">
                            
                            <li class="dropdown" style="list-style-type: none;">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                 Lọc theo bộ môn
                                <span class="caret"> </span></a>                      
                              <ul class="dropdown-menu">
                                <li>
                                  <form method="POST" action="/admin/danh_sach_giang_vien">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="submit" class="btn-link" name="go" value="all" style="color:black"/>
                                  </form>
                                  </li>
                                @foreach($bomon as $bm)
                                <li>
                                  <form method="POST" action="/admin/danh_sach_giang_vien/loc_sinh_vien/{{$bm->id}}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="submit" class="btn-link" name="go" value="{{$bm->ten_bo_mon}}" style="color:black"/>
                                  </form>
                                  </li>
                                  @endforeach
                              </ul>
                            
      <form action="/admin/danh_sach_giang_vien/them_gv" method="post">
        <input type="submit" name="Them" value="Them" style="float: right ;margin-bottom:10px ">  
          {{ csrf_field() }}
      </form>
    </div>
                  <table class="table" style="text-align: center" style="width: 900px">
                    <thead class="thead-inverse" style="background-color:black; color:white">    
                        <tr>
                           <td style="text-align:center">STT</td>
                            <td style="text-align:center">Ma Giang Vien</td>
                            <td style="text-align:center">Họ tên</td>
                            <td style="text-align:center">Ngày Sinh</td>
                            <td style="text-align:center">Giới Tính</td>
                            <td style="text-align:center">SDT</td>
                            <td style="text-align:center">Email</td>
                            <td style="text-align:center">Bộ Môn</td>
                            <td style="text-align:center">Ghi Chú</td></td>
                            <td style="text-align:center" colspan="2">Thao Tac</td>
                        </tr>
                        {{ csrf_field() }}
                        </thead>
                        <?php $i=0; ?>

                        @foreach($giangvien as $gv)
                        <form action="/admin/danh_sach_giang_vien/sua/{{$gv->user_name}}" method="post">
                         <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <td><input type="text" name="mgv" value="{{$gv->user_name}}" style="width: 50px ;background: #F8F8FF ;border: 0px"></td>
                            <td><textarea style="width: 80px;background: #F8F8FF ;border: 0px;text-align: center;" name="ten"> {{$gv->full_name}}</textarea></td>
                            <td><textarea style="width: 60px;background: #F8F8FF ;border: 0px;text-align: center;" name="ngaysinh"> {{$gv->birthday}}</textarea></td>
                            <td><select  name="gioitinh" style="width: 50px ;background: #F8F8FF ;border: 0px">
                                <option value="Nam" <?php echo checked('Nam',$gv->gender)?>>Nam</option>
                                <option value="Nữ" <?php echo checked('Nữ',$gv->gender)?>>Nữ</option>
                                <option value="Khác"<?php echo checked('Khác',$gv->gender)?>>Khác</option>
                              </select></td>
                            <td><textarea style="width: 50px;background: #F8F8FF ;border: 0px;text-align: center;" name="sdt">{{$gv->phone_number}}</textarea></td>
                            <td><textarea style="width: 60px;background: #F8F8FF ;border: 0px;text-align: center;" name="email"> {{$gv->email}}</textarea></td>
                            <td><select  id="" class="form-control" name="bomon" style="width:70px;background: #F8F8FF ;border: 0px ;padding-left: 0px;margin-left: 0px" >
                                    @foreach($bomon as $bm)
                                     <option <?php echo checked($bm->ten_bo_mon_viet_tat,$gv->ten_viet_tat); ?>>{{$bm->ten_bo_mon_viet_tat}}</option>
                                 @endforeach
                             </select></td>
                            <td><textarea style="width: 60px;background: #F8F8FF ;border: 0px;text-align: center;" name="ghichu">{{$gv->note}}</textarea></td>
                            
                            <td>
                                <input type="submit" name="" value="Sửa">
                              </form>
                               <form action="/admin/danh_sach_giang_vien/xoa_gv/{{$gv->user_name}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input style="margin-top: 10px" type="submit" name="" value="Xoa">
                              </form> </td>
                           
                        </tr>
                        @endforeach
 
                  </table>
</div>
        <div class="panel-footer" style="width: 960px">
          <div class="row">
            <div class="col col-xs-4"></div>
            <div class="col col-xs-8">
              <ul class="pagination hidden-xs pull-right">
               {!!$giangvien->links()!!}
              </ul>
              <ul class="pagination visible-xs pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
        </div>
@endsection




