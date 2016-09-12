<?php
	
	header("Content-Type:text/html;charset=utf-8");

	//exit;   退出程序运行,常用于调试代码.该函数是die函数的别名
	//die;

	//break;  结束当前整个循环
	//continue;  借宿当前本次循环


	for($i = 0 ;$i < 20; $i++)
	{
		if ($i == 10) 
			break;
		echo $i.'<br>';
	}

	echo '<hr>';

	for($i = 0 ;$i < 20; $i++)
	{
		if ($i == 10) 
			continue;
		echo $i.'<br>';
	}

	// echo '<hr>';

	// for($i = 0 ;$i < 20; $i++)
	// {
	// 	if ($i == 10) 
	// 		die;
	// 	echo $i.'<br>';
	// }

	echo '<hr>';

	for($a = 1; $a <= 9;$a++)
	{
		for($b = 1;$b <= $a;$b++)
		{
			if ($a == 5) {
				break(2);
			}
			echo $a . '*' . $b . ' = ' . ($a * $b) . '　';
		}
			echo '<br>';
	}

	echo '<hr>';

	for($a = 1; $a <= 9;$a++)
	{
		for($b = 1;$b <= $a;$b++)
		{
			if ($a == 5) {
				// exit('exit');
			}
			echo $a . '*' . $b . ' = ' . ($a * $b) . '　';
		}
			echo '<br>';
	}


	for($a = 1;$a < 100;$a++)
	{
		if($a == 30)
		{
			break;
		}
		echo $a;
	}


	echo '<hr>';

	for($i = 1;$i <= 7; $i++)
	{
		for($j = 1;$j <= 15 ;$j++)
		{
			echo '*';
			if($i > 1 && $j >= 2 && $i < 7)
			{
				echo '<font color="white">+++++++++++++</font>';
				break;
			}

		}
		for($x = 1;$x <= 2 ;$x++)
		{
			echo '*';			
		}
		echo '<br>';
		
	}





