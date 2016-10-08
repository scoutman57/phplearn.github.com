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
<input type="text">
<button id="btn">触发</button>
</body>
<script>
  $(function ()
  {
	$("#btn").click(function ()
	{
	  var tt = $("input").val();
	  //第一个参数"01data.php": ajax传的地址	第二个参数{"data" : tt , "data2" : "第二个"}:　你要传的数据	第三个参数 function (data){} : 传回后你要执行的操作 , data为ajax返回的值
	  $.post("01data.php" , {"data" : tt , "data2" : "第二个"} , function (data)
	  {
		alert(data);
	  });
	});
  });

</script>
</html>