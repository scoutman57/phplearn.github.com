<?php include 'func.php'; ?>
<html>
	<head>
		<title>网站管理</title>
	</head>
	<body>
			<h3>网站后台管理</h3>
			<p style="text-align:right"><?php if(isset($_SESSION['user'])) echo '你好,'.$_SESSION['user']['username'].'　<a href="/0829/logout.php" target="_top">退出</a>'; ?></p>
	</body>
</html>