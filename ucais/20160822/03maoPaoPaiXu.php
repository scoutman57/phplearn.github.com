<?php
header("Content-Type:text/html;charset=utf-8");

echo '作业四:冒泡排序算法<br>
 - 思路分析：在要排序的一组数中，对当前还未排好的序列，从前往后对相邻的两个数依次进行比较和调整，让较大的数往下沉，较小的往上冒。即，每当两相邻的数比较后发现它们的排序与排序要求相反时，就将它们互换<br>
 例子:6,3,9,4<br>
 - 第一轮3次比较 3694 3694 3649<br>
 - 第二轮2次比较 364(9) 346(9)<br>
 - 第三轮1次比较 34(69)<br>';

$array = array(15,24,36,10,8,9,12);

function maopao($array)
{
    for ($j = count($array) - 1 ; $j > 0 ; $j--)
    {
        for ($i = 0; $i < $j ; $i++)
        {
            if ($array[$i] > $array[$i + 1])
            {
                $tmp = $array[$i];
                $array[$i] = $array[$i + 1];
                $array[$i + 1] = $tmp;
            }
        }
    }
    var_dump($array);
}
maopao($array);



$array = array(15,24,36,10,8,9,12);

for ($j = count($array)-1 ; $j > 0 ; $j--)
{
    for ($i = 0 ; $i < $j ; $i++)
    {
        if ($array[$i] > $array[$i+1])
        {
            $tmp = $array[$i];
            $array[$i] = $array[$i + 1];
            $array[$i + 1] = $tmp;
        }
    }
}
var_dump($array);
?>





<title>冒泡排序</title>
