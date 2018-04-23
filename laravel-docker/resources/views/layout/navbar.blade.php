<?php 
  $bo_mon = session('bo_mon'); 
  $loai_do_an = session('loai_do_an');
?>
    <nav class="navbar navbar-inverse">
          <div class="container-fluid row" style="background-color:black">
              
              <!--logo-->
              <div class="navbar-header col-md-3">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">
                  <div class="logo">
                    <h1 style="color: white"><img src="/admin_acsset/bootstrap/image/15267511_10154197624095748_4748506818350992710_n.jpg" height="93px" width="150px" style="padding-left: 30px; margin-top: -40px">SOICT</h1>
                  </div>
                </a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="login" >
                  </br></br>
                  <a href="#">B1.Phòng 602 </a>
                </li>
              </ul>
              <!--Menu Item-->
              <div class="collapse navbar-collapse col-md-7" id="mainNavBar">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="<?php echo $home; ?>">Home</a></li>
                </ul>
              </div>
              @foreach($bo_mon as $bm)
              <div class="collapse navbar-collapse col-md-7" id="mainNavBar">
                <ul class="nav navbar-nav">
                  
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                         {{$bm->ten_bo_mon_viet_tat}}
                        <span class="caret"></span>
                      </a>
                        <ul class="dropdown-menu">
                          <li>
                              <form method="POST" action="project_refer?id_bo_mon={{$bm->id}}&id_loai_do_an=0">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn-link" name="go" value="Tất cả" style="color:black"/>
                              </form>
                            </li>
                          @foreach($loai_do_an as $lda) 
                            <li>
                              <form method="POST" action="project_refer?id_bo_mon={{$bm->id}}&id_loai_do_an={{$lda->id}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn-link" name="go" value="{{$lda->ten}}" style="color:black"/>
                              </form>
                            </li>
                          @endforeach
                        </ul> 
                    </li>
                </ul>
              </div>
              @endforeach
        </div>
      </nav>
    <div style="padding-bottom: 30px" class="row">
          <div class = "col-lg-3"></div>
        <form method="POST" action="controller_search_{{$home}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="input-group col-lg-6">
            <input type="text" class="form-control" placeholder="Search for..." name="key_word">
            <span class="input-group-btn">
                <input class="btn btn-secondary" type="submit" name="search" value="Go"/>
            </span>
        </div>
        </form>
        <div class = "col-lg-3"></div>
 
    </div>