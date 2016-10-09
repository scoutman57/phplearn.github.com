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
	<title>__get</title>
</head>
<body>
<?php
class a
{
	public $val1 = 1;

//	当对一个对象的不存在的属性进行 "取值" 的时候 , 就会自动调用 __get($属性名)
	function __get($prop_name)
	{
		//	方法一
		echo "__get() , 你正使用的属性{$prop_name}还没有定义!<br>";
		//	方法二
		echo "属性{$prop_name}不存在<br>";
		//	方法三
		//	也可以返回 0 , 或 false , 或任何其他 "被看做没有" 的数据
		return 0;
		//	方法四
		//	也可以这样处理
		trigger_error("发生错误: 属性不存在." , E_USER_ERROR);
		die;
	}
}
$obj1 = new a();
echo $obj1->val1 . "<br>";	//	1
echo $obj1->p2;
?>
</body>
</html>