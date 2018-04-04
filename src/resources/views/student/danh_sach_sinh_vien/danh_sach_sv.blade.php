<h2 style="text-align:center; padding:20px">Danh sách sinh vien</h2>
                  <table class="table" style="text-align: center" >
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
                            <td style="text-align:center">Lớp/Niên Khóa</td>
                            <td style="text-align:center">Bộ Môn</td>
                            <td style="text-align:center">Học Kỳ</td>
                             <td style="text-align:center">Loại Đồ Án</td>
                            <td style="text-align:center">Ghi Chú</td></td>
                        </tr>
                        </thead>

                        @foreach($sinhvien as $tl)
                        <tr>
                            <td>{{$tl->id}}</td>
                            <td>{{$tl->MSV}}</td>
                            <td>{{$tl->Ten}}</td>
                            <td>{{$tl->NgaySinh}}</td>
                            <td>{{$tl->GioiTinh}}</td>
                            <td>{{$tl->DiaChi}}</td>
                            <td>{{$tl->SDT}}</td>
                            <td>{{$tl->Email}}</td>
                            <td>{{$tl->Lop}} </td>
                            <td></td>
                            <td> </td>
                            <td> </td>
                            <td>{{$tl->GhiChu}}</td>

                        </tr>
                        @endforeach
 
                    
                    <tbody></tbody>
                  </table>