<?php
header("Content-Type:text/html;charset=utf-8");


?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="../jquery3.1.0.js"></script>
  <title>Document</title>
</head>
<body>
<form action="">
  账号:<input type="text" name="count"><br>
  密码:<input type="password" name="pwd"><br>
  <input type="submit">
</form>
</body>
<script>
  $('form').submit(function ()
  {
    var fd = new FormData(this);
	var tt = "a=1&b=2";
//	若果传的是FormData的话 , 必须加上contentType:false , processData:false , 否则不能加	success : ajax 返回值成功是执行的操作
	$.ajax({type:'POST' , url:'./01data.php' , data:fd  , contentType:false , processData:false , success : function (redata)
	{
	  alert(redata);
	}});
	return false;
  });
//  });
</script>
</html>