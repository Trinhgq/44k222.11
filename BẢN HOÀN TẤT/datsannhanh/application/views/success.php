<!DOCTYPE html>
<html>
<head>
	<title>Cập nhật thành công</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<h1 style="text-align: center;color: green;">Cập nhật thành công!</h1>
<div style="margin: auto;">
	<p>Website tự chuyển hướng sau 3s!</p>
	<p>Nếu không chờ vui lòng click <a href="<?php echo base_url();?>acountmanager">vào đây</a></p>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		setTimeout(function(){ location.replace("<?php echo base_url();?>acountmanager"); }, 3000);
	});
</script>
</body>

</html>