<?php
header("Content-Type:text/html;charset=utf-8");

//定义url链接操作
$url = "http://www.tuling123.com/openapi/api?key=65b9f623947946bebbe1148bf1cacb4c&info=你漂亮吗";

//模拟发送http中的发送get请求
$str = file_get_contents($url);

//格式化json字符串为对象或者数组
$json = json_decode($str);
var_dump($json);
?>
