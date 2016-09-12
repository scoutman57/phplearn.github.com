<?php
header("Content-Type:text/html;charset=utf-8");


$post = $_POST;

if (!empty($post))
{
  $con = mysqli_connect('localhost', 'root', '', 'h20160909');
  
  if (mysqli_connect_errno($con))
	die('错误信息:' . mysqli_connect_error($con));
  
  mysqli_query($con, 'set names utf8');
  
  $sql = 'update users set username ='."'$post[username]'".',password ='."'$post[password]'".',phone ='."'$post[phone]'".',email ='."'$post[email]'".',power ='."$post[power]".' where id = '."$post[id]";
  
  $res = mysqli_query($con , $sql);
  
  if ($res)
  {
	echo '修改成功!2秒后返回主页<br>';
	echo '<script>setTimeout("location=\'home.php\'" , 2000)</script>';
	exit();
  }
  else
  {
	echo '修改失败!2秒后返回主页<br>';
	echo '<script>setTimeout("location=\'home.php\'" , 2000)</script>';
	exit();
  }
  
}




$get = $_GET;
$getid = array_flip($get)[''];
//var_dump($getid);

$con = mysqli_connect('localhost', 'root', '', 'h20160909');

if (mysqli_connect_errno($con))
  die('错误信息:' . mysqli_connect_error($con));

mysqli_query($con, 'set names utf8');

$sql = "select * from users WHERE id = $getid";

$res = mysqli_query($con , $sql);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
//var_dump($row);

?>


<link rel="stylesheet" href="style/regis.css">

<div id="divmain">
  <form action="update.php" onsubmit="return finallyCheck()" method="post">
	<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
	<label>账　号:
	  <input type="text" name="username" id="username" onkeyup="checkAccount()" onblur="checkAccount()" value="<?php echo $row['username'] ?>">
	</label><br>
	<div id="div1">账号不能为空!</div><br>
	<label>密　码:
	  <input type="password" name="password" id="password" onkeyup="checkPass()" onblur="checkPass()" value="<?php echo $row['password'] ?>">
	</label><br>
	<div id="div2">密码必须在6-16之间</div><br>
	<label>手机号:
	  <input type="text" name="phone" id="phone" onkeyup="checkPhone()" onblur="checkPhone()" value="<?php echo $row['phone'] ?>">
	</label><br>
	<div id="div3">手机号非法</div><br>
	<label>邮　箱:
	  <input type="text" name="email" id="email" onkeyup="checkEmail()" onblur="checkEmail()" value="<?php echo $row['email'] ?>">
	</label>
	<div id="div4">邮箱非法</div><br>
	<label>权　限:
	  <select name="power"  id="se">
		<option id="op0" value="0">一般用户</option>
		<option id="op1" value="1">管理员</option>
	  </select>
	  
	</label><br><br>
	<input type="submit" value="修改" name="sub" id="sub" onkeyup="finallyCheck()">
  </form>
  <button onclick="tohome()">返回主页</button>
  
</div>

<?php

if ($row['power'] == 1)
{
  echo "<script>document.getElementById('se').options[1].selected = true</script>";
}
else
{
  echo "<script>document.getElementById('se').options[0].selected = true</script>";
}

?>

<script>
  
  function checkAccount()
  {
	if (document.getElementById('username').value != '')
	{
	  document.getElementById('div1').style.visibility = 'hidden';
	  document.getElementById('sub').disabled = false;
	  return true;
	}
	else
	{
	  document.getElementById('div1x').style.visibility = 'visible';
	  document.getElementById('sub').disabled = true;
	  return false;
	}
  }
  
  
  function checkPass()
  {
	var pass = document.getElementById('password').value;
	var len = pass.length;
	if (len > 16 || len < 6)
	{
	  document.getElementById('div2').style.visibility = 'visible';
	  document.getElementById('sub').disabled = true;
	  return false;
	}
	else
	{
	  document.getElementById('div2').style.visibility = 'hidden';
	  document.getElementById('sub').disabled = false;
	  return true;
	}
  }
  
  function checkPhone()
  {
	var phone = document.getElementById("phone");
	var pattern = /1[356789]\d{9}/;
	if (pattern.test(phone.value))
	{
	  document.getElementById('div3').style.visibility = 'hidden';
	  document.getElementById('sub').disabled = false;
	  return true;
	}
	else
	{
	  document.getElementById('div3').style.visibility = 'visible';
	  document.getElementById('sub').disabled = true;
	  return false;
	}
  }
  
  function checkEmail()
  {
	var email = document.getElementById("email");
	var pattern = /^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/;
	if (pattern.test(email.value))
	{
	  document.getElementById('div4').style.visibility = 'hidden';
	  document.getElementById('sub').disabled = false;
	  return true;
	}
	else
	{
	  document.getElementById('div4').style.visibility = 'visible';
	  document.getElementById('sub').disabled = true;
	  return false;
	}
  }
  
  function finallyCheck()
  {
	return (checkAccount() && checkPass() && checkPhone() && checkEmail());
  }
  
  function tohome()
  {
    location="home.php"
  }
</script>