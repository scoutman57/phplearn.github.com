<?php
header("Content-Type:text/html;charset=utf-8");

session_start();
$_SESSION = array();
session_destroy();
//$_SESSION['isLogined'] = 0;
echo '已退出,3秒后跳转到登录页';
echo '<script>setTimeout("location=\'login.php\'" , 3000)</script>';
?>

