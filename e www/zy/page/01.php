<?php
header("Content-Type:text/html;charset=utf-8");



include 'db.php';

$sql = 'select * from goods';
 $result=DB($sql);
var_dump($result);
?>
