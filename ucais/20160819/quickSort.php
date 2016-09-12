<?php
header("Content-Type:text/html;charset=utf-8");

echo '作业五:快速排序算法<br>
 - 思路分析：选择一个基准元素，通常选择第一个元素或者最后一个元素。通过一趟扫描，将待排序列分成两部分，一部分比基准元素小，一部分大于等于基准元素。此时基准元素在其排好序后的正确位置，然后再用同样的方法递归地排序划分的两部分<br>
例子: 7 2 5 9<br>
 - 第一次:(2 5) 7 (9)<br>
 - 第二次:(2(5)) 7 (9)<br>';

$array = array(15,24,36,10,8,9,12);
var_dump(quickSort($array));
function quickSort($array)
{
    $len = count($array);
    if ($len <= 1)
        return $array;
    $key = $array['0'];
    $array_left = array();
    $array_right = array();
    for ($i = 1; $i < $len; $i++) {
        if ($array[$i] <= $key)
            $array_left[] = $array[$i];
        else
            $array_right[] = $array[$i];
    }
    $array_left = quickSort($array_left);
    $array_right = quickSort($array_right);
    $array2[] = $key;
    return array_merge($array_left, $array2, $array_right);
}

echo '<hr>';

$array = array(15,24,36,10,8,9,12);
var_dump(quickSort2($array));
function quickSort2($array)
{
    $len = count($array);
    if ($len <= 1)
        return $array;
    $key = $array['0'];
    $array_left = array();
    $array_right = array();
    for ($i = 1; $i < $len; $i++) {
        if ($array[$i] <= $key)
            $array_left[] = $array[$i];
        else
            $array_right[] = $array[$i];
    }
    $array_left = quickSort2($array_left);
    $array_right = quickSort2($array_right);
    foreach ($array_left as $k => $v)
    {
        $array2[] = $v;
    }
    $array2[] = $key;
    foreach ($array_right as $k => $v)
    {
        $array2[] = $v;
    }
    return $array2;
}

?>
