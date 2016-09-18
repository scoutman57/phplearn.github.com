<?php
header("Content-Type:text/html;charset=utf-8");

$arr = ['name' => 'maple' , 'age' => '22' , 'height' => '170'];
$json = json_encode($arr);
$arr2 = json_decode($json);
var_dump($arr2);
?>


