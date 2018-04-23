@extends('admin.layout.home_admin')
@section('content')
<div class="panel-footer" style="width: 960px ;margin-right: 10px" >
  @if (session('success'))
         <div class="alert alert-success" style="text-align: center;">
            <p>{{ session('success') }}</p>
         </div>
  @endif 
      <h3 style="text-align:center">Danh Sách Loại Đồ Án  </h3>
      <form action="/admin/danh_sach_loai_do_an/them_lda" method="post">
        <input type="submit" name="Them" value="Them" style="float: right ;margin-bottom:10px ">  
          {{ csrf_field() }}
      </form>
                  <table class="table" style="text-align: center" style="width: 900px">
                    <thead class="thead-inverse" style="background-color:black; color:white">    
                        <tr>
                            <td style="text-align:center">ID</td>
                            <td style="text-align:center">Tên Loại Đồ Án</td>
                            <td style="text-align:center">Thao Tác</td>
                        </tr>
                        {{ csrf_field() }}
                        </thead>
                        <?php $i=0;?>
                        @foreach($loaidoan as $lda)
                        <tr>
                          <form action="/admin/danh_sach_loai_do_an/sua/{{$lda->id}}" method="post">
                         <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <td><?php echo ++$i;?></td>
                            <td><textarea style="width: 150px;background: #F8F8FF ;border: 0px" name="ten_loai_do_an"> {{$lda->ten}}</textarea></td>
                        <td>
                          
                          <input type="submit" name="sua" value="Sua">
                                {{ csrf_field() }}
                              </form>
                          <form action="/admin/danh_sach_loai_do_an/xoa/{{$lda->id}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input style="margin-top: 10px" type="submit" name="" value="Xoa">
                              </form>
                        </td>   
                        </tr>
                        @endforeach
 
                  </table>
</div>
        <div class="panel-footer" style="width: 950px">
          <div class="row">
            <div class="col col-xs-8">
              <ul class="pagination hidden-xs pull-right">
               {!!$loaidoan->links()!!}
              </ul>
              <ul class="pagination visible-xs pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
        </div>
@endsection
