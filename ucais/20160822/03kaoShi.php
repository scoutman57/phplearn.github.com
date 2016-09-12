<?php
header("Content-Type:text/html;charset=utf-8");

echo '1000张纸牌排成一列，编号依次为1、2、3...999、1000.第一次拿走所有奇数位置上的牌，第二次再从剩余牌中拿走所有奇数位置上的牌，以此类推。请问最后剩下的一张牌的编号是多少？<br>';


for ($i = 1 ; $i <= 1000 ; $i++)
{
    $array[$i] = $i;
}
var_dump(unsetOddx($array));
function unsetOddx($array)
{
    if (count($array) == 1)
        return $array;
    foreach ($array as $k => $v)
    {
        if ($k % 2 == 1)
            unset($array[$k]);
    }
    $arrk = range(1 , count($array));
    $newArr = array_combine($arrk , $array);
    return unsetOddx($newArr);
}




echo '<hr>';//-------------------------------------------------------------------------

function unsetOddx2($array)
{
    if(count($array)==1)
        return $array;
    $array2 = array();
    for($i = 1; $i<count($array); $i += 2)
        $array2[] = $array[$i];
    return unsetOddx2($array2);
}
$array = range(1,1000);
var_dump(unsetOddx2($array));




echo '<hr>';//-------------------------------------------------------------------------
$arr = range(1 , 1000);
while (count($arr) > 1)
{
    $newArr = array();
    for ($i = 0; $i < count($arr); $i++)
    {
        if ($i % 2 == 1)
            $newArr[] = $arr[$i];
    }
    $arr = $newArr;
}
var_dump($arr);



echo '<hr>';//-------------------------------------------------------------------------
function unsetOddx3($a)
{
    for($i=0; ; $i++)
    {
        if(pow(2,$i)>$a/2)
            return pow(2,$i);
    }
}
echo unsetOddx3(1000);






echo '<hr>';//-------------------------------------------------------------------------
$i = 0;
$a = 1000;
while ($i <= $a)
{
    if (pow(2 , $i) > $a/2)
    {
        echo pow(2 , $i);
        break;
    }
    $i++;
}
for ($i ; $i <= 100 ; $i++)
{
    if (pow(2 , $i) > $a/2)
    {
        echo pow(2 , $i);
        break;
    }
}






echo '<hr>';//-------------------------------------------------------------------------
echo newfun(1000);
function newfun($a)
{
    $i = 0;
    while ($i <= $a)
    {
        if (pow(2 , $i) > $a/2)
            return pow(2 , $i);
        $i++;
    }
}
?>
























<title>练习题</title>
