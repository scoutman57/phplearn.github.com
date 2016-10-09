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
	<title>单例模式</title>
</head>
<body>
<?php
//	单例模式 :
//	就是设计这样一个类 , 这个类只能 "创造" 出它的一个对象 (实例);
class single{
	//	第一步: 私有化构造方法
	private function __construct()
	{
		
	}
	//	第二步: 定义一个静态属性 , 初始为 null
	static private $instance = null;
	//	第三步: 定义一个静态方法 , 从中判断对象是否生成并适当返回该对象
	static function getObject(){
		//	准备在这里 , 根据自己的逻辑 , 控制好对象的数量: 就一个
		//	然后 "返回给人家"
		if (!isset(self::$instance))	//	还没有生产
		{
			//	就生产一个!
			$obj = new self();
			//	并妥当的存起来
			self::$instance = $obj;
			//	然后返回
			return $obj;
		}
		else	//	表示已经生产过了
		{
			//	就直接返回已经生产的对象
			return self::$instance;
		}
	}
}
//	该类的构造方法私有化了 , 出错! 即无法 new 出对象了!
//$obj1 = new single();
$obj1 = single::getObject();
$obj2 = single::getObject();
var_dump($obj1);
var_dump($obj2);
?>
</body>
</html>