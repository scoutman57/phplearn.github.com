<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'db.php';
	$phone = $_POST['phone'];
			
	$checkPhone = '/^1[35789]\d{9}$/';
		if (!empty($phone)) {
			if (!preg_match_all($checkPhone, $phone, $arr1)) {
				
				echo '手机号码格式不正确<br>';
	
				die();
			}
		}else{
			echo '手机号码不能为空';
			
			die();
		}

		$sql = 'SELECT u.phone FROM user as u';
		$data = DB($sql);
		foreach ($data as $value) {
			if (in_array($phone, $value)) {
				echo '该手机号已被注册,请重新输入!<br>';
				die();
			}
		}
		echo '该手机号可以注册';
?>