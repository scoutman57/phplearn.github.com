<?php
header("Content-Type:text/html;charset=utf-8");     

echo '题目描述
输入10个数，找出其中绝对值最小的数，将它和最后一个数交换，然后输出这10个数。
<br>
提示
输入
十个数
<br>
输出
交换后的十个数
<br>
样例输入
<br>
10 2 30 40 50 60 70 80 90 100
<br>
样例输出
<br>
10 100 30 40 50 60 70 80 90 2
<br><br><br>';


changeNumber($arr = array(10 ,2, 30, 40, 50, 60, 70, 80, 90, 100));

function changeNumber($arr)
{
   $arr2 = $arr;
   foreach ($arr2 as $v => $k)
   {
       if ($k < 0)
           $k = abs($k);
       $arr2[$v] = $k;
   }
   $minnum = array_search(min($arr2), $arr2);
   $maxnum = array_search(max($arr), $arr);
   $min = $arr[array_search(min($arr2), $arr2)];
   $max = max($arr);
   $arr[$maxnum] = $min;
   $arr[$minnum] = $max;
   print_r($arr); 
}



echo '<hr>';
$array = array('1' => -1,-2,-3,-4,-5);
var_dump(abs($array));
if (array_search(1 ,$array) != 0)
    echo '1111';
else
    echo '2222';
?>






















