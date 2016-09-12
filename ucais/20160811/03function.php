<?php
	header("Content-Type:text/html;charset=utf-8");
	

	// function_exists();//检测函数是否被定义

	//返回:如果存在返回true.否则返回false


	function test()
	{
		echo 'function';
	}
	if (function_exists('test'))
		echo 'test函数已经定义';
	else
		echo 'test,未定义';


	if (!function_exists('test'))
	{
		function TEST()
		{
			echo "TEST";
		}
	}




	function test1()
	{
		echo 'this is test function';
	}

	if(!function_exists('test')){
		function TEST()
		{
			echo 'this is jiance guo hou de function';
		}
	}

	if(function_exists('test'))
	{
		echo 'test 函数已经定义了!';
	}else{
		echo 'test 未定义,可以定义了!';
	}

	test();





	echo '<hr>';


	//检测文件是否存在-----------------------------------------------------------------------------------------------------------------------------------------------


	file_exists('文件路径');// 检测文件是否存在

	//返回:如果存在返回true.否则返回false


	if (file_exists('./1.txt'))
	{
		echo '存在';
		unlink('./1.txt');
	}
	else
	{
		echo '不存在';
	}

	echo '<hr>';

	//







	//------------------------------------------------------------------

	// trim   ltrim  rtrim  删除指定字符或者空格和预定义字符

	// \n   \r   \t  预定义字符


	$str = " !\n   axxxxxhhhhhhxxxxxxxxxx,\n bbbbbbbbbbbbbbbbbc && ";

	$str = trim($str);

	// $str = trim($str , 'a');
	file_put_contents( './1.txt',$str);
	var_dump($str);



	$arr = array(1,2,3,4,5);

	$arr = rtrim($arr[2]);

	var_dump($arr);

	$aa = "\nbxxx b vvvb ";
	$aa = trim($aa);
	$aa = trim($aa , 'b');
	var_dump($aa);







	echo '<hr>';


	//字符串填充----------------------------------------------------------------------------------------------------------------------------------------------------------

	// str_pad('原始字符串', '指定长度' [, '指定字符' , '填充方向'])
	//使用另一个字符填充字符为指定长度

	$str = 'hello';
	echo str_pad($str, 15 , 'g').'<br>';
	echo str_pad($str, 15 , '*' , STR_PAD_LEFT).'<br>';
	echo str_pad($str, 15 , '+' , STR_PAD_BOTH).'<br>';









	echo '<hr>';

	//重复字符串----------------------------------------------------------------------------------------------------------------------------------------------------------


	// str_repeat('指定字符串', '重复次数')
	// 返回指定重复次数的字符串

	echo str_repeat('+', 10).'<br>';

	for ($i = 1 ; $i <= 10 ; $i++)
	{
		echo str_repeat('&nbsp' , 10-$i) . str_repeat('＊', $i).'<br>';
	}









	echo '<hr>';

	//字符串转化为数组(按字符分割)----------------------------------------------------------------------------------------------------------------------------------------------------------

	// str_split('原始字符串' [, '指定长度']);
	//返回一个分割后的2数组
	//如果不指定长度,则按照1个字符画分


	$str = 'abcdefghjiklmn';
	$str2 = '臭不要脸臭不要脸臭不要脸臭不要脸'; //一个汉字=三个字符
	var_dump(str_split($str , 5));
	var_dump(str_split($str2 , 12));





	//讲1234567890转换成123,456,789,0



	
	splits($str = '1234567890');
	function splits($str){
		echo "$";
		for ($i = 0 ; $i < strlen($str) / 3 ; $i++)
		echo substr($str, $i*3,3).',';
	}
	




	echo '<br>';



	splits2($str = '1234567890');
	function splits2($str){
		echo "$";
		for ($i = 0 ; $i < strlen($str) / 3 - 1; $i++)
			echo substr($str, $i*3,3).',';
		echo substr($str, $i*3 ,strlen($str) % 3);
	}









	
	// 写一个函数判断字符串是否为回文串;
	// 回文串: abcdeedcba 或者 abcdedcba
	//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	echo '<hr>';



	huiWenC($str = 'abcdeedcba');
	function huiWenC($str){
		if ($str == strrev($str))
			echo $str.'是回文串';
		else
			echo $str.'不是回文串';
	}











	//选猴王:一群猴子排成一圈，按1，2，…，n依次编号。然后从第1只开始数，数到第m只,把它踢出圈，从它后面再开始数，再数到第m只，在把它踢出去…，如此不停的进行下去，直到最后只剩下一只猴子为止，那只猴子就叫做大王。要求编程模拟此过程，输入m、n, 输出最后那个大王的编号。

	echo '<hr>';

	// echo monkeyKing($m = 2 , $n = 1);
	// function monkeyKing($m , $n){
	// 	$arr = range(1 , $n , 1);
	// 	$a = $n;
	// 	for ($i = 0 ; $i < $a-1 ; $i++)
	// 	{
	// 		$len = count($arr);
	// 		var_dump($len);
	// 		if ($len == 1)
	// 			break;
	// 		elseif ($m <= $len && $len % $m == 0)
	// 		{
	// 			for ($b = $m , $j=2; $b <= $len ; $b *= $j , $j++)
	// 				unset($arr[$b-1]);
	// 		}
	// 	}
	// 	var_dump($arr);
	// }





