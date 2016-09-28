<?php
header("Content-Type:text/html;charset=utf-8");

//
//$array = array('city' => 'cc' , 'tm' => '20');
//var_dump($array);
//$json = json_encode($array);
//var_dump($json);
//
//
//$obj = json_decode($json , true);
//var_dump($obj);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
</head>
<body>
<form action="01data.php">
  <input type="submit" value="触发">
</form>
</body>
<script>
  var fm = document.getElementsByTagName('form')[0];
  fm.onsubmit = function (event) {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function () {
	  if (xhr.readyState == 4)
	  {
	    eval("var obj_1="+xhr.responseText);
//	    alert(obj_1);
		console.log(obj_1);
	  }
	};
	xhr.open('get' , './01data.php');
	xhr.send(null);
//	event.preventDefault();
	return false;
  }
</script>
</html>
