<?php
	header("Content-Type:text/html;charset=utf-8");
	
	echo '时间限制: 1 Sec  内存限制: 128 MB
		题目描述
		你的弟弟刚做完了“100以内数的加减法”这部分的作业，请你帮他检查一下。每道题目（包括弟弟的答案）的格式为a+b=c或者a-b=c，其中a和b是作业中给出的，均为不超过100的非负整数；c是弟弟算出的答案，可能是不超过200的非负整数，也可能是单个字符"?"，表示他不会算。
		
		提示
		输入
		输入文件包含不超过100行，以文件结束符结尾。每行包含一道题目，格式保证符合上述规定，且不包含任何空白字符。输入的所有整数均不含前导0。
		
		输出
		输出仅一行，包含一个非负整数，即弟弟答对的题目数量。
		
		样例输入
		
		1+2=3
		3-1=5
		6+7=?
		99-0=99

		样例输出
		
		2
		来源
		湖南省第六届大学生计算机程序设计竞赛<br>';


		echo '<hr>';

		function times($array)
		{
			$number =  count($array);
			for ($i = 0 ; $i < $number ; $i++)
			{
				check($array[$i] , $number);
			}
		}
		$t = 0;
		$k = 0;
		function check($equality , $number)
		{
			
			$i = 0;
			global $k;
			global $t;
			for ($j = 0 ; $j < $number ; $j++)
			{				
				$a = explode('=', $equality);
				$b = $a[0];
				$therd = intval($a[1]);//3
				if (strpos($b, '+') == 1)
				{
					$a = explode('+', $b);
					$first = intval($a[0]);//1
					$second = intval($a[1]);//2
					if ($first + $second == $therd)
					 $i += 1;
				}else
				{
					$a = explode('-', $b);
					$first = intval($a[0]);
					$second = intval($a[1]);
					if ($first - $second == $therd)
					 $i += 1;
				}
				$t++;//for循环执行了多少次
			}
			if ($i > 0)
			{
				$k += $i ;
			}
			if($t / $number == $number)
				echo $k / $number;
		}


		echo times($array = array('1+2=3','3-1=5','6+7=?','99-0=99','1+1=2'));

		
		
?>