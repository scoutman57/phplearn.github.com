<?php
	header("Content-Type:text/html;charset=utf-8");




	$arr = array();
	for($i = 1 ; $i <= 10 ; $i++)
	{
		$num = 0;

		for($j = $i; $j <= 99; $j += 10)
		{
			$num += $j;
		}
		$arr[$i] = $num;
	}
	var_dump($arr);
	

	function addArray(){
		$city=array(
			'四川省'=>array(
				'成都市'=>array('锦江区','青羊区','金牛区','龙泉驿区','高新区'),
				'绵阳市'=>array('涪城区','游仙区','三台县','盐亭县')
				),
			'广东省'=>array(
				'广州市'=>array('越秀区','从化区','花都区','天河区'),
				'深圳市'=>array('龙岗区','福田区','罗湖区')
				),
			'北京市' => array('石景山区' , '丰台区' , '海淀区' , '朝阳区'),
			'天津市' => array('宝坻区' , '南开区'),
		);
		return $city;
	}

	function checkAddress($province , $city , $area)
	{
		$addArr = addArray();

		$zhi = array('北京市' , '天津市' , '上海市' , '重庆市');

		// in_array() 判断一个值是否在数组中,如果在返回true,反之 false
		// array_key_exists();  判断一个下标是否在数组中,如果在返回true,反之false
		if($province == '' && in_array($city , $zhi))
		{
			if(!array_key_exists($city , $addArr))
				return '1';
			if(!in_array($area , $addArr[$city]))
				return '2';
		}else{
			if(!array_key_exists($province , $addArr))
				return '3';
			if(!array_key_exists($city , $addArr[$province]))
				return '4';
			if(!in_array($area , $addArr[$province][$city]))
				return '5';
		}
		return '0';
	}

	function checkPostCode($postCode)
	{
		if($postCode == '') return true;
		return is_numeric($postCode) && strlen($postCode) == 6;
	}

	function register($province , $city , $qu , $postCode = '')
	{
		$code = checkAddress($province , $city , $qu);
		switch ($code) {
			case '1':
				return '直辖市不在配送范围';
				break;
			case '2':
				return '区域不在配送范围';
				break;
			case '3':
				return '省份不在配送范围';
				break;
			case '4':
				return '该城市不在配送范围';
				break;
			case '5':
				return '该区域不在该城市配送范围';
				break;
		}

		if(!checkPostCode($postCode))
			return '请输入正确邮编';

		return $province . $city . $qu . ' 邮编为 '.$postCode;
	}

	echo register('四川省' , '成都市' , '金牛区' , '10000');

	// 状态值说明
	// 1 : 直辖市不在配送范围
	// 2 : 区域不在配送范围
	// 3 : 省份不在配送范围
	// 4 : 该城市不在配送范围
	// 5 : 该区域不在该城市配送范围
	

	//可变函数---------------------------------------------------------------------------------------------------------------------------------------------------------------


	function teacher()
	{
		echo '这里是讲师的函数<br>';
	}

	function student()
	{
		echo '这里是学生的函数<br>';
	}

	$fun = 'teacher';
	$fun();
	$fun = 'student';
	$fun();


	function php()
	{
		echo '需要准备lamp,sublime等<br>';
	}

	function ui()
	{
		echo '需要准备photoshop等<br>';
	}

	function check($type)
	{
		$type = strtolower($type);
		if ($type == 'php' || $type == 'ui')
			$type();
		else
			return 'xxx';
	}

	check('PHP');
	check('UI');







	echo '<hr>';

	//递归函数------------------------------------------------------------------------------------------------------------------------------------------------------------

	function dg($i)
	{
	echo $i . '<br>';
	if($i > 0 )
	{
		dg($i - 1);	
	}else
	{
		echo '------------<br>';
	}
	echo $i. '<br>';
	}

	dg(10);




	echo '<hr>';

	//----------------------------------------------------------------------------------------------------------------------------------------


	$array2 = array(1,2,3,4,5,6);
	shuffle($array2);
	$str = implode(',', $array2);
	$a = explode(',', $str);	//用,分割并赋值
	$a5 = array_search('5', $array2);//获取数组中值为5的键值并赋值
	$a6 = array_search('6', $array2);
	for ($i=0; $i < 1; ) 
	{ 
		if ($a[2] == 5 || $a6 - $a5 == 1 || $a6 - $a5 == -1) 
		{
			shuffle($array2);
			$str = implode(',', $array2);
			$a = explode(',', $str);//重新用,分割并赋值
			$a5 = array_search('5', $array2);//重新获取数组中值为5的键值并赋值
			$a6 = array_search('6', $array2);
		}
		else
			break;
	}
	var_dump($array2);

	$str = '1,2,3,4,5,6';

	function getArr($str)
	{
		$arr = explode(',' , $str);

		shuffle($arr);

		if($arr[2] == 5)
			return getArr($str);

		for($i = 0; $i < count($arr); $i++)
		{

			$i_prev = $i - 1 >= 0 ? $i - 1 : $i; //获取上一位的下标
			$i_next = $i + 1 < count($arr) ? $i + 1 : $i; //获取下一位的下标

			$bool = $arr[$i] == 5 && ($arr[$i_prev] == 6 || $arr[$i_next] == 6);

			if($bool)
				return getArr($str);
		}

		return $arr;

	}

	var_dump(getArr($str));




	$str = '1,2,3,4,5,6';
	$array = explode(',', $str);
	do
	{
		shuffle($array);
		$a5 = array_search('5', $array);
		$a6 = array_search('6', $array);
	}
	while($a5 - $a6 == 1 || $a5 - $a6 == -1 || $array[2] == 5);
	var_dump($array);







	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	echo '<hr>';
	echo '有一堆数字,12,65,110,2,3,55,79,10,45等很多数字并且没有重复的，
		要求是：输出第一个数是最大的，第二个数是最小的 ，第三个数是第二大，
		第四个数是第二小...以此类推
		110 2 79 3 65 10 55 12 45<br><br><br>';


	function number($str)
	{		
		$array = explode(',', $str);
		$length = count($array);
		rsort($array);
		for ($i = 0 ; $i < $length ; $i++)
		{
			if ($i % 2 == 0)
				$array2[$i] = $array[$i/2];//0 2 4 6 8 
			else
				$array2[$i] = $array[$length-round($i/2)];//1 3 5 7 9
		}
		var_dump($array2);	
	}
	$str = '12,65,110,2,3,55,79,10,45';
	number($str);

	echo '<hr>';





	$str = '12,65,110,2,3,55,79,10,45';
	$array = explode(',', $str);
	$length = count($array);
	rsort($array);
	for ($i = 0 ; $i < $length ; $i++)
	{
		if ($i % 2 == 0)
			$array2[$i] = $array[$i/2];//0 2 4 6 8 
		else
			$array2[$i] = $array[$length-round($i/2)];//1 3 5 7 9
	}
	var_dump($array2);	
	
	




?>
<div style = "height:500px"></div>