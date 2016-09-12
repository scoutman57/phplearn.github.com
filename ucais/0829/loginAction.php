<?php
	include 'db.php';
	// if(!$_POST){
	// 	echo '尚未登录,请前去登录';
	// 	echo '<script>setTimeout("location=\'login.php\'" , 3000)</script>';
	// }
	$username =isset($_POST['username']) ? addslashes($_POST['username']) : '';
	$password =isset($_POST['password']) ? md5(addslashes($_POST['password'])) : '';


	$isset = DB('SELECT * FROM admin WHERE username = "'.$username.'" && password = "'.$password.'"');

	// echo 'SELECT * FROM admin_user WHERE username = '.$username.' && password = '.$password;
	if($isset)
	{
		DB('UPDATE admin SET last_time = '.time().' WHERE id = '.$isset[0]['id']);

		$_SESSION['user'] = $isset[0];
		$_SESSION['isLogined'] = 1;

		echo '登录成功,你可以尽情的去管理<br>3秒后跳转到首页';
		echo '<script>setTimeout("location=\'index.php\'" , 3000)</script>';
	}else{
		echo '用户名或者密码错误<br>3秒后跳转到登录页';
		echo '<script>setTimeout("location=\'login.php\'" , 3000)</script>';
	}
?>