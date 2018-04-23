<div class="col-md-11" style="float: right">
    <table class="table" style="margin-top: 20px" >
          <thead class="thead-inverse" style="background-color:black; color:white">
              <tr>
                  <th style="text-align: center; font-size:15px">Thao Tác Hệ Thống</th>
              </tr>
          </thead>
          <tbody style="font-size: 13px">
              <tr style="background-color:white">
                  <td><a href="{{route('home_student')}}" style="color:black"><img src="/admin_acsset/bootstrap/open-iconic-master/svg/calculator.svg"> Danh sách đồ án</a>
                  </td>
              </tr>
              <tr style="background-color:white">
                  <td><a href="{{route('aspiration_project')}}" style="color:black"><img src="/admin_acsset/bootstrap/open-iconic-master/svg/calculator.svg"> Nguyện vọng đồ án</a>
                  </td>
              </tr>
              <tr style="background-color:white">
                  <td>
                  		<form method="POST" action="change_password_student">
                  				<img src="/admin_acsset/bootstrap/open-iconic-master/svg/calculator.svg"><input type="submit" class="btn-link" name="go" value="Đổi mật khẩu" style="color:black"/>
                  						{{ csrf_field() }}
                  		</form>
                  </td>
              </tr>
              <tr style="background-color:white">
                  <td>
                  		<a type="button" data-toggle="modal" data-target="#updateInforStudent"><div style="color: black"> <img src="/admin_acsset/bootstrap/open-iconic-master/svg/calculator.svg"> Cập nhật thông tin cá nhân</div></a>
                  </td> 
              </tr>
              <tr style="background-color:white">
                  <td><a href="{{url('logout')}}" style="color:black"><img src="/admin_acsset/bootstrap/open-iconic-master/svg/power-standby.svg"> Đăng xuất</a></td>
              </tr>
          </tbody>
    </table>
</div>
