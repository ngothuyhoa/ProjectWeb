@extends('student.index')

@section('content')
	<h2 style="text-align:center"><b><?php if(isset($loai_do_an)) echo $bo_mon." - ".$loai_do_an; else echo $bo_mon; ?></b></h2>
	<br><br>
	<table class="table" style="text-align: center; font-size:12px">
	    <thead class="thead-inverse" style="background-color:black; color:white">
	    	<tr>
				<td style="text-align:center">#</td>
				<td style="text-align:center">Học Kỳ</td>
				<td style="text-align:center">Tên Đề Tài</td>
				<td style="text-align:center">Sinh Viên</td>
				<td style="text-align:center">Giảng Viên</td>
				<td style="text-align:center">Điểm</td>
				<td style="text-align:center">File Báo Cáo</td> 
			</tr>
	    </thead>
	    <tbody style="background-color:white; color:black">
			<?php for($i=0; $i<count($project); $i++) {?>
				<tr style="background-color:white; color:black">
					<th scope="row"><?php echo $i+1; ?></th>
					<td><?php echo $project[$i]['hoc_ky']; ?></td>
					<td><?php echo $project[$i]['ten_de_tai'] ?></td>
					<td><?php echo $project[$i]['ten_sinh_vien'] ?></td>
					<td><?php echo $project[$i]['ten_giang_vien'] ?></td>
					<td><?php echo $project[$i]['diem'] ?></td>
					<td><?php echo $project[$i]['file_bao_cao'] ?></td>	
				</tr>
			<?php }?>
		</tbody>
	</table>
	
          <div class="row">
            <div class="col col-xs-4"> </div>
            <div class="col col-xs-8">
              <ul class="pagination hidden-xs pull-right">
               {!!$project->links()!!}
              </ul>
              <ul class="pagination visible-xs pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
       
@endsection