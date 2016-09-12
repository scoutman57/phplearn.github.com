<title>销毁session</title>
<?php
header("Content-Type:text/html;charset=utf-8");

session_start();

//1.赋值为空
$_SESSION = array();

//或者
//unset($_SESSION['userinfo']);

//2.清除cookie里面存储的session_id
if (isset($_COOKIE[session_name()]))
    setcookie(session_name() , '' , time() - 3600 , '/');

//3.销毁session
session_destroy();



?>
