<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ quản trị viên</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>


<body style="background-color:#135058">
        @include('student.layout.header');
        

    <div class="container-fluid" style="width:1250px; background-color:#dedede">
         <div style="padding-top:30px">
              <div class="row">
                <div class="col-md-9">
                    @include('student.danh_sach_bo_mon.ds_bo_mon');
                </div>
                <div class="col-md-3" style="float: right">
                    
                      @include('student.layout.thong_tin_ca_nhan');
                      @include('student.layout.thao_tac_he_thong');
                         
                </div>
              </div>

                <div class="modal-footer">

            

                </div>
              </div>
    </div> 

     <div class="footer" style="color:white">       
      @include('student.layout.footer');
      </div>
</body>
</html>