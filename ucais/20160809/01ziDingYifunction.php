<?php
	header("Content-Type:text/html;charset=utf-8");
	// echo '<meta charset="utf-8">';


	echo '自定义函数<br>';
	echo '函数概述<br>';
	echo '1）函数的本质：完成特定功能的代码块,任何代码都可能出现在函数中<br>';
	echo '2）函数通过function 关键字来定义<br>';
	echo '）函数必须通过调用才能使用,但是函数无需在调用之前定义<br>';
	echo '4）函数调用不区分大小写,但是要养成好习惯<br>';


	echo '函数的优点<br>';
	echo '1）提高程序的重用性<br>';
	echo '2 ) 提高软tt4件的可维护性<br>';
	echo '3 ) 提高开发效率<br>';
	echo '4 ) 控制程序设计的复杂性<br>';

	$sum = 0;
	for($i = 1; $i <= 100 ; $i++)
	{
		$sum += $i;
	}

	echo $sum;

	echo '<hr>';

	$sum = 0;
	for($i = 1; $i <= 100 ; $i++)
	{
		if($i % 2 == 0)
			continue;

		$sum += $i;
	}

	echo $sum;

	echo '<hr>';

	$arr[0] = 0;
	$arr[1] = 1;

	for($i = 2 ; $i < 100; $i++)
	{

		if($arr[$i - 2]  > 500)
			break;

		$arr[$i] = $arr[$i - 1] + $arr[$i - 2];
	}

	// 0 1 1 2 3 5 8 
	echo implode(',' ,$arr); //PHP 内置函数,使用指定字符把数组元素组合成字符串

	echo '<hr>';

 	$arr = array('name' , 'php' , 'birth' , 1995 , 'age' , '30');

 	$newArr = array();
 	foreach($arr as $k => $v)
 	{
 		if($k % 2 == 0)
 		{
 			// $arr[0] = 'name';
 			$newArr[$arr[$k]] = $arr[$k + 1];
 			// $newArr['name'] = 'php';
 		}
 	}
 	// $arr['a'] = 'apple';
 	var_dump($newArr);



	// 函数定义
	// function 函数名（[参数1，参数2，参数3，……]）
	// {
	// 	函数体；
	// 	[return 返回值；]
	// }



	//定义函数fun
	function sum($a , $b)
	{
		$sum = $a + $b;
		return $sum;
	}
	//调用函数sum();
	//函数名([参数1,参数2...参数n]);
	echo sum(10 , 20).'<br>';

	//定义函数fun
	function sum2($a , $b , $c)
	{
		$sum2 = $a + $b + $c;
		return $sum2;
	}
	//调用函数sum();
	echo sum2(10 , 20 , 30).'<br>';


	echo '<hr>';
	//return

	$a = 20;
	function test()
	{
		return 10;
	}

	echo $a + test();

	echo '<hr>';








	//用户注册---------------------------------------------------------------------------------------------------------------------------------------------------------------------------


	echo '用户注册,发送短信通知
			1) 实现用户名校验,密码校验
			2) 用户名密码校验通过后,注册成功短信通知可以通过echo出一条信息代替<br><br>';
	function check($userName , $userPassword)
	{
		$length = strlen($userName);
		$length2 = strlen($userPassword);
		if($length > 0 && $length2 >= 6 && $length2 <= 20)
			send();
		else
		{
			if ($length == 0)
				echo '用户名不能为空!!!<br>';
			else
				echo '密码必须为6-20位!!!<br>';
		}
	}

	function send()
	{
		echo '短信发送成功!!!<br>注册成功!!!<br>';
	}

	echo check('myName' , 'myPassword');


	echo '<hr>';



	echo '<br>';

	function checkUserName($userName2)
	{
		return strlen($userName2) != 0;
	}

	function checkPassword($password2)
	{
		$len = strlen($password2);
		return $len >= 6 && $len <= 20;
	}

	function sendMessage()
	{
		echo '短信发送成功!!!<br>';
	}

	function regieter($userName2 , $password2)
	{
		if(!checkUserName($userName2))
			return '用户名不能为空!!!<br>';
		if(!checkPassword($password2))
			return '密码必须为6-20位!!!<br>';
		sendMessage();
		return '注册成功!!!';
	}
	echo regieter('1','123456');














	//圆的面积--------------------------------------------------------------------------------------------------------------------------------------------------------------------------


	echo '<hr>';
	echo '圆的面积<br><br>';

	function size($r)
	{
		return round(pi() * $r * $r,2).'<br>';
	}

	echo size(2);
	echo size(5);
	echo size(6);


	function circleArea($r)
	{
		$area = pi() * $r * $r;
		return round($area , 2);
	}

	for($i = 1 ; $i < 10 ; $i++)
	{
		echo circleArea($i).'<br>';
	}














	//定义函数输入行和列输出隔行换色表格--------------------------------------------------------------------------------------------------------------------------------------------------


	echo '<hr>';



	echo '练习-4
			定义函数输入行和列输出隔行换色表格
			自定义行
			自定义列
			自定义奇偶行颜色
			自定义宽
			自定义对齐方式<br><br>';

	function table($row = '5' , $col = '5' , $colorOdd = 'green' , $colorEven = 'yellow' , $width = '500px' , $align = 'left')
	{
		$html = '<table style="text-align:'.$align. '"border="1" width =' .$width.' '.'align = center>';
		for ($i = 1 ; $i <= $row ; $i++)
		{
			if ($i % 2 == 0)
			{
				$html .= '<tr bgcolor='.$colorEven.'>';
				// for ($j = 1 ; $j <= $col ; $j++)
				// {
				// 	$html .= '<td>'.$i.'-'.$j.'</td>';
				// }
				// $html .= '</tr>';
			}else
			{
				$html .= '<tr bgcolor='.$colorOdd.'>';
				// for ($j = 1 ; $j <= $col ; $j++)
				// {
				// 	$html .= '<td>'.$i.'-'.$j.'</td>';
				// }
				// $html .= '</tr>';
			}
			for ($j = 1 ; $j <= $col ; $j++)
			{
				$html .= '<td>'.$i.'-'.$j.'</td>';
			}
				$html .= '</tr>';
		}
		$html .= '</table>';
		return $html;
	}
	echo table(8 , 10 , 'skyblue' , 'yellow' , '800px' , 'right');

	echo '<hr>';


	function table2($row , $col , $colorOdd , $colorEven , $width = 200 , $align = right)
	{
		$html = '<table style="text-align:'.$align. '"border="1" width =' .$width.' '.'align = center>';
		for ($i = 1 ; $i <= $row ; $i++)
		{
			if ($i % 2 == 0)
				$html .= '<tr bgcolor='.$colorEven.'>';
			else
				$html .= '<tr bgcolor='.$colorOdd.'>';
			for ($j = 1 ; $j <= $col ; $j++)
				$html .= '<td>'.$i.'-'.$j.'</td>';
			$html .= '</tr>';
		}
		$html .= '</table>';
		return $html;
	}

	echo table(4 , 10 , 'skyblue' , 'yellow' , '' , 'right');







	function table3($rows, $cols , $jiColor = 'green' , $ouColor = 'blue' , $width = '600', $align = 'center' )
	{

		$html = '<table width="'.$width.'" cellpadding= "10" cellspacing="0" border="1" align="'.$align.'">';

		$tr = 0;
		while($tr < $rows){	
			switch($tr % 2)
			{
				case 0:
					$color = $ouColor;
				break;
				case 1:
					$color = $jiColor;
				break;
			}

			$html .= '<tr bgcolor="'.$color.'">';

			$td = 0;
			while($td < $cols)
			{
				$html .= '<td>'.($tr * $cols + $td + 1).'</td>';
				$td++;
			}
			$html .= '</tr>';
			$tr++;
		}

		$html .= '</table>';
		return $html;
	}

	echo table3(10 , 5 , 'red' , 'yellow' , '888' , 'center');

	echo table3('10','10');




	

	

	//使用全局变量------------------------------------------------------------------------------------------------------------------------------------------------------

	echo '<hr>';


	$a = 10;
	$b = 20;

	function sumx()
	{
		// global $a , $b;//使用全局变量,会影响外部
		// echo $a + $b.'<br>';
		echo $GLOBALS['a'] + $GLOBALS['b'].'<br>';//可以使用全局变量,不会影响外部
		$a = 100;
	}

	echo $a.'<br>';
	sumx();
	echo $a.'<br>';







	//引用传值--------------------------------------------------------------------------------------------------------------------------------------------------------

	echo '<hr>';

	function test2(&$str)
	{
		$str = 'hello ' . $str;
		return $str;
	}

	$u = 'ucai';
	echo test2($u).'<br>';
	echo $u;






	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------

	echo '练习 - 5
			完善注册功能
			1.校验姓名,密码不能为空
			2.校验手机号不能为空,必须为11位数字
			3.地址默认为成都
			4.校验失败则终止函数并返回错误信息,成功则保存信息( echo 成功保存 )
			5.保存成功发送手机短信( 直接echo发送成功 )
			6.最后结构返回用户注册成功或者失败<br><br>';


	function checkUserName2($userName2)
	{
		return strlen($userName2) != 0;
	}

	function checkPassword2($password2)
	{
		$len = strlen($password2);
		return $len >= 6 && $len <= 20;
	}

	function checkPhoneNumber2($phoneNumber)
	{
		return strlen($phoneNumber) == 11 && is_numeric($phoneNumber);
	}

	function sendMessage2()
	{
		echo '短信发送成功!!!<br>';
	}

	function regieter2($userName2 , $password2 , $phoneNumber , $address = '成都')
	{
		if(!checkUserName2($userName2))
			return '用户名不能为空!!!<br>';
		if(!checkPassword2($password2))
			return '密码必须为6-20位!!!<br>';
		if(!checkPhoneNumber2($phoneNumber))
			return '手机号必须为11位数字!!!<br>';
		echo '您的信息为:<br>用户名:'.$userName2.'<br>密码:'.$password2.'<br>手机号:'.$phoneNumber.'<br>地址:'.$address.'<br>';
		sendMessage2();
		return '注册成功!!!';
	}
	echo regieter2('myName','myPassword','12345678912','火星');






	echo '<hr>';



	//找出数组中最大的数----------------------------------------------------------------------------------------------------------------------------------------------------------

	$array = array(1,2,4,55,44,27,39,15,42);
	foreach ($array as $k => $v) 
	{		
		if ($v > $a)
			$a = $v;
	}
	echo $a;
	var_dump(intval((19) / 10 , 0));













	echo '<hr>';
	//小朋友糖果----------------------------------------------------------------------------------------------------------------------------------------------------------
	$arrayChild = array(
		'小朋友1' => '0',
		'小朋友2' => '0',
		'小朋友3' => '0',
		'小朋友4' => '0',
		'小朋友5' => '0',
		'小朋友6' => '0',
		'小朋友7' => '0',
		'小朋友8' => '0',
		'小朋友9' => '0',
		'小朋友10' => '0',
		);
	$arrayCandy = range(1,99,1);

    foreach ($arrayCandy as $k => $v)
    {		
    	if ($k <10)
    	{
    		$j = $k + 1;
    		$arrayChild["小朋友$j"] += $v;
    	}else
    	{
    		$k = ($k + 1) - (intval(($k) / 10) * 10);    			
    		$arrayChild["小朋友$k"] += $v;
    	}

    }


	print_r($arrayChild);


	// $arr =array();
	// $num = 0;
	// for ($i = 1 ; $i <= 10 ; $i++)
	// {
		
	// 	for($j = $i; $j <= 99; $j = $i + 10)
	// 	{
	// 		$num = $num +$j;
	// 	}
	// 	$arr[$i] = $num;
	// }
	// print_r($arr);








	echo '<hr>';
	//模拟制作网购(例如淘宝)-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	$array = array('北京市' => 
		array('石景山区' , '朝阳区' , '海淀区'), 
		'四川省' => 
		array('成都市' =>
			array('龙泉驿区','高新区','武侯区'),
			'自贡市' => 
			array('自流井','沿滩'),),
		'河北省' =>
		array('衡水市' => 
			array('路北新区','桃城区','冰湖新区'),),);

	

	function checkName($name)//
	{
		return strlen($name) != 0;
	}

	function checkAddressIsNull($qu , $shi)//
	{
		return strlen($qu) != 0 && strlen($shi) != 0;
	}

	function checkShenShiQu($qu , $shi , $shen)
	{
		global $array;
		if ($shi == '北京市')
		{
			if ( in_array($qu , $array[$shi]))
				return true;
			else
				return false;
		}
		else
		{
			if (array_key_exists($shen, $array) && array_key_exists($shi, $array[$shen]) && in_array($qu, $array[$shen][$shi]))
				return true;
		}
		return false;
	}

	function checkPhoneNumberx($phone)//
	{
		return strlen($phone) == 11 && is_numeric($phone);		
	}

	function checkYouBian($youBian)//
	{
		if (strlen($youBian) == 0)
			return true;
		elseif (strlen($youBian) != 6)
			return false;
		elseif (strlen($youBian) == 6 && is_numeric($youBian))
			return true;	
	}

	function randNumber()
	{
		// return $number = rand(10000000,99999999);
		$k = rand(0,99999999);
    	return str_repeat('0',8-strlen($k)).$k;

	}

	function regieterTao($name , $phone , $qu , $shi , $youBian = '' , $shen = '')
	{
		global $array;
		if (!checkName($name))
			return '用户名不能为空<br>';
		if (!checkAddressIsNull($qu , $shi))
			return '地址不能为空<br>';
		if (!checkPhoneNumberx($phone))
			return '手机号码必须为11位数字<br>';
		if (!checkYouBian($youBian))
			return '邮编必须是6位数字或者不填<br>';
		if (!checkShenShiQu($qu , $shi , $shen))
			return '地址有误';
		echo $name . '订单提交成功!<br>订单号为:'.randNumber().'<br>地址为:'.$shen.$shi.$qu.'<br>收件人为:'.$name.'<br>手机号为:'.$phone.'<br>邮编:'.$youBian;
	}

	echo regieterTao('myName' , '12345678901' , '朝阳区' , '北京市' , '610500');

	



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div style="height:500px"></div>
</body>
</html>