// 数组:按维度分类
	// 一位数组,二维数组...多维数组


	// array(
	// '键' => '值';
	// '键' => '值';
	// '键' => '值';
	// '键' => '值';
	// ...
	// )

	$arr = array(
		'a' => 'apple',
		'b' => 'banana',
		'c' => 'caomei',
		'd' => array(			
			'a' => 'aaa',
			'b' => 'bbb',
			'c' => 'ccc',
			'd' => array(
				'a' => '111',
				'b' => '222',				
				),
			),
		);
	// echo '<pre>';
	print_r($arr);




	// 按照数组类型
	// 关联数组:下标为字符串,必须自己指定
	// 索引数组:下标位数字,不一定要自己指定,如果不指定,自动补齐

	$arr2 = array('a','b','c','d');
	print_r($arr2);


	//访问数组元素,可以通过数组的下标进行指定
	echo '<br>'.$arr['d']['d']['a'];
	echo '<br>';


	$arr3[] = 'red';
	$arr3['g'] = 'green';
	$arr3[] = 'yellow';
	$arr3['h']['m'] = 'blue';
	$arr3['h']['s'] = 'ssss';

	print_r($arr3);


	$arr = array(
		'a' => 'apple',
		'b' => 'banana',
		'f' => 'caomei',
		'u' => 'ucai',
		'red','blue',
		);

	// print_r($arr);

	// foreach (原始数组变量 as 下标变量 => 值变量)
	// {
	// 	使用下标和值
	// }


	$i = 0;
	foreach ($arr as $key => $value)
	{
		echo $key.'====>'.$value.'<br>';
		$i++;
	}
	echo $i.'<br>';





	// foreach (原始数组变量 as 值变量)
	// {
	// 	使用值
	// } 

	foreach ($arr as $v)
	{
		echo $v.'<br>';
	}

	echo '<hr>';

	$arr2 = array(
		array('red','blue','yellow','pink'),
		array('orange','gold','lightblue','black'),
		);

	foreach ($arr2 as $k => $v) 
	{
		foreach ($v as $color) 
		{
			echo '<p style="background:'.$color.'">1</p>';
		}
	}

	echo '<hr>';


	$userInfo = array(
		'三年一班' => array(
			'001' => array(
				'username' => '李狗蛋1',
				'password' => '123456',
				'age' => '18',
				'gender' => '男',
				'score' => '50'
				),
			'002' => array(
				'username' => '李狗蛋2',
				'password' => 'as3',
				'age' => '19',
				'gender' => '男',
				'score' => '51'
				),
			'003' => array(
				'username' => '李狗蛋3',
				'password' => 'dsfsw',
				'age' => '20',
				'gender' => '男',
				'score' => '52'
				),
			),
		'三年二班' => array(
			'001' => array(
				'username' => '李狗蛋4',
				'password' => '123456',
				'age' => '21',
				'gender' => '男',
				'score' => '53'
				),
			'002' => array(
				'username' => '李狗蛋5',
				'password' => 'er2',
				'age' => '22',
				'gender' => '男',
				'score' => '54'
				),
			'003' => array(
				'username' => '李狗蛋6',
				'password' => 'adsa',
				'age' => '23',
				'gender' => '男',
				'score' => '55'
				),
			),
		);

	print_r($userInfo);
	echo '<br>';
	echo '<hr>';




	$html = '<table cellpadding="10" cellspacing="0" width="600" align="center" border="1">';
	foreach ($userInfo as $class => $users)
	{
		// echo $class;
		$html .= '<tr><th colspan="6">'.$class.'</th></tr>';
		$html .= '<tr><th>学号</th><th>姓名</th><th>密码</th><th>年龄</th><th>性别</th><th>分数</th></tr>';
		foreach ($users as $xuehao => $user)
		{
			$html .= '<tr>';
			$html .= '<td>'.$xuehao.'</td>';
			$html .= '<td>'.$user['username'].'</td>';
			$html .= '<td>'.$user['password'].'</td>';
			$html .= '<td>'.$user['age'].'</td>';
			$html .= '<td>'.$user['gender'].'</td>';
			$html .= '<td>'.$user['score'].'</td>';
			$html .= '</tr>';
		}
	}
	$html .= '</table>';
	echo $html;





	echo '<hr>';






	echo '<hr>';


	$arr = array("one", "two", "three");

	var_dump(each($arr));
	var_dump(each($arr));
	echo '返回一个数组,里面0和key指定的是原数组元素的下标,1和value指定的是原数组元素的值,没执行一次each,数组内的指针会下移动一次';

	//可以给一组变量赋值
	// list();
	//只能接受索引下标的元素
	list($a , $b) = array('apple','banana');
	list( , , $c) = array('apple','banana','caomei');
	echo $a .'--'. $b;
	echo '<br>';
	echo $c;
	echo '<br>';

	echo '<hr>';

	// while(list('下标变量','值变量') = each('原始数组变量'))
	// {
	// 	使用下标和值
	// }


	$arr = array("one", "two", "three");
	reset($arr);//重置数组指针
	while (list(, $value) = each($arr)) {
	    echo "Value: $value<br>\n";
	}
	
	foreach ($arr as $value) {
	    echo "Value: $value<br />\n";
	}

	echo '<hr>';


	$arr = array("one", "two", "three");
	reset($arr);
	while (list($key, $value) = each($arr)) {
	    echo "Key: $key; Value: $value<br />\n";
	}
	
	foreach ($arr as $key => $value) {
	    echo "Key: $key; Value: $value<br />\n";
	}


	echo '<hr>';

	$html = '<table cellpadding="10" cellspacing="0" width="600" align="center" border="1">';
	foreach ($userInfo as $class => $users)
	{
		// echo $class;
		$html .= '<tr><th colspan="6">'.$class.'</th></tr>';
		$html .= '<tr><th>学号</th><th>姓名</th><th>密码</th><th>年龄</th><th>性别</th><th>分数</th></tr>';
		foreach ($users as $xuehao => $user)
		{
			$html .= '<tr>';
			$html .= '<td>'.$xuehao.'</td>';
			$html .= '<td>'.$user['username'].'</td>';
			$html .= '<td>'.$user['password'].'</td>';
			$html .= '<td>'.$user['age'].'</td>';
			$html .= '<td>'.$user['gender'].'</td>';
			$html .= '<td>'.$user['score'].'</td>';
			$html .= '</tr>';
		}
	}

	$html .= '</table>';
	echo $html;

	echo '<hr>';
	$html = '<table cellpadding="10" cellspacing="0" width="600" align="center" border="1">';
	reset($userInfo);
	while (list($class,$users) = each($userInfo))
	{
		$html .= '<tr><th colspan="6">'.$class.'</th></tr>';
		$html .= '<tr><th>学号</th><th>姓名</th><th>密码</th><th>年龄</th><th>性别</th><th>分数</th></tr>';
		while (list($xuehao,$user) = each($users))
		{
			$html .= '<tr>';
			$html .= '<td>'.$xuehao.'</td>';
			$html .= '<td>'.$user['username'].'</td>';
			$html .= '<td>'.$user['password'].'</td>';
			$html .= '<td>'.$user['age'].'</td>';
			$html .= '<td>'.$user['gender'].'</td>';
			$html .= '<td>'.$user['score'].'</td>';
			$html .= '</tr>';
		}
	}

	$html .= '</table>';
	echo $html;



	echo '<hr>';
	echo '斐波那契数列:';
	$arrF =  range (2 , 1000 ,1 );
	$arrF2 = array(0,1,1);
	foreach ($arrF as $k => $v)
	{
		$a = count($arrF2);
		if ($v == ($arrF2[$a-1] + $arrF2[$a-2])) $arrF2[] = $v;	
	}
	foreach ($arrF2 as $key => $value) {
		echo $value.' ';	
	}
	// print_r($arrF2);



	echo '<hr>';


	$j = 0;
	echo '1-100的合计';
	for ($i = 1; $i <= 100; $i++)
	{
		$j += $i;
	}
	echo $j.'<br>';


	echo '<hr>';


	$j = 0;
	echo '1-100奇数的合计';
	for ($i = 1; $i <= 100; $i++)
	{
		if($i % 2 != 0)
		{
			$j += $i;
		}		
	}
	echo $j.'<br>';




	echo '<hr>';
	
	echo '数组转换<br>';
	$array = array('name','php','birth','1995','age','30');
	$array2 = array();
	foreach ($array as $k => $v) 
	{
		if($k % 2 == 0)
		{
			$array2[$v] = $array[$k+1];
		}
	}
	print_r($array2);




	// echo imlode(',' , $arr);//php内置函数,使用指定字符把数组元素组合成字符串


	



?>