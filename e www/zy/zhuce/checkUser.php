<?php
header("Content-Type:text/html;charset=utf-8");

		include 'db.php';
		
			$user = $_POST['username'];
			
			if (empty($user)) {
				echo '用户名不能为空';
				die();
			}

			
		// 检验是否被注册过
			$sql = 'SELECT u.username FROM user as u';
			$data = DB($sql);
			
			foreach ($data as  $value) {
				if (in_array($user, $value)) {
					echo '该用户名已被注册,请重新输入!<br>';
					die();
				}
			}
			echo '该用户名可以使用';
 ?>