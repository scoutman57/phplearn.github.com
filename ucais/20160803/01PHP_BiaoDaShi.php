<?php
	header("Content-Type:text/html;charset=utf-8");
	echo "php代码<br>";
	printf("php代码<br>");

	// phpinfo();  //打印PHP信息
	// phpinfo();

	// 单行注释
	// #
	#这里请帮我注释掉

	// 多行注释
	
	/*   
		第一行
		第二行
	*/


	$a = 'Hello word';
	$a = 'Hello two';
	echo "$a<br>";

	$_var = '这是以下划线开头的变量';
	$_VAR = '区分大小写';
	echo "$_var<br>";
	echo "$_VAR<br>";



	$中文 = '111';
	echo "$中文<br>";
	$中文 = '111';


	//可变变量,拿原始变量的值作为可变变量的变量名
	$c = 'chrome';
	$$c = 'google';

	echo $chrome .' '.$c;
	echo "<br>";
	$c = 'chrome';
	$$c = 'google';


	//引用赋值,当改变其中一个变量的时候,另一个也会改变
	$a = 'apple';
	$b = &$a;
	$b = 'banana';
	$a = 'aaaaaaa';
	echo $a . $b;


	$test = 1;
	echo "<br>";
	echo $test++;
	echo "<br>";
	echo $test;
	$test += 3;
	echo "<br>";
	echo $test;
	$test *= 3;
	echo "<br>";
	echo $test;
	$a = 'apple';
	$b = &$a;
	$b = 'banana';
	$a = 'aaaaaaa';
	echo $a . $b;




	$test = 1;
	echo "<br>";
	echo $test++;
	echo "<br>";
	echo $test;
	$test += 3;
	echo "<br>";
	echo $test;
	$test *= 3;
	echo "<br>";
	echo $test;

	$first = 1;
	$second = 2;
	$third = 3;
	// $first ? $second : $third
	echo "<br>";
	//如果第一个子表达式的值是 TRUE(非零)，那么第二个子表达式被求值，其值即为整个条件表达式的值。否则，第三个子表达式将被求值并且其值成为整个表达式的值。
	echo $first ? ++$second : $third;
	echo "<br>";

	//定义常量只能用define,php5.3后可以用const
	define('num', 'http://www.baidu.com');
	const num2 = 'http://www.baidu.com';
	echo num;
	echo "<br>";
	echo num2;

	
	//布尔型
	echo "<br>";
	$bool = true;
	$bool1 = false;
	var_dump($bool , $bool1);
	var_dump($a);


	//整形
	$num3 = 100;
	$num4 = -100;
	$num5 = 0123;

	var_dump($num3);
	var_dump($num4);
	var_dump($num5);
	//整形溢出
	$large_num = 2147483647;
	$large_num2 = 2147483648;
	$large_num3 = 214748364111;
	$large_num4 = 2147483647111;
	var_dump($large_num);






	//浮点型 float
	$float1 = 12.34;

	$large_num = 2147483648;
	var_dump($float1);


	//字符串型
	$abc = 'hello';
	var_dump($abc);
	$long1 = <<<EOT

	<div style="background:green;width:100px;height:100px"></div>

