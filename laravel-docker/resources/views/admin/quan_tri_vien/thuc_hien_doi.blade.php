@extends('admin.layout.home_admin')
@section('content')
@if (session('success'))
                                    <div class="alert alert-success" style="text-align: center;">
                                          <p>{{ session('success') }}</p>
                                    </div>
                                    @endif
<div class="col-lg-9" style="padding-bottom:120px ;margin-left: 100px">
    <div class="row"> 
        <div class="col-md-3 col-md-offset-3" style="background-color:   #ecf9f2; width: 400px;height: 300px; margin-top: 100px;border-style: groove;">

        	<div style="margin-top: 10px">
        		<form action="/admin/thong_tin_ca_nhan/doi_mat_khau/thuc_hien_doi/{{$admin->user_name}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label>Nhap mat khau moi:</label>
                    <input class="form-control" type="password" name="mat_khau_moi" placeholder="Please Enter password" required/>
                </div>
                <div class="form-group">
                    <label>Xac nhan mat khau moi:</label>
                    <input class="form-control" type="password" name="xac_nhan" placeholder="Please Enter password" required/>
                </div>
             	
           	 	<input style="margin-left: 155px" type="submit" name="Save" value="Check">
            	</form> 
           		 <form action="/admin/home_admin" method="get">
               <input style="margin-left: 155px; margin-top: 10px" type="submit" name="" value="Back">  
            </form>
           
             
        	</div>
        	
        </div>

     </div>
</div>
                   
              
@endsection