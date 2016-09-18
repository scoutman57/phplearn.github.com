<?php
header("Content-Type:text/html;charset=utf-8");
			include 'db.php';
	
			$passWord = $_POST['password'];
			$checkPaw = '/^\w{6,16}$/';
			if (!empty($passWord)) {
				if (!preg_match_all($checkPaw, $passWord, $arr)) {	
					echo '密码格式不正确<br>';	
					die();
				}
			}else{
				echo '密码不能为空';
				die();
			}
			echo '该密码可以使用';
 ?>