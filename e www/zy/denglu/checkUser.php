<?php 

	include 'db.php';
	$user = $_POST['username'];
	if (empty($user)) {
		echo '用户名不能输入为空';
		die();
	}
	$sql = 'SELECT u.username FROM user as u';
	$data = DB($sql);

	foreach ($data as $value) {
		if (in_array($user, $value)) {
			echo '该用户已注册,请输入密码登录';
			die();
		}
	}

	echo '该用户名未注册,请先前往注册';
		
		
?>