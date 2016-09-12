<?php
header("Content-Type:text/html;charset=utf-8");

session_start();
//var_dump($_SESSION);
$_SESSION = array();
session_destroy();
var_dump($_SESSION);
echo '已退出<br>2秒后跳转到登录页';
echo '<script>setTimeout("location=\'login.html\'" , 2000)</script>';
?>
