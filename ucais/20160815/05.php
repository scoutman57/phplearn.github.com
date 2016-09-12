<?php
header("Content-Type:text/html;charset=utf-8");

$username = $_POST['username'];
$password = $_POST['password'];

file_put_contents('./1.txt', $username.'|'.md5($password));

// $date = file();//读取文件内容,按照行划分元素;
 
// $userinfo = explode('|', $date['0']);
// // var_dump($date);
// $password = md5($password);
// if (in_array($password, $userinfo) && in_array($username, $userinfo))
// {
// 	echo '登陆成功';
// }
// else
// {
// 	echo '登陆失败';
// }
?>