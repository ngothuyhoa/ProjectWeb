@extends('teacher.index')

@section('content')

	<?php if(isset($flag)) {?>
		<h2 style="text-align:center; padding:20px"><b>Cập nhật thành công</b></h2>
	<?php } else { echo $project[0]['id'];?>
		<h2 style="text-align:center; padding:20px"><b>Các đồ án chưa nhập điểm</b></h2>
		<table class="table" style="text-align: center; font-size:12px">
			<thead class="thead-inverse" style="background-color:black; color:white">
				<tr>
					<th style="text-align:center">#</th>
					<td style="text-align:center">Họ tên</td>
					<td style="text-align:center">Lớp/Khóa</td>
					<td style="text-align:center">Email/SDT</td>
					<td style="text-align:center">Loại Đồ Án/Tên Đề Tài</td>
					<td style="text-align:center">Học Kỳ</td>
					<td style="text-align:center">Điểm</td>
					<td style="text-align:center">File báo cáo</td>
				</tr>
			</thead>
			<tbody style="background-color:white; color:black">
				<?php 
					for($i=0; $i<count($project); $i++){
				?>
					<tr>
						<th scope="row"><?php echo $i+1; ?></th>
						<td><?php echo $project[$i]['ten_sinh_vien']; ?></td>
						<td><?php echo $project[$i]['class']."</br>".$project[$i]['school_year'];?></td>
						<td><?php echo $project[$i]['email']."</br>".$project[$i]['phone_number'];?></td>
						<td><?php echo $project[$i]['loai_do_an']."</br>".$project[$i]['ten_de_tai'];?></td>
						<td><?php echo $project[$i]['hoc_ky'];?></td>
						<td>
							<form method="get" action="save_score_by_teacher">
								<input type="hidden" name="id_do_an" value="<?php echo $project[$i]['id']?>">
								<input type="text" name="diem">
							</form>
						</td>
						<td><?php echo $project[$i]['file_bao_cao'];?></td>
					</tr>
				<?php 
					}
				?>
			</tbody>
		</table>
	<?php }?>
@endsection