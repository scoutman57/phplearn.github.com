<?php
header("Content-Type:text/html;charset=utf-8");

include '../../public/func.php';
$sql = "select * from cate where cate_name = '{$_GET['value']}'";
$res = DB($sql);
print_r($res);
//if (empty($res))
//  return 1;
//else
//  return false;
?>

