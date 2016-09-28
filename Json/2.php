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
  <title>Document</title>
</head>
<body>
<form action="01data.php">
  账号:<input type="text" name="name">
  <input type="submit" value="触发">
</form>

</body>
<script src="../jquery3.1.0.js"></script>
<script>
  
  var fm = document.getElementsByTagName('form')[0];
  fm.onsubmit = function () {
	var xhr = new XMLHttpRequest();
	var name = $('input:eq(0)').val();
	var info = "name="+name;
	xhr.onreadystatechange = function () {
	  if (xhr.readyState == 4)
	  {
	    alert(xhr.responseText);
	  }
	};
	xhr.open('post' , './01data.php');
	xhr.setRequestHeader('content-type' , 'application/x-www-form-urlencoded');
	xhr.send(info);
//	event.preventDefault();
	return false;
  }
</script>
</html>