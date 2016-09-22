<?php
header("Content-Type:text/html;charset=utf-8");

session_start();
include "func.php";
if(!(isset($_SESSION['isLogined']) && $_SESSION['isLogined'] == 1)){
 	echo '尚未登录,请前去登录';
 	echo '<script>setTimeout("location=\'../admin/login.php\'" , 3000)</script>';
 }
?>


