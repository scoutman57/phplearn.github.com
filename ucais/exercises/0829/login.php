<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理登录</title>
	<style type="text/css">
		.login{
			width:440px;
			height: 240px;
			padding:30px;
			border:1px solid #000;
			position: absolute;
			top: 50%;
			left: 50%;
			margin-top: -151px;
			margin-left: -301px;
		}

	</style>
</head>
<body>
	<div class="login">
		<form action="loginAction.php" method="post">
			<p>用户名:<input type="text" name="username"></p>
			<p>密　码:<input type="password" name="password"></p>
			<p><input type="submit" name="sub" value="登 录"></p>
		</form>
	</div>
</body>
</html>