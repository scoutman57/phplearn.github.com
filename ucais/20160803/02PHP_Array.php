<?php
	header("Content-Type:text/html;charset=utf-8");
	//数组的基本操作php定义数组:
	$array = array();
	$array["key"] = "values";


	// 1.用array()函数声明数组，

	// 2.直接为数组元素赋值。
	//array数组
	$users = array('phone','computer','dos','linux');
	//只会打印出数据类型array
	// echo $users;
	echo "<br>";
	//Array ( [0] => phone [1] => computer [2] => dos [3] => linux )
	print_r($users);
	echo "<br>";



	//创建一个包含指定范围的数组
	$numbers = range(1, 5);
	//Array ( [0] => phone [1] => computer [2] => dos [3] => linux )
	print_r($numbers);
	echo "<br>";


	//1
	print_r(true);
	//bool(false)
	var_dump(false);
	//print_r可以把字符串和数字简单地打印出来，数组会以Array开头并已键值形式表示，print_r输出布尔值和null的结果没有意义，因此用var_dump更合适


	//通过循环来显示数组里所有的值
	for($i = 0;$i < 4;$i++)
	{
		echo $users[$i];
		echo " ";
	}
	echo "<br>";



	//通过count/sizeof统计数组中单元数目或对象中的属性个数
	for($i = 0;$i < count($users);$i++)
	{
		echo $users[$i];
		echo " ";
	}

	echo "<br>";
	//还可以通过foreach循环来遍历数组，这种好处在于不需要考虑key
	foreach($users as $value){
	echo $value.' ';//点号为字符串连接符号
	}

	echo "<br>";

	//foreach循环遍历 $key => $value;$key和$value是变量名，可以自行设置
	foreach($users as $key => $value)
	{
	echo $key.' ';//输出键
	}
	echo "<br>";


	echo "<hr>";//---------------------------------------------------------------------------------------------

	//创建自定义键的数组
	$ceo = array('apple'=>'jobs','microsoft'=>'Nadella','LarryPage','Eric');
	//如果不去声明元素的key,
	//Array ( [apple] => jobs [microsoft] => Nadella [0] => Larry Page [1] => Eric )
	print_r($ceo);
	echo "<br>";
	//jobs
	echo $ceo['apple'];
	echo "<br>";

	//php5.4起的用法
	$array =
	[
		"foo" => "bar",
		"bar" => "foo",
	];
	//Array ( [foo] => bar [bar] => foo )
	print_r($array);

	//从php5.4 起可以使用短数组定义语法，用 [] 替代 array()。有点类似于javascript中数组的定义。

	//each()的使用
	//通过为数组元素赋值来创建数组
	$ages['trigkit4'] = 22;
	// echo $ages.' ';
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";

	//因为相关数组的索引不是数字，所以无法通过for循环来进行遍历操作，只能通过foreach循环或list()和each()结构
	//each的使用
	//each返回数组中当前的键/值对并将数组指针向前移动一步
	$users = array('trigkit4' => 22,'mike' => 20,'john' => 30);
	print_r($users);
	echo "<br>";
	//Array ( [1] => 22 [value] => 22 [0] =>trigkit4 [key] => trigkit4 )
	print_r(each($users));
	//相当于：$a = array([0]=>trigkit4,[1]=>22,[value]=>22,[key]=>trigkit4);
	$a = each($users);
	echo "<br>";
	//each把原来的数组的第一个元素拿出来包装成新数组后赋值给$a
	echo "<br>";
	echo $a[0];//trigkit4
	var_dump($a);
	//!!表示将真实存在的数据转换成布尔值
	echo "<br>";
	echo !!each($users);//1
	//each的指针指向第一个键值对，并返回第一个数组元素，获取其键值对，并包装成新数组
	echo "<br>";
	//list()的使用
	echo "list()的使用";
	echo "<br>";
	$arr = ['2','abc','def'];
	list($var1,$var2) = $arr;
	echo $var1.' ';//2
	echo $var2;//abc
	$arr = ['name'=>'zzf','age'=>'22','0'=>'boy'];
	echo "<br>";
	echo "list()只认识key位数字的索引";
	echo "<br>";
	list($var1) = $arr;
	echo $var1;//boy



	echo "<br>";
	echo "<hr>";//------------------------------------------------------------------------
	echo "<br>";



	echo "数组元素的排序<br>";

	echo "排序:sort()、asort()和 ksort()都是正向排序,当然也有相对应的反向排序.<br>";
	echo "实现反向:rsort()、arsort()和 krsort()。<br>";
	echo "array_unshift()函数将新元素添加到数组头,array_push()函数将每个新元素添加到数组 的末尾。<br>";
	echo "array_shift()删除数组头第一个元素,与其相反的函数是 array_pop(),删除并返回数组末 尾的一个元素。<br>";
	echo "array_rand()返回数组中的一个或多个键。<br>";
	echo "函数shuffle()将数组个元素进 行随机排序<br>";
	echo "函数 array_reverse()给出一个原来数组的反向排序<br>";
	echo "<br>";
	echo "数组的各类API的使用<br>";
	echo "count()和sizeof()统计数组下标的个数<br>";
	$numbers = array('300','2');
	//按字符串排序,字符串只比较第一位的大小
	sort($numbers,SORT_STRING);
	//Array ( [0] => 2 [1] => 300 )
	print_r($numbers);
	echo "<br>";

	$arr = array('name','two','10');
	sort($arr,SORT_STRING);
	//Array ( [0] => 10 [1] => name [2] => two )
	print_r($arr);
	echo "<br>";

	echo "随机排序<br>";
	shuffle($arr);
	print_r($arr);

	echo "<br>";
	echo "原数组反向排序<br>";
	$array = array('a','b','c','d','0','1');
	$var = array_reverse($array);
	//Array ( [0] => 1 [1] => 0 [2] => d [3] => c [4] => b [5] => a )
	print_r($var);
	echo "<br>";

	echo "数组的拷贝<br>";
	$arr1 = array('10',2);
	$arr2 = &$arr1;
	$arr2 [] = 4;
	//Array ( [0] => 10 [1] => 2 [2] => 4 );
	print_r($arr2);
	print_r($arr1);
	echo "<br>";

	echo "asort的使用<br>";
	$arr3 = &$arr1;
	$arr3 [] = '3';
	echo "对数组进行排序并保留原始关系";
	asort($arr3);
	//Array ( [1] => 2 [3] => 3 [2] => 4 [0] => 10 )
	print_r($arr3);
	print_r($arr2);
	print_r($arr1);


	echo "<br>";
	echo "ksort的使用,按键名排序<br>";
	$fruits = array('c'=>'banana','a'=>'apple','d'=>'orange');
	print_r($fruits);
	echo "<br>";
	ksort($fruits);
	print_r($fruits);

	echo "<br>";

	echo "unshift的使用<br>";
	echo "在开头添加一元素";
	//Array ( [0] => a [1] => b [2] => c [3] => d [4] => 0 [5] => 1 ) 
	print_r($array);
	echo "<br>";
	array_unshift($array, 'z');
	//Array ( [0] => z [1] => a [2] => b [3] => c [4] => d [5] => 0 [6] => 1 )
	print_r($array);

	echo "<br>";
	echo "current(pos)的使用<br>";
	//z  获取当前数组中的当前单元
	echo current($array);

	echo "<br>";
	echo "next的使用<br>";
	//a;将数组中的内部指针向前移动一位
	echo next($array);

	echo "<br>";
	echo "reset的使用<br>";
	//z;将数组内部指针指向第一个单元
	echo reset($array);

	echo "<br>";
	echo "prev的使用<br>";
	//a;
	echo next($array);
	echo "<br>";
	//z;倒回一位
	echo prev($array);

	echo "<br>";
	echo "sizeof的使用<br>";
	//7;统计数组元素的个数
	echo sizeof($array);

	echo "<br>";
	echo "array_count_values的使用";
	echo "统计数组元素出现的次数";
	$Num = array(10,20,30,10,20,1,0,10);
	//Array ( [10] => 3 [20] => 2 [30] => 1 [1] => 1 [0] => 1 )
	print_r(array_count_values($Num));

	echo "current()：每个数组都有一个内部指针指向他的当前单元，初始指向插入到数组中的第一个元素<br>";

	echo "for循环遍历<br>";

	$value = range(0, 120, 10);
	//Array ( [0] => 0 [1] => 10 [2] => 20 [3] => 30 [4] => 40 [5] => 50 [6] => 60 [7] => 70 [8] => 80 [9] => 90 [10] => 100 [11] => 110 [12] => 120 )
	print_r($value);
	echo "<br>";
	print_r(sizeof($value));
	echo "<br>";
	for ($i=0; $i<sizeof($value); $i++) { 
		print_r($value[$i].' ');
	}
	echo "<br>";
	//--------------------------------------------------------------------------------------------
	echo "<hr>";
	echo "<br>";

	echo "数组的实例array_pad函数的使用<br>";
	echo "array_pad函数,数组收尾选择性追加<br>";
	$num = array(1 => 10,2 => 20,3=>30);
	$num = array_pad($num, 4, 40);
	// Array ( [0] => 10 [1] => 20 [2] => 30 [3] => 40 ) 
	print_r($num);
	echo "<br>";
	$num = array_pad($num, -5, 50);
	// Array ( [0] => 50 [1] => 10 [2] => 20 [3] => 30 [4] => 40 )
	print_r($num);

	// ---------------------------------------------------------------------------------------
	echo "<hr>";
	echo "<br>";

	echo "size:指定的长度。整数则填补到右侧，负数则填补到左侧。<br>";
	echo "unset的使用<br>";
	//rand(min,max)随机;
	$num = array_fill(0,5,rand(1,10));
	// Array ( [0] => 1 [1] => 1 [2] => 1 [3] => 1 [4] => 1 ) 
	print_r($num);
	echo "<br>";
	unset($num[3]);
	// Array ( [0] => 1 [1] => 1 [2] => 1 [4] => 1 )
	print_r($num);

	echo "<br>";
	echo "array_fill的使用";
	$num = range('a','e');
	//array_fill(start,number,value)
	$arrayFilled = array_fill(1,2,$num);
	print_r($arrayFilled);


	echo "<br>";
	echo "array_combine的使用<br>";
	$number = array(1,2,3,4,5);
	$array = array("I","Am","A","PHP","er");
	$newarray = array_combine($number, $array);
	// Array ( [1] => I [2] => Am [3] => A [4] => PHP [5] => er )
	print_r($newarray);

	echo "<br>";
	echo "array_splice删除数组成员<br>";
	$color = array("red","blue","yellow","green","pink");
	print_r($color);
	echo "<br>";
	$qq = count($color);
	echo $qq.'<br>' ;
	//第三个元素开始,一个删除三个
	array_splice($color, 3, 4);
	print_r($color);

	echo "<br>";
	echo "array_unique删除数组中的重复值<br>";
	$color = array("red","blue","yellow","green","pink","blue");
	$result = array_unique($color);
	//Array ( [0] => red [1] => blue [2] => yellow [3] => green [4] => pink )
	print_r($result);



	echo "<br>";
	echo "array_flip()交换数组的键值和值<br>";
	$array = array("red","blue","red","Black");
	print_r($array);
	echo "<br>";
	$array = array_flip($array);//
	print_r($array);//Array ( [red] => 2 [blue] => 1 [Black] => 3 )
	

	echo "<br>";
	echo "aarray_search()搜索数值<br>";
	$array = array("red","blue","red","Black");
	print_r($array);
	echo "<br>";
	$result=array_search("red",$array);//array_search(value,array,strict)
	if($result === NULL){
	echo "不存在数值red";
	}else{
	echo "存在数值 $result";//存在数值 0
	}

	echo '<br>';

	$aaa = [1,2,3,4,5];
	// $aaa = unset($aaa);

	if($aaa === NUll)
	{
		echo '不存在数组aaa';
	}else
	{
		echo '存在数组aaa';
	}



 ?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
</head>
<body>
<hr>
<div style="width:500px;height:500px"></div>
</body>
</html>
 