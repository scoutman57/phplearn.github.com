<?php

	include '../../func.php'; 
	if($_SESSION['user']['allow_user'] != '1')
			exit('您没有权限');
?>
<html>
	<head>
		<title>添加用户</title>
	</head>
	<body>
		<h2>添加用户</h2>
		<?php if(isset($_GET['mess'])): ?>
			<p><?php echo $_GET['mess'] ?></p>
		<?php endif; ?>
		<form action="../add.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="act" value="addUser">
			<p>选择班级:<?php echo getClassList() ?></p>
			<p>用户名称:<input type="text" name="username"></p>
			<p>手机号码:<input type="text" name="phone"></p>
			<p>性　　别:<input type="radio" name="gender" value="1" checked="checked"> 男 <input type="radio" name="gender" value="0"> 女 </p>
			<p>语文成绩:<input type="text" name="chinese"></p>
			<p>数学成绩:<input type="text" name="math"></p>
			<p>英语成绩:<input type="text" name="english"></p>
			<p>上传头像:<input type="file" name="pic"></p>
			<p><input type="submit" name="sub" value="提交"></p>
		</form>
	</body>
</html>