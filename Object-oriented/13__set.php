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
	<title>__set</title>
</head>
<body>
<?php
class setTest
{
	//	定义一个属性 , 这个属性意图存储 "若干个" 不存在的属性数据
	//	初始为空数组
	protected $prop_list = array();
	
	//	当对一个对象的不存在的属性进行 "赋值" 的时候 , 就会自动调用 __set($属性名 , $值)
	function __set($name, $value)
	{
		//echo "__set<br>";
		$this->prop_list[$name] = $value;
	}
	
	function __get($name)
	{
		return $this->prop_list[$name];
	}
}
$obj1 = new setTest();
$obj1->p1 = 1;
$obj1->h2 = 2;
$obj1->abc = '哈哈哈';
echo "然后可以输出这些不存在的属性的值<br>";
echo "obj1->p1 = " . $obj1->p1 . "<br>";
echo "obj1->h2 = " . $obj1->h2 . "<br>";
echo "obj1->abc = " . $obj1->abc . "<br>";
?>
</body>
</html>