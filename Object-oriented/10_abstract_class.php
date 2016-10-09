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
	<title>抽象类</title>
</head>
<body>
<?php
//	怪物类 (抽象类)
//	抽象类可以没有抽象方法
abstract class monster{
	protected $blood = 100;
	//	抽象方法 (只有方法头 , 没有方法体 , 加分号) , 要求下级类必须去实现这个方法
	//	抽象方法必须在抽象类中
	abstract protected function attack();
}

//	蛇怪类
class snake extends monster {
	//	具体去实现该父类继承下来的抽象方法
	function attack()
	{
		echo "偷袭主人公!<br>";
		//	自身掉血一点
		$this -> blood;
	}
}

//	虎怪类
class tiger extends monster {
	function attack()
	{
		echo "猛咬主人公!<br>";
		//	自身掉血一点
		$this -> blood--;
	}
}

//	妖怪类 : 这个类 , 作为抽象类 , 可以不去 "实现" 父类的抽象方法
//	也可以去实现
abstract class yao extends monster {
	//	这里 , 这个抽象类任然保留父类的抽象方法的身份
}
?>
</body>
</html>