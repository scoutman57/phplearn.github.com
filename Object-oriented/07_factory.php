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
	<title>工厂模式</title>
</head>
<body>
<?php
class a{};
class b{};
//	设计一个工厂类: 这个工厂类有一个静态方法 ; 通过该方法可以获得指定的对象!
class factory{
	static function getObject ($className) {
		//	这是可变类
		$obj = new $className();
		return $obj;
	}
}

$obj1 = factory::getObject('a');
$obj2 = factory::getObject('b');
$obj3 = factory::getObject('a');

var_dump($obj1);
var_dump($obj2);
var_dump($obj3);
?>
</body>
</html>
