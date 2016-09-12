<?php

	header("Content-Type:text/html;charset=utf-8");


	//if 分支结构,单项分支

	//if(条件)
	//{
		//条件为真时执行的代码
	// }


	$a = 10;
	if ($a > 5)
	{
		echo $a.' > 5';
	}

	echo "<br>";
	echo $a;


	echo "<hr>";

	//if ... else ..., 双向分支

	//if(条件)
	//{
		//条件为真时执行的代码
	// }else{
	//条件为假是执行的代码
	// }

	$rand = rand(0 , 20);
	echo $rand . '<br>';
	if ($a > $rand) {
		# code...
		echo "鱼";
	}else
	{
		echo "熊掌";
	}


	// if () :
			//条件为真时的代码
	// else :
			//条件为假时的代码
	// endif;



	// if ... elseif ... elseif ... else ...   ,多项分支

	// if (条件1) {
	// 	# 条件一为真时执行的代码
	// }elseif (条件2) {
	// 	# 条件二为真时执行的代码
	// }elseif (条件3) {
	// 	# 条件三为真时执行的代码
	// }

	// ...
	// 知道条件n的都可以

	// else{
	// 	# 如果以上条件都为假是执行,非必须,可以按照默认来理解
	// }



	//设置时区为上海
	date_default_timezone_set('Asia/Shanghai');
	//获得当前小时
	$date = date('H');
	var_dump($date);
	//随机时间
	$date = rand(0 , 24);
	var_dump($date);

	if ($date >= 6 && $date <= 10) {
		# code...
		echo "早上好!";
	}elseif ($date > 10 && $date < 12) {
		# code...
		echo "上午好!";
	}elseif ($date >= 12 && $date <= 14) {
		# code...
		echo "中午好!";
	}elseif ($date > 14 && $date <= 18) {
		# code...
		echo "下午好!";
	}elseif ($date > 18 && $date <= 22) {
		# code...
		echo "晚上好!";
	}else{
		echo "洗洗睡吧";
	}


	if ($date >= 6 && $date <= 10) :
		echo "早上好!";
	elseif ($date > 10 && $date < 12) :
		echo "上午好!";
	elseif ($date > 10 && $date < 12) :
		echo "中午好!";
	elseif ($date >= 12 && $date <= 14) :
		echo "上午好!";
	elseif ($date > 14 && $date <= 18) :
		echo "下午好!";
	elseif ($date > 18 && $date <= 22) :
		echo "晚上好!";
	else:
		echo "洗洗睡吧";
	endif;





	echo "<hr>";
	//switch ... case ... case ...

	//switch(变量条件)
	// {
	// 	case 值1:
	// 		位值1时执行的代码段
	// 		break;
	// 	case 值2:
	// 		位值3时执行的代码段
	// 		break;
	// 	case 值3:
	// 		位值3时执行的代码段
	// 		break;
	// 		...
	// 	case 值n:
	// 		位值n时执行的代码段
	// 		break;
	// 		default:
	// 		如果上面没有满足的情况下,默认执行代码段,非必须
	// }


	$a = '';

	switch ($a) {
		case '111':
			echo "好帅好帅!";
			break;
		case '222':
			echo "2222!";
			break;
		case '333':
			echo "asdsf!";
			break;
		default:
			echo '请输入三剑客的名称';
			break;
	}


	//date("D")  Mon ---Sun
	//date('N')   1  ---  7(星期天)
	$a = date('N');
	var_dump($a);

	switch ($a) {
		case '1':
			echo '今天是星期一';
			break;
		case '2':
			echo '今天是星期二';
			break;
		case '3':
			echo '今天是星期散';
			break;
		case '4':
			echo '今天是星期四';
			break;
		case '5':
			echo '今天是星期五';
			break;
		case '6':
			echo '今天是星期六';
			break;		
		default:
			echo '今天是星期天';
			break;
	}



	echo "<hr>";


	// ? :
	//三元运算符/三目

	// 条件 ? 条件为真时执行的代码 : 条件为假时的执行代码

	$gender = 1;
	$res = $gender == 1 ? '男' : '女';
	echo $res . '<br>';


	$a = 10;
	$b = 20;

	echo $a > 5 ? '你' : $b < 25 ? '我' : '他';

	//你 ? 我 : 他;
	//我;








	echo '<hr>';
	echo "循环结构<br>";
	//--------------------------------------------------------------------------------------------
	// 1.初始值
	// 2.条件
	// 3.增量

	//初始值
	// while (条件) {
	// 	循环体,自己定义代码

	// 	增量
	// }



	$i = 1;
	while ($i <= 20) 
	{
		echo $i.'<br>';
		$i++;
	}

	// 初始值 -> 判断条件 -> 真 -> 执行循环体 -> 执行增量 -> 判断条件 -> 执行循环体 -> 执行增量 ... -> 假 -> 结束循环


	$a = 0;
	while ($a <= 100) {
		echo $a . ' ';
		$a += 2;
	}

	$a = 0;
	echo "<br>";
	while ($a <= 100) {
		if ($a % 2 == 0) {
			echo $a . ' ';
		}
		$a++;
	}

	echo "<br>";

	$b = 0;
	$c = 0;
	while ($b <= 100) {
		$c += $b;
		$b++;
	}
	echo $c . '<br>';



	$a = 1;
	echo '<table style="border:1px black solid">';
	while ($a <= 200) {
		echo "<tr>";
		while ($a <= 20) {
			echo "<td>$a</td>";
			$a++;
		}
		echo "</tr>";
		echo "<tr>";
		while ($a <= 40) {
			echo "<td>$a</td>";
			$a++;
		}
		echo "</tr>";
		echo "<tr>";
		while ($a <= 60) {
			echo "<td>$a</td>";
			$a++;
		}
		echo "</tr>";
		echo "<tr>";
		while ($a <= 80) {
			echo "<td>$a</td>";
			$a++;
		}
		echo "</tr>";
		echo "<tr>";
		while ($a <= 100) {
			echo "<td>$a</td>";
			$a++;
		}
		echo "</tr>";
		echo "<tr>";
		while ($a <= 120) {
			echo "<td>$a</td>";
			$a++;
		}
		echo "</tr>";
		echo "<tr>";
		while ($a <= 140) {
			echo "<td>$a</td>";
			$a++;
		}
		echo "</tr>";
		echo "<tr>";
		while ($a <= 160) {
			echo "<td>$a</td>";
			$a++;
		}
		echo "</tr>";
		echo "<tr>";
		while ($a <= 180) {
			echo "<td>$a</td>";
			$a++;
		}
		echo "</tr>";
		echo "<tr>";
		while ($a <= 200) {
			echo "<td>$a</td>";
			$a++;
		}
		echo "</tr>";
		echo "</table>";
		
		
	}




	$a = 1;
	$i = 1;
	echo '<table border=1px">';
	while ($a <= 200) {
     	while ($a == 1) {
     	  		echo "<tr>";
     	  		break;
     	  	}  	
		while ($a <= 10) {
			echo "<td>$a</td>";
			$a++;
		}			
		while ($a == 11) {
			echo "</tr>";
     	  		break;
     	  	}  	
		$b = ($a % 10 + $i) * 10 ;	
		echo "<tr>";
		while ($a <= $b) {
			echo "<td>$a</td>";
			$a++;
		}	
		$i++;			
		echo "</tr>";			
	}
	echo "</table>";




	echo "<hr><hr>";



	$a = 1;
	$i = 1;
	echo '<table border=1px">';
	while ($a <= 200) {
     	if($a <= 10)
     	{
     		echo "<tr>";
			while ($a <= 10) {
				echo "<td>$a</td>";
				$a++;
			}	
			echo "</tr>";
		}		 	
		$b = ($a % 10 + $i) * 10 ;	
		echo "<tr>";
		while ($a <= $b) {
			echo "<td>$a</td>";
			$a++;
		}	
		$i++;			
		echo "</tr>";			
	}
	echo "</table>";



	echo "<hr>";




	$t = 0;
	$html = '<table width="600px" cellpadding="10" cellspacing="0" border="1" align="center">';
	$tr = 0;
	while ($tr < 20) {
		$html .= '<tr>';
		$td = 0;
		while ($td < 10) 
		{
			$html .= '<td>'.($tr *10 +$td + 1).'</td>';
			$td++;
		}
		$html .= '</tr>';
		$tr++;
	}
	$html .= '</table>';
	echo $html;
	echo "<hr>";





	$t = 0;
	$html = '<table width="600px" cellpadding="10" cellspacing="0" border="1" align="center">';

	while ($t < 200) 
	{
		if ($t % 10 ==0) 
			$html .= '<tr>'	;
		$html .= '<td>'.($t+1).'</td>';
		$t++;
		if ($t %10 ==0)
			$html .= '</tr>';
	}
	$html .= '</table>';
	echo $html;
	echo "<hr>";










	//do ... while

	// 初始值
	// do{
	// 	执行循环体

	// 	增量
	// }while(条件);

	//初始值 -> 执行循环体 -> 增量 -> 判断条件 -> 真 -> 执行循环体 -> 增量 ... -> 假 -> 结束循环

	//无论条件是否成立,都会执行一次循环体内容

	$a = 1;
	do
	{
		echo $a.'<br>';
		$a++;
	}while($a <= 10);

	echo "<hr>";

	$b = 1;
	while ($b <= 10) 
	{
		echo $b.'<br>';
		$b++;
	}





	//for 循环

	// for(初始值;条件;增量)
	// {
	// 	循环体
	// }

	//初始值 -> 判断条件 -> 真 -> 执行循环体 -> 增量 -> 判断条件 ... 假 -> 结束循环

	for ($i=1; $i < 10; $i++) { 
		echo $i.'<br>';
	}


	echo "<hr>";



	//输出99乘法表

	for($i = 0 ; $i < 10 ; $i++)
	{
		for($j = 1 ; $j <= $i ; $j++)
		{
			echo $j . '*' . $i . '=' . $i*$j . ' ';			
		}
		echo '<br>';
	}





	echo '<hr>';

	echo '判断是否为闰年<br>';

	$year = date('Y');
	$year2 = rand(0,3000);

	if($year % 4 == 0 && $year % 100 != 0 || $year % 400 == 0)
	{
		echo $year . '是闰年' . '<br>';
	}else
	{
		echo $year . '不是闰年' . '<br>';
	}

	if($year2 % 400 == 0 || $year2 % 4 == 0 && $year2 % 100 != 0)
	{
		echo $year2 . '是闰年' . '<br>';
	}else
	{
		echo $year2 . '不是闰年' . '<br>';
	}



	echo "<hr>";
	echo "判断一个数是否为素数<br>";
	$a1 = microtime();
	$ss = rand(1,99999);
	$xxxx = 1;
	if($ss == 2)
		echo $ss. '是素数';
	elseif($ss ==1)
		echo $ss. '不是素数也不是合数';
	else
	{
		for($i=2; $i < $ss ; $i++) 
		{
			if($ss % $i == 0) 
			{
				$xxxx = $ss . '不是素数';
				echo $xxxx;
				break;
			}			
		}
		if($xxxx == 1)
      		{
      			echo $ss. '是素数';
      		}		
	}
	$a2 = microtime() - $a1;
	echo $a2;




	echo "<hr>";
	echo "输出图形<br>";


	for($a = 1 ; $a <=11 ; $a++)
	{
		
		if($a == 1 || $a == 11)
		{
			echo "*";
			for($b =1 ; $b <= 6 ; $b++)
			{
				echo "&nbsp;";
			}
			echo "*<br>";
		}
		
		if($a == 2 || $a == 10)
		{
			echo "**";
			for($b =1 ; $b <= 5 ; $b++)
			{
				echo "&nbsp;";
			}
			echo "**<br>";
		}
		if($a == 3 || $a == 9)
		{
			echo "***";
			for($b =1 ; $b <= 4 ; $b++)
			{
				echo "&nbsp;";
			}
			echo "***<br>";
		}
		if($a == 4 || $a == 8)
		{
			echo "****";
			for($b =1 ; $b <= 3 ; $b++)
			{
				echo "&nbsp;";
			}
			echo "****<br>";
		}
		if($a == 5 || $a == 7)
		{
			echo "*****";
			for($b =1 ; $b <= 2 ; $b++)
			{
				echo "&nbsp;";
			}
			echo "*****<br>";
		}
		if($a == 6)
		{
			echo "******";
			for($b =1 ; $b <= 1 ; $b++)
			{
				echo "&nbsp;";
			}
			echo "******<br>";
		}
	}

	echo "<hr>";

	for($h=1;$h<=6;$h++)
	{//循环行 
		
    	for($k=1;$k<=6-$h;$k++)
    	{//输出空格部分
        	echo '&nbsp';
    	} 
    	
    	for($i=1;$i<=$h*2-1;$i++)
    	{//输出‘1’部分
        	echo '＊';
    	} 
    	

    	echo '<br/>';//画完一行，换行    	
	}

	echo "<hr>";
	echo "<div style='text-align:center;width:auto;float:left'>"; 
	for($h=1;$h<=6;$h++)
	{//循环行  

    	for($i=1;$i<=$h*2-1;$i++)
    	{//输出‘1’部分
        	echo '*';
    	}
    	echo '<br/>';//画完一行，换行    	
	}
	echo "</div>";

	echo "<div style='clear:left'></div>";


	echo "<hr>";

 

	for($h=1;$h<=6;$h++){echo str_repeat('&nbsp', 6-$h).str_repeat('＊', $h*2-1).'<br>';}



	echo "<hr>";
	

	for($i = 1 ; $i <= 11 ; $i++)
	{
		if($i <= 6)
		{
			echo str_repeat('*', $i) . str_repeat('&nbsp', 6-$i) . ' ' . str_repeat('*', $i) . '<br>';
		}else
		{
			echo str_repeat('*', 12-$i) . str_repeat('&nbsp', $i-6) . ' ' . str_repeat('*', 12-$i) . '<br>';
		}
	}



	echo "<hr>";
	


	$t = 0;
	$html = '<table width="600px" cellpadding="10" cellspacing="0" border="1" align="center">';
	$tr = 0;
	while ($tr < 20) {			
		if($tr % 3 == 0)
		{
			$html .= '<tr style="background:tomato">';
		}
		if(($tr-1) % 3 == 0)
		{
			$html .= '<tr bgcolor="aqua">';
		}
		if(($tr-2) % 3 == 0)
		{
			$html .= '<tr bgcolor="greenyellow">';
		}

		$td = 0;
		while ($td < 10) 
		{			
			$html .= '<td>'.($tr *10 +$td + 1).'</td>';
			$td++;			
		}
		$html .= '</tr>';
		$tr++;
	}
	$html .= '</table>';
	echo $html;
	echo "<hr>";


	





?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<!-- 给body随机颜色
 <body bgcolor = <?php echo '#'.rand(00000000 , 99999999); ?>? -->
<body>
<div style="width:500px;height:500px"></div>

</table>
</body>
</html>


