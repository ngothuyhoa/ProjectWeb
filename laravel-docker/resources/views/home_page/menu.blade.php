

<!DOCTYPE html>
<html lang="en" >

<head>

  <meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="https://static.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
  <link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
  <title>CodePen - Ví dụ về Dropdown Menu đơn giản</title>
  
      <style>
      /*==Reset CSS==*/
* {
  margin: 0;
  padding: 0;
}

/*==Style cơ bản cho website==*/
body {
  font-family: sans-serif;
  color: #333;
}

/*==Style cho menu===*/
#menu ul {
  background: #1F568B;
  list-style-type: none;
  text-align: center;
}
#menu li {
  color: #f1f1f1;
  display: inline-block;
  width: 120px;
  height: 40px;
  line-height: 40px;
  margin-left: -5px;
}
#menu a {
  text-decoration: none;
  color: #fff;
  display: block;
}
#menu a:hover {
  background: #F1F1F1;
  color: #333;
}

/*==Dropdown Menu==*/
.sub-menu {
  display: none;
  position: absolute;
}
#menu li {
  position: relative;
}
#menu li:hover .sub-menu {
  display: block;
}
.sub-menu li {
  margin-left: 0 !important;
}

/*==Menu cấp 3==*/
.sub-menu > ul {
  display: none !mportant;
}
    </style>

  <script>
  window.console = window.console || function(t) {};
</script>

  
  
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


</head>

<body translate="no" >

  <div id="menu">
  <ul>
    <li><a href="#">Trang chủ</a></li>
    <li><a href="#">Diễn đàn</a></li>
    <li><a href="#">Tin tức</a>
      <ul class="sub-menu">
        <li><a href="#">WordPress</a></li>
        <li><a href="#">SEO</a></li>
        <li><a href="#">Hosting</a>
        </li>
      </ul>
    </li>
    <li><a href="#">Hỏi đáp</a></li>
    <li><a href="#">Liên hệ</a></li>
  </ul>
</div>

</body>

</html>
 