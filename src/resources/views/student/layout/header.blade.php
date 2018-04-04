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
                    <h1 style="color: white"><img src="admin_acsset/bootstrap/image/15267511_10154197624095748_4748506818350992710_n.jpg" height="93px" width="150px" style="padding-left: 30px; margin-top: -40px">SOICT</h1>
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
                  <li class="active"><a href="home_student">Home</a></li>
                                  </ul>
              </div>
              <div class="col-md-2">
                <a href="https://www.facebook.com/" class="badge badge-primary">Facebook</a>
                <a href="https://www.instagram.com/" class="badge badge-success">Instagram</a>
                <a href="#" class="badge badge-danger">Tumblr</a>
                <a href="https://www.youtube.com/" class="badge badge-warning">Youtube</a>
              </div>
        </div>
      </nav>
    <div style="padding-bottom: 30px" class="row">
          <div class = "col-lg-3"></div>
        <form method="POST" action="controler_search.php?home=home_admin.php">
        <div class="input-group col-lg-6">
            <input type="text" class="form-control" placeholder="Search for..." name="keyWord">
            <span class="input-group-btn">
                <input class="btn btn-secondary" type="submit" name="search" value="Go"/>
            </span>
        </div>
        </form>
        <div class = "col-lg-3"></div>
 
    </div>