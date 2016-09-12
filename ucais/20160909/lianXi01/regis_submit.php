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

for ($i = 0 ; $i < $count ; $i++)
{
  if ($rows[$i]['username'] == $post['username'])
  {
    echo '您的账号已被注册,请更换注册账号!<br>2秒后跳转到注册页面';
	echo '<script>setTimeout("location=\'regis.html\'" , 2000)</script>';
	exit();
  }
  elseif ($rows[$i]['phone'] == $post['phone'])
  {
	echo '您的手机号已被注册,请更换注册手机号!<br>2秒后跳转到注册页面';
	echo '<script>setTimeout("location=\'regis.html\'" , 2000)</script>';
	exit();
  }
  elseif ($rows[$i]['email'] == $post['email'])
  {
	echo '您的邮箱已被注册,请更换注册邮箱!<br>2秒后跳转到注册页面';
	echo '<script>setTimeout("location=\'regis.html\'" , 2000)</script>';
	exit();
  }
}

$sql = 'insert into users values(null , "'.$post['username'].'" , "'.$post['password'].'" , "'.$post['phone'].'" , "'.$post['email'].'" , 0)';
mysqli_query($con , $sql);
echo '注册成功!<br>2秒后跳转到主页';
$sql = 'select max(id) from users';
$res = mysqli_query($con , $sql);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
$maxid = $row['max(id)'];
$_SESSION['id'] = $maxid;

echo '<script>setTimeout("location=\'home.php\'" , 2000)</script>';
?>
