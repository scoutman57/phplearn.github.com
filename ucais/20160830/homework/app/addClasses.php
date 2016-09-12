<html>
	<head>
		<title>添加班级</title>
	</head>
	<body>
		<h2>添加班级</h2>
		<?php if(isset($_GET['mess'])): ?>
			<p><?php echo $_GET['mess'] ?></p>
		<?php endif; ?>
		<form action="add.php" method="post">
			<input type="hidden" name="act" value="addClasses">
			<p>班级名称:<input type="text" name="title"></p>
			<p>班级描述:<textarea name="description" rows="6" cols="50"></textarea></p>
			<p>排　　序:<input type="text" name="ord" value="0"></p>
			<p><input type="submit" name="sub" value="提交"></p>
		</form>
	</body>
</html>