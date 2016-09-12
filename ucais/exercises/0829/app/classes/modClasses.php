<?php
	include '../../func.php';

	if($_SESSION['user']['allow_class'] != '1')
		exit('您没有权限');

	$data = DB('SElECT * FROM classes WHERE id = '.$_GET['id']);
?>

<html>
	<head>
		<title>修改班级</title>
	</head>
	<body>
		<h2>修改班级</h2>
		<?php if(isset($_GET['mess'])): ?>
			<p><?php echo $_GET['mess'] ?></p>
		<?php endif; ?>
		<form action="../mod.php" method="post">
			<input type="hidden" name="act" value="modClasses">
			<input type="hidden" name="id" value="<?php echo $data[0]['id'] ?>">
			<p>班级名称:<input type="text" name="title" value="<?php echo $data[0]['title'] ?>"></p>
			<p>班级描述:<textarea name="description" rows="6" cols="50"><?php echo $data[0]['description'] ?></textarea></p>
			<p>排　　序:<input type="text" name="ord" value="<?php echo $data[0]['ord'] ?>"></p>
			<p><input type="submit" name="sub" value="确认修改"></p>
		</form>
	</body>
</html>