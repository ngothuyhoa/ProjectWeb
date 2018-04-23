@extends('student.index')

@section('content')

	<script language="javascript">
		function check_new_password(){

			var a = document.getElementById("newPassword");
			var b = document.getElementById("newPassword1");
			var div = document.getElementById("btnNewPassword");

			var newPassword = String(a.value);
			var newPassword1 = String(b.value);


			if(newPassword == newPassword1 && newPassword != ''){
				div.innerHTML = "<input class='btn btn-primary' name= 'btnNewPassword' id='btnLogin' type='submit' value='Lưu'/>";
			}else div.innerHTML = '';
		}
	</script>

	<?php if(isset($flag)) {?>
	<h2 style="text-align:center"><b>Cập nhật thành công</b></h2>
	<?php } else { ?>

		<h2 style="text-align:center"><b>Cập Nhật Mật Khẩu Mới</b></h2>
		<br><br>
	    <form method="POST" action="update_password_student">
	    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	   		<div class = "row">
	    		<div class="col-md-4">
	    		</div>
	    		<div class="col-md-6">
	    			<input style="width:300px" placeholder="Nhập password mới" class="form-control" type="password" name="newPassword" id="newPassword" value="" onkeyup="check_new_password()" required autofocus />
		    		<br>
		    		<input style="width:300px" placeholder="Nhập lại password mới" class="form-control" type="password" name="newPassword1" id="newPassword1" onkeyup="check_new_password()" required autofocus /> 
		 		</div>
		 		<div class="col-md-2">
		 		</div>   	
		 	</div>
		 	<br>
		 	<div id="btnNewPassword" style="text-align: center">
	    	</div>			
	    </form>
	<?php 	} ?>
@endsection