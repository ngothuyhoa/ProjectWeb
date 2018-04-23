@extends('student.index')

@section('content')

    <?php $project = session('project'); ?>
	<h2 style="text-align:center; padding:20px"><b>Thông tin phân công các môn đồ án</b></h2>
    <table class="table" style="text-align:center; font-size: 12px">
        <thead class="thead-inverse" style="background-color:black; color:white">
            <tr>
                <th style="text-align:center">#</th>
                <th style="text-align:center">Kỳ</th>
                <th style="text-align:center">Loại Đồ Án</th>
                <th style="text-align:center">Tên Đề Tài</th>
                <th style="text-align:center">Bộ Môn</th>
                <th style="text-align:center">GVHD</th>
                <th style="text-align:center">Email/Phone</th>
                <th style="text-align:center">File Báo Cáo</th>
                <th style="text-align:center">Điểm</th>
            </tr> 
        </thead>
        <tbody style="background-color:white; color:black">
            <?php 
                for($i=0; $i<count($project); $i++){
            ?>
                    <tr>
                        <th scope="row"><?php echo $i+1; ?></th>
                        <td><?php echo $project[$i]['hoc_ky']; ?></td>
                        <td><?php echo $project[$i]['loai_do_an']; ?></td>
                        <td><?php echo $project[$i]['ten_de_tai']; ?></td>
                        <td><?php echo $project[$i]['bo_mon'] ?></td>
                        <td><?php echo $project[$i]['ten_giang_vien']; ?></td>
                        <td><?php echo $project[$i]['email']. '</br>'.$project[$i]['phone_number']; ?></td>
                        <td><?php echo $project[$i]['file_bao_cao']; ?></td>
                        <td><?php echo $project[$i]['diem']; ?></td>
                    </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
    <br><br>
@endsection
