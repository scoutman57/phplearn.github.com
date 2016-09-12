<?php
header("Content-Type:text/html;charset=utf-8");

echo '作业五:快速排序算法<br>
 - 思路分析：选择一个基准元素，通常选择第一个元素或者最后一个元素。通过一趟扫描，将待排序列分成两部分，一部分比基准元素小，一部分大于等于基准元素。此时基准元素在其排好序后的正确位置，然后再用同样的方法递归地排序划分的两部分<br>
例子: 7 2 5 9<br>
 - 第一次:(2 5) 7 (9)<br>
 - 第二次:(2(5)) 7 (9)<br>';

$array = array(15,24,36,10,8,9,12);
var_dump(quick_Sort($array));
function quick_Sort($array)
{
    if (count($array) <= 1)//当数组长度小于等于1的时候返回数组
        return $array;
    $ji = $array[0];//基准元素
    $left = array();
    $right = array();
    for ($i = 1 ; $i < count($array) ; $i++)
    {
        if ($array[$i] < $ji)//小于基准元素赋值给数组left,大于辅助给数组right
            $left[] = $array[$i];
        else
            $right[] = $array[$i];
    }
    $left = quick_Sort($left);//再次调用函数,知道数组长度小于等于1时
    $right = quick_Sort($right);
    return array_merge($left , array($ji) , $right);
}
?>

<title>快速排序</title>
