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
	<title>真重载</title>
</head>
<body>
<?php
//	设计一个类 , 这个类的实例可以实现如下需求
//	调用方法 f1() :
//  传入一个参数 , 返回其本身
//	传入2个参数 , 求其平方和
//	传入3个参数 , 求其立方和
//  其他参数形式 , 报错
class a
{
//	function f1($p1)
//	{
//		return $p1;
//	}
//	function f1($p1 , $p2)
//	{
//		return pow($p1 , 2) + pow($p2 , 2);
//	}
//	function f1($p1 , $p2 , $p3)
//	{
//		return pow($p1 , 3) + pow($p2 , 3) + pow($p3 , 3);
//	}

	//	这是一个魔术方法 , 在 a 的对象调用不存在的方法的时候
	//	会被自动调用来应对这种情况
	function __call($name, $arguments)
	{
		//	就表示要处理调用时形式上使用 f1 的这个不存在的方法
		if ($name === 'f1')
		{
			$len = count($arguments);
			if ($len < 1 || $len > 3)
			{
				trigger_error("使用非法方法!" , E_USER_ERROR);
			}
			elseif ($len == 1)
			{
				return $arguments[0];
			}
			elseif ($len == 2)
			{
				return $arguments[0]*$arguments[0]+$arguments[1]*$arguments[1];
			}
			elseif ($len == 3)
			{
				$v1 = $arguments[0];
				$v2 = $arguments[1];
				$v3 = $arguments[2];
				return pow($v1 , 3) + pow($v2 , 3) + pow($v3 , 3);
			}
		}
		//	另一个不存在的方法
		elseif ($name === 'f2')
		{
			
		}
		elseif ($name === 'f3')
		{
			
		}
	}
}
$obj = new a();
$v1 = $obj->f1(1);
$v2 = $obj->f1(2,3);
$v3 = $obj->f1(4,5,6);
echo "v1 = $v1<br>";
echo "v2 = $v2<br>";
echo "v3 = $v3<br>";
?>
</body>
</html>