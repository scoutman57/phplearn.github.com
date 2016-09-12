<?php
header("Content-Type:text/html;charset=utf-8");

$get = $_GET;
$getid = array_flip($get)[''];
$con = mysqli_connect('localhost', 'root', '', 'h20160909');

if (mysqli_connect_errno($con))
  die('错误信息:' . mysqli_connect_error($con));

mysqli_query($con, 'set names utf8');

$sql = "delete from users WHERE id = $getid";

$res = mysqli_query($con , $sql);

if ($res)
{
  echo '<script>location=\'home.php\'</script>';
}
else
{
  echo '删除失败!!2秒后返回主页<br>';
  echo '<script>setTimeout("location=\'home.php\'" , 2000)</script>';
  exit();
}

?>
