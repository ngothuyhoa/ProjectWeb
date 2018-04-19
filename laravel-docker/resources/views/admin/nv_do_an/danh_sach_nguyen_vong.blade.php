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
                  <h3 style="text-align:center">Danh sách phân công đồ án</h3>
                 
                  <table class="table" style="text-align: center" style="width: 900px ;table-layout: fixed;" >
                    <thead class="thead-inverse" style="background-color:black; color:white">
                            
                        <tr>
                            <td style="text-align:center">STT</td>
                            <td style="text-align:center">Họ tên</td>
                            <td style="text-align:center">Mã SV</td>
                            <td style="text-align:center">Lớp</td>
                            <td style="text-align:center">Khóa</td>
                            <td style="text-align:center">Tên Đề Tài</td>
                            <td style="text-align:center">GVHD</td>
                            <td style="text-align:center">Mã GV</td>
                            <td style="text-align:center">Bo Mon</td>
                            <td style="text-align:center">Loại Đồ Án</td>
                            <td style="text-align:center">Học Kỳ</td>
                            <td style="text-align:center">Trang Thai</td>
                            <td style="text-align:center">Thao tac</td> 
                        </tr>
                    </thead>
                    <?php $i=0;?>

                    @foreach($nv_do_an as $nv_da)
                        <tr>
                            <td><?php echo ++$i;?></td>
                             <td> {{$nv_da->ten}}</td>
                             <td><input type="text" name="msv" value="{{$nv_da->ma_sv}}" style="width: 50px ;background: #F8F8FF ;border: 0px"></td>
                            <td>{{$nv_da->lop}}</td>
                            <td>{{$nv_da->khoa}}</td>
                            <td>
                              <div style="word-wrap: break-word;">
                                <textarea style="width: 60px;height: 100px;background: #F8F8FF ;border: 0px" name="ten_de_tai"> {{$nv_da->ten_de_tai}}</textarea>
                              </div>
                             
                            </td>
                            <td>{{$nv_da->gvhd}}</td>
                            <td><input type="text" name="mgv" value="{{$nv_da->ma_gv}}" style="width: 50px ;background: #F8F8FF ;border: 0px"></td>
                            <td><select  id="" name="bomon" style="width:55px;background: #F8F8FF ;border: 0px ;padding: 0px;margin-top: 0px" >
                                    @foreach($bomon as $bm)
                                     <option <?php echo checked($bm->ten_bo_mon_viet_tat,$nv_da->ten_viet_tat); ?>>{{$bm->ten_bo_mon_viet_tat}}</option>
                                 @endforeach
                             </select></td>
                            <td><select  name="loai_da" style="width:60px;background: #F8F8FF ;border: 0px ;padding-left: 0px;margin-left: 0px" >
                                    @foreach($loaidoan as $lda)
                                     <option <?php echo checked($lda->ten,$nv_da->ten_da); ?> >{{$lda->ten}}</option>
                                 @endforeach
                             </select></td>
                            <td><input type="text" name="hoc_ky" value="{{$nv_da->hoc_ky}}" style="width: 40px ;background: #F8F8FF ;border: 0px"></td>
                            <td>hih</td>
                            <td>
                               <form action="/admin/duyet_do_an/{{$nv_da->id}}" method="post">
                         <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="submit" name="duyet" value="Duyệt">
                                {{ csrf_field() }}
                              </form>
                              <form>
                              <input type="submit" name="huy" value="Hủy" style="margin-top: 10px">
                              </form>
                              
                            </td>
                        </tr>
                    
                     @endforeach   
 
                    
                    <tbody></tbody>
                  </table>
</div>
        <div class="panel-footer" style="width: 960px">
          <div class="row">
            <div class="col col-xs-8">
              <ul class="pagination hidden-xs pull-right">
              {!!$nv_do_an->links()!!}
              </ul>
              <ul class="pagination visible-xs pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
        </div>
@endsection

                      