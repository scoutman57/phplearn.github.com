<?php include 'func.php'; ?>
<html>
	<head>
		<title>网站管理</title>
	</head>
	<body>
			<ul>
				<?php if($_SESSION['user']['allow_class'] == 1): ?>
					<li><a href="app/classes/addClasses.php" target="right">添加班级</li>
					<li><a href="app/classes/classesList.php" target="right">班级列表</li>
				<?php endif; ?>
				<?php if($_SESSION['user']['allow_user'] == 1): ?>
					<li><a href="app/user/addUser.php" target="right">添加学员</li>
					<li><a href="app/user/userList.php" target="right">学员列表</li>
				<?php endif; ?>
			</ul>
	</body>
</html>