function mokeyKing($n,$m) 
{ 
	if ($n<2) 
	{ 
		return '不能小于2'; 
	} 
	 
	$arr=range(1,$n); 
	$num=0; 
	 
	for ($i = 1; $i > 0 ; $i++) 
	{ 
		foreach ($arr as $k => $v) 
		{ 
			++$num; 
			if ($num==$m)  
			{ 
				unset($arr[$k]); 
				$num=0; 
				if (count($arr)==1) 
				{ 
					return reset($arr); 
				} 
			} 
		} 
	} 
} 
 
echo '第'.mokeyKing(455,346).'只猴子成为猴王';

echo '<hr>';




function yuesefu($n,$m) 
{ 
	$r=0; 
	for($i=2; $i<=$n; $i++)  
		$r=($r+$m)%$i; 
	return $r+1; 
} 
echo '第'.yuesefu(455,346).'只猴子成为猴王';


	// $arr = array(1,2,3,4,5);
	// var_dump($arr);
	// unset($arr['2']);
	// var_dump($arr);








// function getKingMokey($n, $m)
// {
//         $monkey[0] = 0;
//         for($i= 1; $i<= $n; $i++) 
//         { 
//                $monkey[$i] = $i;
//         }
//         $len = count($monkey);
//         for($i= 0; $i< $len; $i= $i)
//         {
//               $num = 0;
//              foreach($monkey as $key => $value) 
//              { 
//                 if($value == 0) continue; 
//                 $num++; 
//                 $values = $value; 
//              }
//              if($num == 1) 
//              { 
//                     echo $values;
//                     exit; 
//              }
//              $monkey[$i] = 0;
//              echo $i."";
//              for($j= 1; $j<= $m; $j++) 
//              { 
//                    $i++;
//                    if($monkey[$i] > 0) continue;
//                    if($monkey[$i] == 0) 
//                    { 
//                            for($k= $i; $k< $len; $k++)
//                            { 
//                                    if($monkey[$k] == 0) $i++;
//                                    if($monkey[$k] > 0) break;
//                            } 
//                     }
//                    if($i == $len) $i = 0;
//                    if($monkey[$i] == 0) 
//                    { 
//                           for($k= $i; $k< $len; $k++) 
//                           {
//                                    if($monkey[$k] == 0) $i++;
//                                   if($monkey[$k] > 0) break;
//                           } 
//                    } 
//             }
//       }
// }
// $n = 10;
// $m = 3;
// getKingMokey($n, $m);


?>
