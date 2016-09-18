<?php
header("Content-Type:text/html;charset=utf-8");


//制作传统分页效果，链接数据库，获得数据，分页显示
$con = mysqli_connect('localhost:3307' , 'root' , '' , 'hw20160915');
mysqli_query('set names utf8');
$sql = 'select * from goods';
$res = mysqli_query($sql);
?>

