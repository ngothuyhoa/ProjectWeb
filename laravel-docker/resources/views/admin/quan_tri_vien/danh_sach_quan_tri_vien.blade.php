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
                                    @if (session('success'))
                                    <div class="alert alert-success" style="text-align: center;">
                                          <p>{{ session('success') }}</p>
                                    </div>
                                    @endif 
      <h3 style="text-align:center">Danh Sách Quản Trị Viên  </h3>
      <form action="/admin/danh_sach_quan_tri_vien/them_qtv" method="post">
        <input type="submit" name="Them" value="Them" style="float: right ;margin-bottom:10px ">  
          {{ csrf_field() }}
      </form>
                  <table class="table" style="text-align: center" style="width: 900px">
                    <thead class="thead-inverse" style="background-color:black; color:white">    
                        <tr>
                           <td style="text-align:center">STT</td>
                            <td style="text-align:center">Ma Quản Trị Viên</td>
                            <td style="text-align:center">Họ tên</td>
                            <td style="text-align:center">Ngày Sinh</td>
                            <td style="text-align:center">Giới Tính</td>
                            <td style="text-align:center">SDT</td>
                            <td style="text-align:center">Email</td>
                            <td style="text-align:center">Ghi Chú</td></td>
                            <td style="text-align:center" colspan="2">Thao Tac</td>
                        </tr>
                        {{ csrf_field() }}
                        </thead>
                        <?php $i=0; ?>

                        @foreach($admina as $ada)
                        <form action="/admin/danh_sach_quan_tri_vien/sua/{{$ada->user_name}}" method="post">
                         <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <tr>
                        	<td><?php echo ++$i; ?></td>
                            <td><input type="text" name="msv" value="{{$ada->user_name}}" style="width: 50px ;background: #F8F8FF ;border: 0px" readonly></td>

                            <td><textarea style="width: 80px;background: #F8F8FF ;border: 0px;text-align: center;" name="ten"> {{$ada->full_name}}</textarea></td>

                            <td><textarea style="width: 60px;background: #F8F8FF ;border: 0px;text-align: center;" name="ngaysinh"> {{$ada->birthday}}</textarea></td>
                             
                            <td>
                              <select  name="gioitinh" style="width: 50px ;background: #F8F8FF ;border: 0px">
                                <option value="Nam" <?php echo checked('Nam',$ada->gender)?>>Nam</option>
                                <option value="Nữ" <?php echo checked('Nữ',$ada->gender)?>>Nữ</option>
                                <option value="Khác"<?php echo checked('Khác',$ada->gender)?>>Khác</option>
                              </select>

                          </td>         

                            <td><textarea style="width: 50px;background: #F8F8FF ;border: 0px;text-align: center;" name="sdt">{{$ada->phone_number}}</textarea></td>

                            <td><textarea style="width: 60px;background: #F8F8FF ;border: 0px;text-align: center;" name="email"> {{$ada->email}}</textarea></td>

                            <td><textarea style="width: 60px;background: #F8F8FF ;border: 0px;text-align: center;" name="ghichu">{{$ada->note}}</textarea></td>
                            
                            <td><input type="submit" name="sua" value="Sua">
                                {{ csrf_field() }}
                              </form>
                              <form action="/admin/danh_sach_quan_tri_vien/xoa_qtv/{{$ada->user_name}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input style="margin-top: 10px" type="submit" name="" value="Xoa">
                              </form>
                             </td>
                           
                        </tr>
                        @endforeach
 
                  </table>
</div>
        <div class="panel-footer" style="width: 960px">
          <div class="row">
            <div class="col col-xs-4"></div>
            <div class="col col-xs-8">
              <ul class="pagination hidden-xs pull-right">
               {!!$admina->links()!!}
              </ul>
              <ul class="pagination visible-xs pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
        </div>
@endsection




