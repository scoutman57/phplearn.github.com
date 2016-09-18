<?php
header("Content-Type:text/html;charset=utf-8");

	include 'db.php';
	if (!empty($_POST)) {
		$user = $_POST['username'];
		$phone = $_POST['phone'];
		$passWord = $_POST['password'];

		$sql = 'INSERT INTO user VALUES (null,"'.$user.'","'.$passWord.'","'.$phone.'",'.time().')';
		$data = DB($sql);
		// if ($data) {
		// 	echo '注册成功！！！';
		// }else{
		// 	echo '注册失败！！！';
		// }
		echo $data ? '注册成功！！！' : '注册失败！！！';
	}
		

?>