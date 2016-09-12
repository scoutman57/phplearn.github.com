<?php
header("Content-Type:text/html;charset=utf-8");
$post = $_POST;
if (!empty($post))
{
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
  $count = count($rows);
  
  for ($i = 0 ; $i < $count ; $i++) {
	if ($rows[$i]['username'] == $post['username']) {
	  echo '您添加的账号已存在,请更换账号!<br>';
	  echo '<script>setTimeout("location=\'add.php\'" , 2000)</script>';
	  exit();
	} elseif ($rows[$i]['phone'] == $post['phone']) {
	  echo '您添加的手机号已存在,请更换手机号!<br>';
	  echo '<script>setTimeout("location=\'add.php\'" , 2000)</script>';
	  exit();
	} elseif ($rows[$i]['email'] == $post['email']) {
	  echo '您添加的邮箱已存在,请更换邮箱!<br>';
	  echo '<script>setTimeout("location=\'add.php\'" , 2000)</script>';
	  exit();
	}
  }
  
  $sql = 'insert into users values(null , "'.$post['username'].'" , "'.$post['password'].'" , "'.$post['phone'].'" , "'.$post['email'].'" , "'.$post['power'].'")';
  mysqli_query($con , $sql);
  echo '添加成功!您可以继续添加<br>';
  echo '<a href="home.php">返回主页</a>';
  
//  echo '<script>setTimeout("location=\'home.php\'" , 2000)</script>';
	
  
  

}

?>
<link rel="stylesheet" href="style/regis.css">

<div id="divmain">
  <form action="add.php" onsubmit="return finallyCheck()" method="post">
	<label>账　号:
	  <input type="text" name="username" id="username" onkeyup="checkAccount()" onblur="checkAccount()">
	</label><br>
	<div id="div1">账号不能为空!</div><br>
	<label>密　码:
	  <input type="password" name="password" id="password" onkeyup="checkPass()" onblur="checkPass()">
	</label><br>
	<div id="div2">密码必须在6-16之间</div><br>
	<label>手机号:
	  <input type="text" name="phone" id="phone" onkeyup="checkPhone()" onblur="checkPhone()">
	</label><br>
	<div id="div3">手机号非法</div><br>
	<label>邮　箱:
	  <input type="text" name="email" id="email" onkeyup="checkEmail()" onblur="checkEmail()">
	</label>
	<div id="div4">邮箱非法</div><br>
	<label>权　限:
	  <select name="power"  id="">
		<option value="0">一般用户</option>
		<option value="1">管理员</option>
	  </select>
	</label><br><br>
	<input type="submit" value="注册" name="sub" id="sub" onkeyup="finallyCheck()">
  </form>
</div>

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
	  document.getElementById('div1').style.visibility = 'visible';
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
  
</script>