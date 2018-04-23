<?php $teacher= session('teacher'); ?>
<div class="col-md-11" style="float: right">
    <table class="table" style="">
        <thead class="thead-inverse" style="background-color:black; color:white">
            <tr>
                <th style="text-align: center; font-size:15px">Thông Tin Cá Nhân</th>
            </tr>
        </thead>
        <tbody style="font-size: 12px; background-color:white">
            <tr class="table-primary">
                <th><img src="/admin_acsset/bootstrap/open-iconic-master/svg/browser.svg">  Mã Số : {{$teacher->user_name}}
                </th>
            </tr>
            <tr class="table-success">
                <th><img src="/admin_acsset/bootstrap/open-iconic-master/svg/browser.svg">  Họ Tên: {{$teacher->full_name}}
                </th>
            </tr>
            <tr class="table-danger">
                <th><img src="/admin_acsset/bootstrap/open-iconic-master/svg/browser.svg">  Email: {{$teacher->email}}
                </th>
            </tr>
            <tr class="table-dark">
                <th><img src="/admin_acsset/bootstrap/open-iconic-master/svg/browser.svg">  Điện Thoại: {{$teacher->phone_number}}
                </th>
            </tr>
        </tbody>
    </table>
</div>