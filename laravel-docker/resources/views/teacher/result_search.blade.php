@extends('teacher.index')

@section('content')
	<?php if(count($student)>0){ ?>
		<h2 style="text-align:center; padding:20px"><b>Kết quả tìm kiếm theo sinh viên</b></h2>
		<table class="table" style="text-align:center; font-size: 12px">
	        <thead class="thead-inverse" style="background-color:black; color:white">
	            <tr>
	                <th style="text-align:center">#</th>
	                <th style="text-align:center">Mã SV</th>
	                <th style="text-align:center">Họ Tên</th>
	                <th style="text-align:center">Ngày Sinh</th>
	                <th style="text-align:center">Giới Tính</th>
	                <th style="text-align:center">Bộ Môn</th>
	                <th style="text-align:center">Email</th>
	                <th style="text-align:center">SDT</th>
	                <th style="text-align:center">Địa Chỉ</th>
	                <th style="text-align:center">Ghi chú</th>
	            </tr> 
	        </thead>
	        <tbody style="background-color:white; color:black">
	            <?php 
	                for($i=0; $i<count($student); $i++){
	            ?>
	                    <tr>
	                        <th scope="row"><?php echo $i+1; ?></th>
	                        <td><?php echo $student[$i]['user_name']; ?></td>
	                        <td><?php echo $student[$i]['full_name']; ?></td>
	                        <td><?php echo $student[$i]['birthday']; ?></td>
	                        <td><?php echo $student[$i]['gender'] ?></td>
	                        <td><?php echo $student[$i]['bo_mon'] ?></td>
	                        <td><?php echo $student[$i]['email']; ?></td>
	                        <td><?php echo $student[$i]['phone_number']; ?></td>
	                        <td><?php echo $student[$i]['address']; ?></td>
	                        <td><?php echo $student[$i]['note']; ?></td>
	                    </tr>
	            <?php 
	                }
	            ?>
	        </tbody>
    	</table>
	<?php } ?>
	<br>
	<?php if(count($teacher)>0){ ?>
		<h2 style="text-align:center; padding:20px"><b>Kết quả tìm kiếm theo giảng viên</b></h2>
		<table class="table" style="text-align:center; font-size: 12px">
	        <thead class="thead-inverse" style="background-color:black; color:white">
	            <tr>
	                <th style="text-align:center">#</th>
	                <th style="text-align:center">Mã GV</th>
	                <th style="text-align:center">Họ Tên</th>
	                <th style="text-align:center">Ngày Sinh</th>
	                <th style="text-align:center">Giới Tính</th>
	                <th style="text-align:center">Bộ Môn</th>
	                <th style="text-align:center">Email</th>
	                <th style="text-align:center">SDT</th>
	                <th style="text-align:center">Ghi chú</th>
	            </tr> 
	        </thead>
	        <tbody style="background-color:white; color:black">
	            <?php 
	                for($i=0; $i<count($teacher); $i++){
	            ?>
	                    <tr>
	                        <th scope="row"><?php echo $i+1; ?></th>
	                        <td><?php echo $teacher[$i]['user_name']; ?></td>
	                        <td><?php echo $teacher[$i]['full_name']; ?></td>
	                        <td><?php echo $teacher[$i]['birthday']; ?></td>
	                        <td><?php echo $teacher[$i]['gender'] ?></td>
	                        <td><?php echo $teacher[$i]['bo_mon']; ?></td>
	                        <td><?php echo $teacher[$i]['email']; ?></td>
	                        <td><?php echo $teacher[$i]['phone_number']; ?></td>
	                        <td><?php echo $teacher[$i]['note']; ?></td>
	                    </tr>
	            <?php 
	                }
	            ?>
	        </tbody>
    	</table>
	<?php } ?>
	<br>
	<div class="row">
            <div class="col col-xs-4"> </div>
            <div class="col col-xs-8">
              <ul class="pagination hidden-xs pull-right">
               
              </ul>
              <ul class="pagination visible-xs pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
@endsection