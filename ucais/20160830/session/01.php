<?php
header("Content-Type:text/html;charset=utf-8");


//1.开启session
session_start();

$userInfo = array(
    'uid' => '1',
    'username' => '小明',
    'age' => '18'
);

//这里的$_SESSION操作,跟php的数组一样
$_SESSION['userinfo'] = $userInfo;

//使用值
//echo $_SESSION['userinfo']['username'];

//销毁session
//session_name() 获取 session 名称
//session_id() 获取 session id
echo session_name() . '=' . session_id();

?>
<br>
<a href="02.php">跳转</a>
