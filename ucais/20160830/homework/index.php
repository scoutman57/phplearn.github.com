<?php
header("Content-Type:text/html;charset=utf-8");

session_start();
//var_dump($_SESSION);

?>
<html>
	<head>
		<title>后台管理</title>
	</head>
	<frameset rows="80,*" border="1" name="index2">
		<frame src="top.php" scrolling="no" noresize="noresize">
		<frameset cols="300,*" border="1">
			<frame src="left.php" noresize="noresize">
			<frame src="right.php" name="right" noresize="noresize">	
		</frameset>
	</frameset>
</html>