<?php
header("Content-Type:text/html;charset=utf-8");

//print_r($_GET);
//
include '../../public/func.php';
$sql = "select * from tags where tagname = '{$_GET['value']}'";
$res = DB($sql);
print_r($res);
?>

