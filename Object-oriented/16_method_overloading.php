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
	<title>方法重载</title>
</head>
<body>
<?php

//	当对一个对象的不存在的静态方法进行 "调用" 的时候 , 会自动调用类中的 __callstatic($方法名 , $形参数组) 这个静态魔术方法

class method_overloading
{
	//	当对一个对象的不存在的实例方法进行 "调用" 的时候 , 会自动调用类中的 __call() 这个魔术方法
//	__call($方法名 , $形参数组) 必须带两个形参
//	$方法名 : 表示要调用的不存在的方法名
//	$形参数组 : 表示调用该不存在的方法是 , 所使用的实参数据所组成的一个数组
	function __call($name, $arguments)
	{
		// TODO: Implement __call() method.
		echo "__call()被调用了<br>";
	}
}
$obj = new method_overloading();
//	调用不存在的方法
$obj->f1();
?>
</body>
</html>