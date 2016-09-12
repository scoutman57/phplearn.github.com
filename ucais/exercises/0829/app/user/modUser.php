<?php
	include '../../func.php';

	if($_SESSION['user']['allow_user'] != '1')
			exit('您没有权限');

	$sql = 'SELECT u.id,u.cid,u.username,u.phone,u.gender,u.pass_time,s.chinese,s.math,s.english FROM users u,score s WHERE u.id = s.uid && u.id = '.$_GET['id'];
	$data = DB($sql);


?>

<html>
	<head>
		<title>修改用户</title>
	</head>
	<body>
		<h2>修改用户</h2>
		<?php if(isset($_GET['mess'])): ?>
			<p><?php echo $_GET['mess'] ?></p>
		<?php endif; ?>
		<form action="../mod.php" method="post">
			<input type="hidden" name="act" value="modUser">
			<input type="hidden" name="id" value="<?php echo $data[0]['id'] ?>">
			<p>选择班级:<?php echo getClassList($data[0]['cid']) ?></p>
			<p>用户名称:<input type="text" name="username" value="<?php echo $data[0]['username'] ?>"></p>
			<p>手机号码:<input type="text" name="phone" value="<?php echo $data[0]['phone'] ?>"></p>
			<p>性　　别:<input type="radio" name="gender" value="1" <?php if($data[0]['gender'] == '1'): ?> checked="checked" <?php endif; ?>> 男 <input type="radio" name="gender" value="0" <?php if($data[0]['gender'] == '0'): ?> checked="checked" <?php endif; ?>> 女 </p>

			<p>语文成绩:<input type="text" name="chinese" value="<?php echo $data[0]['chinese'] ?>"></p>
			<p>数学成绩:<input type="text" name="math"  value="<?php echo $data[0]['math'] ?>"></p>
			<p>英语成绩:<input type="text" name="english"  value="<?php echo $data[0]['english'] ?>"></p>
			<p><input type="submit" name="sub" value="确认修改"></p>
		</form>
	</body>
</html>