EOT;

	echo $long1;


	echo "<br>";
	$ax = 10;
	$bx = '190long';
	$cx = $ax + $bx;
	echo "$cx";
	echo "<br>";
	echo $long1;




	



	//数组
	//下标强制转换
	$arr = array(
			'1' => '1',
			1.1 => '2',
			1 => '3',
			true => '4',
		);
	var_dump($arr);
	



	//对象
	class obj
	{

		function objdemo()
		{
			echo "这是一个类";
		}

	}

	$pbj = new obj;
	$pbj -> objdemo();

	var_dump($pbj);

	class name
	{

		function objdemo()
		{
			echo "zzf";
		}

	}

	$pbj = new name;
	$pbj -> objdemo();

	var_dump($pbj);

	class age
	{

		function objdemo()
		{
			echo "22";
		}

	}

	$pbj = new age;
	$pbj -> objdemo();
	var_dump($pbj);


	//资源
	$res = opendir('D:/www/ucais/20160803');
	var_dump($res);

	$res2 = opendir('c:/');
	$res2 = opendir('f:/');


	//空类型
	$var = 'apple';
	unset($var);
	var_dump($var);
	echo "<hr>";

	//以下为false
	var_dump(false == '');
	var_dump(false == 0);
	var_dump(false == null);
	var_dump(false == '0');
	//以下为true
	var_dump(false == 1);
	var_dump(false == -1);
	var_dump(false == 'none');
	var_dump(false == '0.5');



	

	echo "<hr>";

	//临时转换
	#转换成整形
	$a1 = '1234';
	$int1 = (int)$a1;
	var_dump($int1);
	$a1 = 'abc';
	$int1 = (int)$a1;
	var_dump($int1);
	#转换成浮点型	
	$a1 = '1234';
	$float1 = (float)$a1;
	var_dump($float1);
	$a1 = 1234;
	$float1 = (double)$a1;
	var_dump($float1);
	$a1 = 'abc';
	$float1 = (real)$a1;
	var_dump($float1);
	#转换成bool型
	$a1 = '1234';
	$bool1 = (bool)$a1;
	var_dump($bool1);
	$a1 = '1';
	$bool1 = (bool)$a1;
	var_dump($bool1);
	$a1 = 1;
	$bool1 = (bool)$a1;
	var_dump($bool1);
	$a1 = 'true';
	$bool1 = (bool)$a1;
	var_dump($bool1);
	$a1 = '0';
	$bool1 = (bool)$a1;
	var_dump($bool1);
	$a1 = '';
	$bool1 = (bool)$a1;
	var_dump($bool1);
	$a1 = 'null';
	$bool1 = (bool)$a1;
	var_dump($bool1);
	#转换为字符串类型	
	$a1 = 123;
	$str1 = (string)$a1;
	var_dump($str1);
	$a1 = 12.3;
	$str1 = (string)$a1;
	var_dump($str1);
	$a1 = true;
	$str1 = (string)$a1;
	var_dump($str1);
	$a1 = 'null';
	$str1 = (string)$a1;
	var_dump($str1);
	#转换为null
	$a1 = 123;
	$un1 = (unset)$a1;
	var_dump($un1);
	$a1 = '123';
	$un1 = (unset)$a1;
	var_dump($un1);
	$a1 = 123.45;
	$un1 = (unset)$a1;
	var_dump($un1);
	$a1 = true;
	$un1 = (unset)$a1;
	var_dump($un1);
	#转换为数组类型
	$a1 = 123;
	$arr1 = (array)$a1;
	var_dump($arr1);
	$a1 = '123';
	$arr1 = (array)$a1;
	var_dump($arr1);
	$a1 = 123.45;
	$arr1 = (array)$a1;
	var_dump($arr1);
	$a1 = true;
	$arr1 = (array)$a1;
	var_dump($arr1);
	#转换为object
	$a1 = 123;
	$ob1 = (array)$a1;
	var_dump($ob1);
	$a1 = '123';
	$ob1 = (array)$a1;
	var_dump($ob1);
	$a1 = 123.12;
	$ob1 = (array)$a1;
	var_dump($ob1);
	$a1 = true;
	$ob1 = (array)$a1;
	var_dump($ob1);
	$a1 = ['1','2'];
	$ob1 = (array)$a1;
	var_dump($ob1);


 ?>




 <hr>
 <div style="background:green;width:100px;height:100px"></div>
 <div style="background:green;width:100px;height:100px"></div>
 <div style="background:green;width:100px;height:100px"></div>
 <a href="<?php echo num; ?>">连接到百度</a>
 <a href="<?php echo num2; ?>">连接到百度</a>
 <a href="<?php echo num2; ?>">连接到百度</a>