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
	<title>__isset</title>
</head>
<body>
<?php
class my_isset
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
		if (isset($this->prop_list[$name]))
		{
			return $this->prop_list[$name];
		}
		else
		{
			return "该属性不存在!<br>";
		}
//		if (!isset($this->prop_list[$name]))
//		{
//			$this->__set($name , '');
//		}
//		return $this->prop_list[$name];
	}
	
	function __isset($name)
	{
		return isset($this->prop_list[$name]);
	}
}
$obj1 = new my_isset();
$obj1->p1 = 1;
$obj1->h2 = 2;
$obj1->abc = '哈哈哈';
echo "然后可以输出这些不存在的属性的值<br>";
//	不存在的属性名 , 会传过去 p1
echo "obj1->p1 = " . $obj1->p1 . "<br>";
echo "obj1->h2 = " . $obj1->h2 . "<br>";
echo "obj1->abc = " . $obj1->abc . "<br>";
echo "obj1->asd = " . $obj1->asd . "<br>";

echo "<hr>";

//	存在
$v1 = isset($obj1->p1);
//	不存在
$v2 = isset($obj1->p2);
var_dump($v1 , $v2);
?>
</body>
</html>