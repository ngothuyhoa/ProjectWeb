<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Trang chủ sinh viên</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="/admin_acsset/bootstrap/css2/bootstrap.min.css" />
    <script type="text/javascript" src="/admin_acsset/bootstrap/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/admin_acsset/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/admin_acsset/bootstrap/cache/fonts">
</head>
<body  style="background-color:#135058">
	
    @include('layout.navbar')
	<div class="container-fluid" style="width:1250px; background-color:#dedede">
        <div style="padding-top:30px">
            <div class="row">
               	<div class="col-md-9">
                   @yield('content')
                </div>
                <div class="col-md-3" style="float: right">  
                    @include('student.layout.information_private')
                    @include('student.layout.operation_system')
                         
                </div>
            </div>
            @include('student.layout.update_information_private')
        </div>
    </div>
    <br><br>
    @include('layout.footer') 
    
</body>
</html>