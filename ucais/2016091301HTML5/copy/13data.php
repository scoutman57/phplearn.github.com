<?php
header("Content-Type:text/html;charset=utf-8");

$user = [
  'username' => 'maxwell',
  'age' => 25
];
//将PHP的数组转换成JSON格式字符串
echo json_encode($user);

// $str = '{"username":"max","age":25}';
// //将JSON格式的字符串转换成对象，或者数组
// $obj = json_decode($str);
// echo $obj->username;
// echo $obj->age;
?>


