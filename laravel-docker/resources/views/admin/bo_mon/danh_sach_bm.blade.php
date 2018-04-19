@extends('admin.layout.home_admin')
@section('content')
<div class="panel-footer" style="width: 960px ;margin-right: 10px" >
      <h3 style="text-align:center">Danh Sách Sinh Viên  </h3>
      <form action="/admin/danh_sach_bo_mon/them_bm" method="post">
        <input type="submit" name="Them" value="Them" style="float: right ;margin-bottom:10px ">  
          {{ csrf_field() }}
      </form>
                  <table class="table" style="text-align: center" style="width: 900px">
                    <thead class="thead-inverse" style="background-color:black; color:white">    
                        <tr>
                            <td style="text-align:center">ID</td>
                            <td style="text-align:center">Ten Bo Mon</td>
                            <td style="text-align:center">Ten Viet Tat</td>
                            <td style="text-align:center">Van Phong</td>
                            <td style="text-align:center">SDT</td>
                            <td style="text-align:center">Website</td>                
                            <td style="text-align:center">Email</td>
                            <td style="text-align:center">Ghi Chu</td>
                        </tr>
                        {{ csrf_field() }}
                        </thead>
                        
                        @foreach($bomon1 as $bm)
                        <tr>
                            <td>{{$bm->id}}</td>
                            <td>{{$bm->ten_bo_mon}}</td>
                            <td>{{$bm->ten_bo_mon_viet_tat}}</td>
                            <td>{{$bm->van_phong}}</td>
                            <td>{{$bm->SDT}}</td>
                            <td><a href="http://is.hust.edu.vn/gioi-thieu.html"> {{$bm->website}}</a></td>
                            <td>{{$bm->note}}</td>
                        <td><a href="/admin/danh_sach_bo_mon/sua_bm/{{$bm->id}}"> Sửa</a> | <a href="/admin/danh_sach_bo_mon/xoa_bm/{{$bm->id}}">Xóa </a> </td>   
                        </tr>
                        @endforeach
 
                  </table>
</div>
        <div class="panel-footer" style="width: 950px">
          <div class="row">
            <div class="col col-xs-8">
              <ul class="pagination hidden-xs pull-right">
               {!!$bomon1->links()!!}
              </ul>
              <ul class="pagination visible-xs pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
        </div>
@endsection
