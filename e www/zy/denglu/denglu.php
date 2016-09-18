<?php 
	include 'db.php';
	$user = $_POST['username'];
	$passWord = $_POST['password'];
	if (empty($passWord)) {
		echo '密码输入不能为空';
		die();
	}else{
		$sql = 'SELECT u.username,u.password FROM user as u';
		$data = DB($sql);
		foreach ($data as $key => $value) {
			if (in_array($user, $value)) {
				if ($value['password'] == $passWord) {
					echo '登陆成功';
					die();
				}else{
					echo '密码输入错误,请重新输入';
					die();
				}
			}
		}
	}



?>