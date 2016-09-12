<?php
header("Content-Type:text/html;charset=utf-8");

echo '题目描述
编写程序，输入一批学生的成绩，遇0或负数则输入结束，要求统计并输出优秀（大于85）、通过（60～84）和不及格（小于60）的学生人数。
<br>
运行示例：

<br>

提示
输入
输出
样例输入
<br>
88 71 68 70 59 81 91 42 66 77 83 0<br>
样例输出
<br>
>=85:2    <br>
60-84:7    <br>
<60:2    <br>
<br><br><br>';


echo '<hr>';
$array = array(88,71, 68, 70, 59, 81, 91, 42, 66, 77, 83, 0);
$num = array(0 , 0 , 0 );

countNum($array , $num);

function countNum($array , $num)
{
	foreach ($array as $k => $v)
	{
		if ($v <= 0)
			echo '>=85:'.$num[0].'<br>'.'60-84:'.$num[1].'<br>'.'<60:'.$num[2].'<br>';
		if ($v >= 85)
			$num['0'] += 1;
		elseif ($v >= 60)
			$num['1'] += 1;
		else
			$num['2'] += 1;
	}	

}





?>