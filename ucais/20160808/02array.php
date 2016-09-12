<?php
	header("Content-Type:text/html;charset=utf-8");

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



?>