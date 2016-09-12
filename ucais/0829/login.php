<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理登录</title>
	<style type="text/css">
		.login{
			width:auto;
			height: auto;
			border:1px solid #000;
			position: absolute;
			/*top: 50%;*/
			top: 50%;
			left: 50%;
			margin-top: -250px;
			margin-left: -201px;
			text-align: center;
			padding: 80px;
		}

	</style>
</head>
<body>
	<div class="login">
		<form action="loginAction.php" method="post">
			<p>用户名:<input type="text" name="username" value=""></p><br>
			<p>密　码:<input type="password" name="password"></p>
			<p><input type="submit" name="sub" value="登 录"></p>
		</form>
	</div>
</body>
</html>