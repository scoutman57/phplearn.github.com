<?php
	header("Content-Type:text/html;charset=utf-8");


	echo '数组转换<br>';
	$array = array('name','php','birth','1995','age','30');
	$array2 = array();
	foreach ($array as $k => $v) 
	{
		if($k % 2 == 0)
			$array2[$v] = $array[$k+1];
	}
	print_r($array2);	
?>