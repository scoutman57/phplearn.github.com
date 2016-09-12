<?php
header("Content-Type:text/html;charset=utf-8");

session_start();

$post = $_POST;
//var_dump($post);

$con = mysqli_connect('localhost', 'root', '', 'h20160909');

if (mysqli_connect_errno($con))
  die('错误信息:' . mysqli_connect_error($con));

mysqli_query($con, 'set names utf8');



$sql = 'select * from users';

$res = mysqli_query($con , $sql);

$rows = array();
while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
{
  $rows[] = $row;
}
//var_dump($rows);
$count = count($rows);
//var_dump($count);
$bool1 = false;
for ($i = 0 ; $i < $count ; $i++)
{
  $arr = $rows[$i];
  
  if (in_array($post['username'] , $arr))
  {
	$bool1 = true;
  }
  
  if ($post['username'] == $arr['username'] && $post['password'] == $arr['password'])
  {
	$_SESSION['id'] = $arr['id'];
	echo '登陆成功!<br>2秒后跳转到主页';
	echo '<script>setTimeout("location=\'home.php\'" , 2000)</script>';
	exit();
  }
}
if ($bool1)
{
  echo '密码错误!<br>2秒后跳转到主页';
  echo '<script>setTimeout("location=\'login.html\'" , 2000)</script>';
}
else
{
  echo '账号错误!<br>2秒后跳转到主页';
  echo '<script>setTimeout("location=\'login.html\'" , 2000)</script>';
}


?>
