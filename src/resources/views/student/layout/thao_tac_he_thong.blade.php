<table class="table">
                        <thead class="thead-inverse" style="background-color:black; color:white">
                            <tr>
                                <th style="text-align:center; font-size:15px">Thao tác hệ thông</th>
                            </tr>
                        </thead>
                        <tbody style="font-size:13px">
                                    <tr style="background-color: white">
                                        <td>
                                            <form method="POST" action="danh_sach_sinh_vien">
                                                <img src='admin_acsset/bootstrap/open-iconic-master/svg/calculator.svg'><input type="submit" class="btn-link" name="go" value="Danh sách sinh viên" style="color:black"/>
                                              {{ csrf_field() }}
                                            </form>
                                        </td>
                                    </tr>
                                    <tr style="background-color:white">
                                        <td>
                                            <form method="POST" action="danh_sach_giang_vien">
                                                <img src='admin_acsset/bootstrap/open-iconic-master/svg/calculator.svg'><input type="submit" class="btn-link" name="go" value="Danh sách giảng viên" style="color:black"/>
                                                {{ csrf_field() }}
                                            </form>
                                        </td>
                                    </tr>
                                    <tr style="background-color:white">
                                        <td>
                                            <form method="POST" action="dangky">
                                                <img src='admin_acsset/bootstrap/open-iconic-master/svg/calculator.svg'><input type="submit" class="btn-link" name="go" value="Dang ky nguyen vong" style="color:black"/>
                                                {{ csrf_field() }}
                                            </form>
                                        </td>
                                    </tr>
                                    <tr style="background-color:white">
                                        <td>
                                            <form method="POST" action="educations_list.php?home=home_admin.php">
                                                <img src='admin_acsset/bootstrap/open-iconic-master/svg/calculator.svg'><input type="submit" class="btn-link" name="go" value="Danh sách giáo vụ" style="color:black"/>
                                                {{ csrf_field() }}
                                            </form>
                                        </td>
                                    </tr>
                                    <tr style="background-color:white">
                                        <td>
                                            <form method="POST" action="danh_sach_bo_mon">
                                                <img src='admin_acsset/bootstrap/open-iconic-master/svg/calculator.svg'><input type="submit" class="btn-link" name="go" value="Danh sách bộ môn" style="color:black"/>
                                             {{ csrf_field() }}
                                            </form>
                                        </td>
                                    </tr>
                                    <tr style="background-color:white">
                                        <td>
                                            <form method="POST" action="change_password">
                                                <img src="admin_acsset/bootstrap/open-iconic-master/svg/calculator.svg"><input type="submit" class="btn-link" name="go" value="Đổi mật khẩu" style="color:black"/>
                                                {{ csrf_field() }}
                                            </form>
                                        </td>
                                    </tr>
                                    
                                        <tr style="background-color:white">
                                        <td><button type="button" class="btn-link" data-toggle="modal" data-target="#updateInfor"><div style="color: black"><img src="admin_acsset/bootstrap/open-iconic-master/svg/calculator.svg"> Cập nhật thông tin cá nhân</div></button></td> 
                                    </tr>
                                   
                                    
                                <tr style="background-color:white">
                              <td><a href="capnhat" style="color:black"><img src="admin_acsset/bootstrap/open-iconic-master/svg/power-standby.svg"> Đăng Bài Viết</a></td>
                                 </tr>
                                <tr style="background-color:white">
                                        <td><a href="index.php" style="color:black"><img src="admin_acsset/bootstrap/open-iconic-master/svg/power-standby.svg"> Đăng xuất</a></td>
                                </tr>
                            </tbody>
                    </table>