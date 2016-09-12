<?php
	header("Content-Type:text/html;charset=utf-8");


	//临时转换
	//-----------------------------------------------------------------------------------


	$str = 'hello';
	$int = 1234;
	$strnum = '12345';
	$bool = true;
	$float = 12.34;

	// 转换成整形
	$int1 = (int)$str;
	$int1 = intval($str);

	var_dump($int1);
	$int2 = (int)$strnum;
	var_dump($int2);
	$int3 = (int)$bool;
	var_dump($int3);
	$int4 = (int)$float;
	var_dump($int4);

	// 转换成浮点型
	$float1 = (float)$str;
	var_dump($float1);
	$float2 = (float)$int;
	var_dump($float2);
	$float3 = (float)$strnum;
	var_dump($float3);
	$float4 = (float)$bool;
	var_dump($float4);


	//转换成布尔类型
	$bool1 = (bool)$str;
	var_dump($bool1);
	$bool2 = (bool)$int;
	var_dump($bool2);
	$bool3 = (bool)$strnum;
	var_dump($bool3);
	$bool4 = (bool)$float;
	var_dump($bool4);

	//转换成字符串类型
	$str1 = (string)$int;
	var_dump($str1);
	$str2 = (string)$float;
	var_dump($str2);
	$str3 = (string)$bool;
	var_dump($str3);
	// $arrays = [1,2,3,4,5];
	// $str4 = (string)$arrays;
	// var_dump($arrays,$str4);

	//转换成null类型
	$null1 = (unset)$str;
	var_dump($null1);
	$null2 = (unset)$int;
	var_dump($null2);
	$null3 = (unset)$bool;
	var_dump($null3);
	$null4 = (unset)$float;
	var_dump($null4);

	//转换成array类型;
	$arr1 = (array)$int;
	var_dump($arr1);
	$arr2 = (array)$str;
	var_dump($arr2);
	$arr3 = (array)$float;
	var_dump($arr3);
	$arr4 = (array)$bool;
	var_dump($arr4);

	//转换成对象object类型
	$obj1 = (object)$int;
	var_dump($obj1);
	$obj2 = (object)$str;
	var_dump($obj2);
	$obj3 = (object)$float;
	var_dump($obj3);
	$obj4 = (object)$bool;
	var_dump($obj4);
	$obj5 = (object)$arr4;
	var_dump($obj5);



	$a = 10;
	$b = 20;
	$str1 = (string)$a * $b;
	$str2 = strval($a * $b);

	var_dump($str1,$str2,$str3); 


	$aaaa = '4.252';
	$bbbb = boolval($aaaa);
	var_dump($bbbb);

	echo "<br>";
	echo "<hr><br>";

	//-------------------------------------------------------------------------------------------------

	//永久转换

	$str = '1235';

	var_dump($str);

	echo gettype($str).'<hr>';

	settype($str, 'integer');

	var_dump($str);
	echo gettype($str).'<hr>';


	settype($str, 'float');

	var_dump($str);
	echo gettype($str).'<hr>';

	settype($str, 'bool');

	var_dump($str);
	echo gettype($str).'<hr>';

	settype($str, 'array');

	var_dump($str);
	echo gettype($str).'<hr>';

	settype($str, 'object');

	var_dump($str);//object(stdClass)[6]public 0 => boolean true
	echo gettype($str).'<hr>';

	settype($str, 'null');

	var_dump($str);
	echo gettype($str).'<hr>';


	$str2 = '1234';

	settype($str2, 'integer');
	var_dump($str2);

	$str3 = strval($str2);
	var_dump($str3);











	echo "<br><br><br><br><br><hr>";


	//is_int('原始变量');检测变量是否为整型,如果是返回true,否则返回false,可以应用于所有的检测函数

    // 	数据类型检测
	// is_int($var)、is_integer($var)、is_long($var)		#检测是否为整型
	// is_float($var)、is_double($var)、is_real($var)		#检测是否为浮点型
	// is_bool($var)		#检测是否为布尔型
	// is_string($var)		#检测是否为字符串
	// is_null($var)		#检测是否为NULL空
	// is_array($var)		#检测是否为数组
	// is_resource($var)	#检测是否为资源
	// is_object($var)		#检测是否为对象
	// is_scalar($var)		#检测是否为标量
	// is_numeric($var)	#检测是否为数值型或字符串数值型

	$int1 = 123;
	$str1 = '123';
	$bool1 = true;
	$float1 = 12.3;
	var_dump(is_int($int1));
	var_dump(is_string($str1));
	var_dump(is_bool($bool1));
	var_dump(is_float($float1));
	var_dump(is_null($float1));
	var_dump(is_array($float1));
	var_dump(is_resource($float1));
	var_dump(is_object($float1));
	var_dump(is_scalar($float1));
	var_dump(is_numeric($float1));

	echo "检测是否为数值型(整型,浮点型,字符串型)<br>";

	$age = '12.5';


	if(is_numeric($age))
	{
		$age = (int)$age;
		if($age > 0 && $age < 150)
		{
			echo '这小伙的年龄'.$age.'岁';
		}else
		{
			echo '不是人!!!';
		}
	}else
	{
		echo '输入不正确,请从新输入';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div style="width:500px;height:500px"></div>
</body>
</html>