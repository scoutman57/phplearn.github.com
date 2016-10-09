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
	<title>属性重载</title>
</head>
<body>
<?php

class a
{
	public $val1 = 1;
	
	//	当对一个对象的不存在的属性进行 "取值" 的时候 , 就会自动调用 __get($属性名)
	function __get($prop_name)
	{
		echo "__get() , 你正使用的属性{$prop_name}还没有定义!<br>";
	}
	
	//	当对一个对象的不存在的属性进行 "赋值" 的时候 , 就会自动调用 __set($属性名 , $值)
	function __set($a, $b)
	{
		echo "__set()<br>";
	}
	
	//	当对一个对象的不存在的属性进行 isset()判断 的时候 , 就会自动调用 __isset($属性名)
	function __isset($prop_name)
	{
		echo "__isset()<br>";
	}
	
	//	当对一个对象的不存在的属性进行 unset()销毁 的时候 , 就会自动调用 __unset($属性名)
	function __unset($prop_name)
	{
		echo "__unset()<br>";
	}
	
	//	以上四个方法被称为魔术方法
	
}

$obj1 = new a();
echo $obj1->val1 . "<br>";  //	1
echo $obj1->p2;
//	报错 , 未定义 . 一旦该类中定义了 __get 方法
//	此时就不会报错 , 而是直接调用该方法
//	则 : php 中的重载技术就是应对上述 "报错" 的情况
//	使代码不报错, 而且还能 "优雅处理"

//	对不存在的属性进行判断结果是 false
$v1 = isset($obj1->p2);
?>
</body>
</html>