<table class="table" style="">
            <thead class="thead-inverse" style="background-color:black; color:white">
                <tr>
                  <th style="text-align: center; font-size:15px">Thông Tin Cá Nhân</th>
                </tr>
            </thead>
              <tbody style="font-size: 12px; background-color:white">

                <tr class="table-primary">
                  <th><img src="admin_acsset/bootstrap/open-iconic-master/svg/browser.svg">  Mã Số : {{$sinhvien1->MSV}}</th>
                </tr>
                <tr class="table-success">
                  <th><img src="admin_acsset/bootstrap/open-iconic-master/svg/browser.svg">  Họ Tên: {{$sinhvien1->Ten}}</th>
                </tr>
                <tr class="table-danger">
                  <th><img src="admin_acsset/bootstrap/open-iconic-master/svg/browser.svg">  Email: {{$sinhvien1->Email}}</th>
                </tr>
                <tr class="table-dark">
                  <th><img src="admin_acsset/bootstrap/open-iconic-master/svg/browser.svg">  Điện Thoại: {{$sinhvien1->SDT}}</th>
                </tr>
              </tbody>
        </table>