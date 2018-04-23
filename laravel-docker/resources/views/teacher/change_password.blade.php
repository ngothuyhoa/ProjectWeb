@extends('teacher.index')

@section('content')

	<h2 style="text-align:center"><b>Đổi Mật Khẩu</b></h2>
    </br></br>

    <form method="POST" action="check_old_password_teacher">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    	<h4 style="text-align:center; padding:20px">Nhập Mật Khẩu Cũ : <input type="text" name="oldPassword" id="oldPassword" value="" placeholder= "Nhập Mật Khẩu Cũ" onkeyup="check_old_password()"/>
    	</h4> 					
    	<div id="btnOldPassword" style="text-align: center">
    	</div>

        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4" style="margin-left:10px">
                <?php if(isset($error)) echo $error; ?>
            </div>
        </div>
    					
    </form>

@endsection