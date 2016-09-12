<?php
	include 'func.php';

	$_SESSION = array();

	if(isset($_COOKIE[session_name()]))
		setCookie(session_name() , '' , time() - 3600 , '/');

	session_destroy();

	echo '尚未登录,请前去登录';
	echo '<script>setTimeout("location=\'login.php\'" , 3000)</script>';	

?>