@if(Auth::check())  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ quản trị viên</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="/admin_acsset/bootstrap/css2/bootstrap.min.css" />
    <script type="text/javascript" src="/admin_acsset/bootstrap/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/admin_acsset/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/admin_acsset/bootstrap/cache/fonts">
    <style type="text/css">
      table{
          width: 100%;
          height: 200px;
      }
      table,th,td{
          border:1px solid #BEBEBE;
          border-collapse: collapse;
      }
  </style>
</head>


<body style="background-color:#135058">
        @include('giangvien.layout.header');
        

    <div class="container-fluid" style="width:1250px; background-color:#dedede">
         <div style="padding-top:30px">
              <div class="row">
                <div class="col-md-9">
                   @yield('content')
                </div>
                
                <div class="col-md-3" style="float: right">
                        
                      @include('giangvien.layout.thong_tin_ca_nhan')
                      @include('giangvien.layout.thao_tac_he_thong')
                         
                </div>
              </div>

                <div class="modal-footer">

            

                </div>
              </div>
    </div> 

     <div class="footer" style="color:white">       
      @include('giangvien.layout.footer');
      </div>
</body>
</html>

@else 
<div class="container" style="">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4" style="margin-top: 100px ">
            <h1 class="text-center login-title" style="text-align: center; color: green">Bạn Chưa Đăng Nhập</h1>
            <p style="text-align: center;"><a href="/login_form">Click vào đây để đăng nhập</a></p>
            
        </div>
    </div>
</div>
@endif
