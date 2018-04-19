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
             <img src="/admin_acsset/bootstrap/image/f.png" height="100px" width="100px" style="margin-left: 130px;margin-top: 10px;margin-bottom: 10px">
             <div style="background: #ecf9f2 ;border: 0px ;margin-bottom: 10px;text-align: center;color: blue" type="text" name="">
                 <a href="/download/{{$do_an->id}}">Ten file :{{$do_an->file_bao_cao}}</a>
             </div> 
             <form action="/admin/file_bao_cao/sua/{{$do_an->id}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
             <input style="margin-left: 100px" type="file" name="filesTest" required="true" />
            </div>
            <input style="margin-left: 155px" type="submit" name="Save" value="Save">
            </form> 
            <form action="/admin/home_admin" method="get">
               <input style="margin-left: 155px; margin-top: 10px" type="submit" name="" value="Back">  
            </form>
        </div>

     </div>
</div>
                   
              
@endsection