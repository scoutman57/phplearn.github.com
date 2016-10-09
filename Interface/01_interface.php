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
<?php
interface ia
{
	const PI = 3.14;
	const CC1 = 1;
	//	抽象方法 , 无形参
	function show1();
	//	抽象方法 , 两个形参
	function fun2($p1 , $p2);
}
?>
</body>
</html>