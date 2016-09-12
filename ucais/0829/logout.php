<?php
	include 'func.php';

	$_SESSION = array();

	if(isset($_COOKIE[session_name()]))
		setCookie(session_name() , '' , time() - 3600 , '/');

	session_destroy();

	echo '已退出<br>3秒后跳转到登录页';
	echo '<script>setTimeout("location=\'login.php\'" , 3000)</script>';	

?>