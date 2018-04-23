
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	<title>Dang nhap</title>
  <link rel="icon" href="http://www.thuthuatweb.net/wp-content/themes/HostingSite/favicon.ico" type="image/x-ico"/>
	<link href="style.css" rel="stylesheet" />
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

</head>
<body style="background:url(/admin_acsset/bootstrap/image/anhnen.jpg);">

<div class="container" style="">
  <div class="row">
  <div class="col-xs-8 col-md-2" style=""></div>
  <div class="col-xs-9 col-md-1" style=""><img style="width: 100px;height: 150px" src="/admin_acsset/bootstrap/image/logo_soict.png" ></div>
  <div class="col-xs-6 col-md-7" style=" padding-top:20px;padding-left: 30px;color: #800000"><h3>VIÊN CÔNG NGHỆ THÔNG TIN VÀ TRUYỀN THÔNG</h3>
<h3 style="text-align: center;">ĐẠI HỌC BÁCH KHOA HÀ NỘI</h3></div>
</div>
  
  
  
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4" style="margin-top: 20px ">

                         @if (session('success'))
                             <div class="alert alert-success" style="text-align: center;background: #F08080; color: white">
                                <p>{{ session('success') }}</p>
                            </div>
                                    @endif
            <h1 class="text-center login-title" style="color: blue">Sign in</h1>
            <div class="account-wall" style="">
                
                 <form class="form-signin" action="login" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" class="form-control" name="username" placeholder="usename" required autofocus >
                <p> </p>
                <input type="password" class="form-control" name="password" placeholder="password" required>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
               
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign in</button>
                </form>
                
                <span class="clearfix"></span>
                
               
            </div>
        </div>
    </div>
</div>
 
</body>
</html>