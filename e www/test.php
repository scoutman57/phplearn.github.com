<?php
header("Content-Type:text/html;charset=utf-8");

$con=mysqli_connect('localhost:3306','root','','test');
//判断是查询语句
if(mysqli_connect_errno($con))
{
  die('错误信息'.mysqli_connect_error($con));
}

$sql = 'select * from table1';
$res=mysqli_query($con,$sql);
//如果是查询语句

  $row=array();
  $rows=array();
  while($row=mysqli_fetch_array($res,1))
  {
    $rows[]=$row;
  }
  
  var_dump($rows);

?>

