<?php
header("Content-Type:text/html;charset=utf-8");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  <script src="../jquery3.1.0.js"></script>
  
  <style>
	
	* {
	  margin: 0;
	  padding: 0;
	}
    
    .default{
      color: grey;
    }
    
  
  </style>

</head>
<body>

<form action="">
  <input class="default" type="text" value="请输入账号！！！" id="username" onfocus="setValue()" onblur="checkValue()">
</form>

</body>

<script>
  
  var obj = $('#username');
  function setValue()
  {
    if (obj.val() == '请输入账号！！！')
	{
	  obj.val('');
	  obj.removeClass('default');
	}
  }
  
  function checkValue()
  {
	if (obj.val() == '')
	{
	  obj.val('请输入账号！！！');
	  obj.addClass('default');
	}
  }


</script>

</html>
