<?php
header("Content-Type:text/html;charset=utf-8");

session_start();
if (!isset($_SESSION['admin']))
{
	echo '没有登录';
	echo '
    <a href="login.php" target="_top">登录</a>
    ';
	echo '<style>
		.forbidden{
		pointer-events: none;
		color: gray;
		}	
		.ulclass{
		visibility: hidden;
		}
		.forbidden:visited{
		color: gray;
		}
	</style>';
}
if (isset($_SESSION['admin']['allow_class']) && $_SESSION['admin']['allow_class'] == 0)
{
	echo '<style>
		.insertclasses{
		pointer-events: none;
		color: gray;
		}	
		.insertclasses:visited{
		color: gray;
		}
	</style>';
}
if (isset($_SESSION['admin']['allow_user']) && $_SESSION['admin']['allow_user'] == 0)
{
	echo '<style>
		.insertusers{
		pointer-events: none;
		color: gray;
		}	
		.insertusers:visited{
		color: gray;
		}
	</style>';
}
if (isset($_SESSION['admin']))
	echo '欢迎:'.$_SESSION['admin']['username'];
?>
<html>
	<head>
		<title>网站管理</title>
	</head>
	<body>
			<ul class="ulclass">
				<li><a class="insertclasses forbidden" href="app/addClasses.php" target="right">添加班级</li><br>
				<li><a class="forbidden" href="app/classesList.php" target="right">班级列表</li><br>
				<li><a class="insertusers forbidden" href="app/addUser.php" target="right">添加学员</li><br>
				<li><a class="forbidden" href="app/userList.php" target="right">学员列表</li><br>
				<li><a class="forbidden" href="logout.php" target="_top">退出登录</li><br>
			</ul>
	</body>
</html>