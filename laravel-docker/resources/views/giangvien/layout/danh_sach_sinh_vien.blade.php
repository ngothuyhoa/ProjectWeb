@extends('giangvien.layout.home_giangvien')
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
                  <h3 style="text-align:center">Danh sách sinh viên làm đồ án</h3>
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
                            <td style="text-align:center">Điểm</td>
                            <td style="text-align:center">File Báo Cáo</td> 
                            <td style="text-align:center">Ghi chu</td> 
                            <td style="text-align:center">Thao tac</td> 
                        </tr>
                    </thead>
                    
                     <form action="" method="post">
                         <input type="hidden" name="_token" value="{{csrf_token()}}">
                          @foreach($do_an as $da)
                        <tr>
                              <td>hihi</td>
                             
                             <td>{{$da->ten}}</td>
                             <td>{{ $da->ma_sv}}</td>
                             <td>{{$da->lop}}</td>
                            <td>{{$da->khoa}}</td>
                            <td>{{$da->ten_de_tai}}</td>
                            <td>{{$da->gvhd}}</td>
                            <td>{{$da->ma_gv}}</td>
                            <td><select  id="" name="bomon" style="width:55px;background: #F8F8FF ;border: 0px ;padding: 0px;margin-top: 0px" >
                                    @foreach($bomon as $bm)
                                     <option <?php echo checked($bm->ten_bo_mon_viet_tat,$da->ten_viet_tat); ?>>{{$bm->ten_bo_mon_viet_tat}}</option>
                                 @endforeach
                             </select></td>
                            <td><select  name="loai_da" style="width:60px;background: #F8F8FF ;border: 0px ;padding-left: 0px;margin-left: 0px" >
                                    @foreach($loaidoan as $lda)
                                     <option <?php echo checked($lda->ten,$da->ten_da); ?> >{{$lda->ten}}</option>
                                 @endforeach
                             </select></td>
                            <td>{{$da->hoc_ky}}</td>
                            <td><input type="text" name="diem" value="" style="width: 40px; text-align: center;"></td>
                            <td>{{$da->file_bao_cao}}</td>
                            <td>
                              <div style="word-wrap: break-word;">
                                <textarea style="width: 60px;height: 100px;background: #F8F8FF ;border: 0px" name="note"> </textarea>
                              </div>
                            </td>
                            <td>
                              <a href=""> sua</a>
                            </td>
                        </tr>
                        @endforeach 
                    </form>
                    
 
                    
                    <tbody></tbody>
                  </table>
</div>
        <div class="panel-footer" style="width: 960px">
          <div class="row">
            <div class="col col-xs-8">
              <ul class="pagination hidden-xs pull-right">
              
              </ul>
              <ul class="pagination visible-xs pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
        </div>
@endsection

