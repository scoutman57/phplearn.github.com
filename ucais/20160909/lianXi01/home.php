<?php
header("Content-Type:text/html;charset=utf-8");

session_start();
//var_dump($_SESSION);
$id = $_SESSION['id'];

$con = mysqli_connect('localhost', 'root', '', 'h20160909');

if (mysqli_connect_errno($con))
  die('错误信息:' . mysqli_connect_error($con));

mysqli_query($con, 'set names utf8');

$sql = "select * from users WHERE id = $id";

$res = mysqli_query($con , $sql);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
if ($row['power'] == 1)
{
  $power = '管理员';
}
else
{
  $power = '一般用户';
}
echo "<br>　当前用户:".$row['username']." 权限: ".$power ." <a href='loginout.php'>退出</a></a>"."<br><br><hr><br>";
$power = $row['power'];
if ($power == 0)
{
  echo '
  	<style>
  		.a1{
  			pointer-events: none;
  			color: grey;
  		}
  		.a1:visited{
  			pointer-events: none;
  			color: grey;
  		}
	</style>
  ';
}

$sql = "select * from users";

$res = mysqli_query($con , $sql);
$rows = array();
while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
{
  $rows[] = $row;
}
//var_dump($rows);
echo '　用户列表:<br><br>　　';
echo "<table><tr><th>ID</th><th>用户名</th><th>手机号</th><th>邮箱</th><th>权限</th><th>操作</th></tr>";
foreach ($rows as $k => $v)
{
  if ($rows[$k]['power'] == 1)
  {
    $power = '管理员';
  }
  else
  {
    $power = '一般用户';
  }
  $user = $rows[$k]['username'];
  $phone = $rows[$k]['phone'];
  $email = $rows[$k]['email'];
  $postid = $rows[$k]['id'];
//  var_dump($postid);
  $id = 'a'.$rows[$k]['power'];
  echo "<tr><td>$postid</td><td>$user</td><td>$phone</td><td>$email</td><td>$power</td><td><a class='a1' href='update.php?$postid'>修改</a>　　<a id=$id class='a1' href='delete.php?$postid'>删除</a></td></tr>";
}
echo "</table>";
echo "<br>　<a class='a1' href=\"add.php\">新增用户</a>";

?>

<html>
<head>
  <link rel="stylesheet" href="style/home.css">
</head>
</html>