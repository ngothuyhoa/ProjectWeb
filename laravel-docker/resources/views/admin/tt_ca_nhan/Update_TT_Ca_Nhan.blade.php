
<!DOCTYPE html>
<html>
<head>
  <script src="admin_acsset/tinymce/js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ 
  	selector: '#tieu_de',
  	height: 50,
  	menubar: false,
  	plugins: [
    	'advlist autolink lists link image charmap print preview anchor textcolor',
    	'searchreplace visualblocks code fullscreen',
    	'insertdatetime media table contextmenu paste code help'
  	],
  	toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',});
  	tinymce.init({ 
  	selector: '#noi_dung',
  	height: 300,
  	menubar: false,
  	plugins: [
    	'advlist autolink lists link image charmap print preview anchor textcolor',
    	'searchreplace visualblocks code fullscreen',
    	'insertdatetime media table contextmenu paste code help'
  	],
  	toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',});
  
  </script>
</head>
<body>
	<form method="POST" action="controller_news.php">
  		<textarea id="tieu_de" name="tieu_de">Tiêu Đề</textarea>
  		<textarea id="noi_dung" name="noi_dung">Nội dung</textarea>
  		<input type="submit" class="btn" name="up_news"/>
  </form>
</body>
</html>