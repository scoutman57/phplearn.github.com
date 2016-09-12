<?php
header("Content-Type:text/html;charset=utf-8");

//链接数据库-----------------------------------------------
$con = mysqli_connect('localhost' , 'root' , '') or die('数据库连接失败!');

//设置字符集 非必须-----------------------------------------
mysqli_query($con , 'set names utf8');

//选择数据库
mysqli_select_db($con , 'db_php');

//写入数据---------------------------------------------------
//$res = mysqli_query($con , 'INSERT INTO classes VALUES(null , "三年三班", "描述描述描述描述描述描述描述描述描述描述")');
//for ($i = 0 ; $i < 3 ; $i++)
//{
//    $res = mysqli_query($con , 'INSERT INTO classes VALUES(null , "三年三班", "描述"),(null , "三年二班", "描述")');
//}

//修改数据-----------------------------------------------------------
//$res = mysqli_query($con , 'update classes set title = "九年九班" where id = 12');

$res = mysqli_query($con, 'select * from classes');
$arr = mysqli_fetch_array($res , MYSQLI_ASSOC);
var_dump($arr);

//删除数据---------------------------------------------------------
//$res = mysqli_query($con , 'delete from classes where id = 2');
//var_dump($res);


?>








<title>链接数据库</title>