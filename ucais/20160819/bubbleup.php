<?php
header("Content-Type:text/html;charset=utf-8");

echo '作业四:冒泡排序算法<br>
 - 思路分析：在要排序的一组数中，对当前还未排好的序列，从前往后对相邻的两个数依次进行比较和调整，让较大的数往下沉，较小的往上冒。即，每当两相邻的数比较后发现它们的排序与排序要求相反时，就将它们互换<br>
 例子:6,3,9,4<br>
 - 第一轮3次比较 3694 3694 3649<br>
 - 第二轮2次比较 364(9) 346(9)<br>
 - 第三轮1次比较 34(69)<br>';

$array = array(15,24,36,10,8,9,12);

echo bubbleup($array);
function bubbleup($array)
{
    $len = count($array);
    for ($i = 0 ; $i < $len - 1 ; $i++)
    {
        for ($j = 0 ; $j < $len - $i - 1 ; $j++)
        {
            if ($array[$j] > $array[$j+1])
            {
                $new = $array[$j+1];
                $array[$j+1] = $array[$j];
                $array[$j] = $new;
            }
        }
    }
    var_dump($array);
}
?>
