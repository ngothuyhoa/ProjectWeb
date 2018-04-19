@extends('admin.layout.home_admin')
@section('content')
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
                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <td>{{$gv->user_name}}</td>
                            <td>{{$gv->full_name}}</td>
                            <td>{{$gv->birthday}}</td>
                            <td>{{$gv->gender}}</td>
                            <td>{{$gv->phone_number}}</td>
                            <td>{{$gv->email}}</td>
                            <td>{{$gv->tenbomon}}</td>
                            <td>{{$gv->note}}</td>
                            
                            <td><a href="/admin/danh_sach_giang_vien/sua_gv/{{$gv->user_name}}"> Sửa</a> <a href="/admin/danh_sach_giang_vien/xoa_gv/{{$gv->user_name}}">Xóa </a> </td>
                           
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




