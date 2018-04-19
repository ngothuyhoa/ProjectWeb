
 <nav class="navbar navbar-inverse">
          <div class="container-fluid row" style="background-color:black;margin-top: 0px">           
              <div class="navbar-header col-md-1" style="margin-top: 0px">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">
                  <div class="logo" style="float: left;width: 200px;">
                    
                    <h3 style="color: white;"><img src="/admin_acsset/bootstrap/image/15267511_10154197624095748_4748506818350992710_n.jpg" height="70px" width="100px" style="padding-left: 0px; margin-top: -40px"><br>SOICT ADMIN</h3>
                  </div>
                </a>
              </div>
              <ul class="nav navbar-nav" style="float: right;">
                <li>
                  <a href="/logout" style="color: white;margin-right: 10px;float: right;"> <img src='/admin_acsset/bootstrap/image/logout.png'>  logout</a>
                  
                </li>
                
              </ul>
              
              
              <!--Menu Item-->
              <div class="collapse navbar-collapse col-md-7" id="mainNavBar">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="/admin/home_admin">Home</a></li>
                </ul>
              </div>
              @foreach($bomon as $bm)
              <div class="collapse navbar-collapse col-md-7" id="mainNavBar">
                <ul class="nav navbar-nav">
                  
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                         {{$bm->ten_bo_mon_viet_tat}}
                        <span class="caret"> </span></a>
                     
                      <ul class="dropdown-menu">
                        <li>
                          <form method="POST" action="/admin/do_an/{{$bm->id}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="submit" class="btn-link" name="go" value="All" style="color:black"/>
                          </form>
                        </li>
                        @foreach($loaidoan as $lda)
                        <li>
                          <form method="POST" action="/admin/do_an/{{$bm->id}}/{{$lda->id}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="submit" class="btn-link" name="go" value="{{$lda->ten}}" style="color:black"/>
                          </form>
                          @endforeach
                      </ul>
             

                    </li>
                 
                </ul>
              </div>
              <div>
                
              </div>
              @endforeach
             <ul class="nav navbar-nav navbar-right" style="float: right;">
                <li class="login" style="margin-right: 10px;float: right;">
               
                  <ul class="nav navbar-nav">
                    <p></p><br>
                    <p></p>
                    <li> <a href="/admin/duyet_do_an">Notification <span class="badge" style="background: red">{{$dem}}</span></a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                         <img src="/admin_acsset/bootstrap/image/user_1.png">  {{$admin->full_name}}
                        <span class="caret"> </span></a>
                     
                      <ul class="dropdown-menu">
                        <li>
                          <form method="POST" action="/admin/thong_tin_ca_nhan/sua_qtv/{{$admin->user_name}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="submit" class="btn-link" name="go" value="Thong tin ca nhan" style="color:black"/>
                          </form>
                          
                        </li>
                        <li>
                          <form method="POST" action="/admin/thong_tin_ca_nhan/doi_mat_khau/{{$admin->user_name}}">
                           <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="submit" class="btn-link" name="go" value="Doi mat khau" style="color:black"/>
                          </form>
                        </li>
                        
                      </ul>
             

                    </li>
                 
                </ul>
                
                </li>
              </ul>
        </div>
      </nav>
    <div style="padding-bottom: 30px" class="row">
          <div class = "col-lg-3"></div>
        <form method="post" role="form" action="{{ url('admin/search') }}" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{csrf_token()}}"> 
        <div class="input-group col-lg-6">
            <input type="text" class="form-control" placeholder="Nhap MSV or MGV" name="search">
            <span class="input-group-btn">
               
                <input class="btn btn-secondary" type="submit" name="" value="Go"/>
            </span>
        </div>
        </form>
        <div class = "col-lg-3"></div>
 
    </div>

