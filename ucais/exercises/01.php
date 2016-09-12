<?php
header("Content-Type:text/html;charset=utf-8");

echo '题目描述<br>
有一个函数<br>
y={ x      x<1<br>
    | 2x-1   1<=x<10<br>
    \ 3x-11  x>=10<br>

写一段程序，输入x，输出y<br>

提示<br>
输入<br>
一个数x<br>

输出<br>
一个数y<br>

样例输入<br>

14<br>
样例输出<br>

31<br>
来源<br><br><br>';

echo xyfun($x = 14);
function xyfun($x)
{
    if ($x < 1)
        return $y = $x;
    elseif ($x >= 10)
        return $y = 3 * $x - 11;
    else
        return $y = 2 * $x -1;
}

echo '<hr>';














//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
echo '题目描述
输入10个整数，将其中最小的数与第一个数对换，把最大的数与最后一个数对换。写三个函数； ①输入10个数；②进行处理；③输出10个数。<br>
提示<br>
输入<br>
10个整数<br>
输出<br>
整理后的十个数，每个数后跟一个空格（注意最后一个数后也有空格）<br>
样例输入<br>

2 1 3 4 5 6 7 8 10 9<br>
样例输出<br>

1 2 3 4 5 6 7 8 9 10 <br><br><br>';

echo getNum();

function getNum()
{
    $num = '2,1,3,4,5,6,7,8,9,10';
    handle($num);
}

function handle($num)
{
    $arr = explode(',' ,$num);
    $max = max($arr);
    $min = min($arr);
    $first = $arr[0];
    $last = $arr[count($arr)-1];
    foreach ($arr as $k => $v)
    {
        if ($v == $max)
            $arr[$k] = $last;
        if ($v == $min)
            $arr[$k] = $first;
    }
    $arr[0] = $min;
    $arr[count($arr) - 1] = $max;
    $num = implode(' ' , $arr);
    outPut($num);
}

function outPut($num)
{
    echo $num;
}















echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
echo '苹果篮子题：<br>
10个篮子，1000个苹果，问如何把这1000个苹果放到篮子里，最终实现：<br>
从1-1000任意取出一个数字，就可以使用某几个篮子里的苹果的数量加起来就是这个数字。<br>
1. 如何放苹果<br>
2. 当选择一个数字之后，如何快速告诉我哪几个篮子里的苹果数加起来就是这个数。<br>
<br>';
$arr = range(1 , 1000);
$f = array(1,2);
$arr2 = array_combine($f , $f);
$num = 491;

    echo getApple($arr , $arr2 , $num);


function getApple($arr , $arr2 , $num)
{
    $bool1 = false;
    $bool2 = false;
    $x = 3;
    foreach ($arr as $k => $v)
    {
        if ($v == (array_sum($arr2)+1))
        {
            $arr2[$x] = $v;
            $x++;
        }
        if (count($arr2) == 9)
            break;
    }
    $arr2['10'] = 1000 - array_sum($arr2);
    echo '1到10号篮子每个篮子放的个数为:'.implode(',' , $arr2).'<br>';
    $arr3 = array_flip($arr2);
    $arr4 = $arr3;
//    var_dump($arr3);
    $max =  array_sum($arr2) - $arr2['10'] + 1;
    if ($num > $arr2['10'] && $num < $max)
    {
        array_pop($arr4);
        for ( ;  ; )
        {
            $a = array_rand($arr4, rand(1, 9));
            if (!is_array($a))
                $a = explode(' ', $a);
            $b = array_sum($a);
            if ($b == $num)
            {
                echo '篮子编号为:';
                foreach ($a as $k => $v) {
                    foreach ($arr2 as $k2 => $v2) {
                        if ($v == $v2) {
                            echo $k2 . '.';
                            $bool1 = true;
                        }
                    }
                }
            }
            if ($bool1 === true)
                break;
        }
        $num = $num - $arr2['10'];
        for ( ;  ; )
        {
            $a = array_rand($arr4, rand(1, 9));
            if (!is_array($a))
                $a = explode(' ', $a);
            $b = array_sum($a);
            if ($b == $num) {
                echo '<br>或者篮子编号为:';
                foreach ($a as $k => $v)
                {
                    foreach ($arr2 as $k2 => $v2)
                    {
                        if ($v == $v2)
                        {
                            echo $k2 . '.';
                            $bool2 = true;
                        }
                    }
                }
                echo '10';
            }
            if ($bool1 === true && $bool2 ===true)
                return;
        }
    }
    for ( ;  ; )
    {
        $a = array_rand($arr3 , rand(1 , 10));
        if (!is_array($a))
            $a = explode(' ' ,$a);
        $b = array_sum($a);
        foreach ($arr2 as $key => $value)
        {
            if ($num == $value)
                return '篮子编号为:'.$key.'<br>';
        }
//        当$num 在489和512之间有两种情况

        if ($b == $num)
        {
            echo '篮子编号为:';
            foreach ($a as $k => $v)
            {
                foreach ($arr2 as $k2 => $v2)
                {
                    if ($v == $v2)
                        echo $k2.'.';
//                    if ($v == $v2 && $v2 == $arr2['10'])
//                        echo '或者是2.4.6.7.8.9';
                }
            }
            return '<br>';
        }
    }
}











echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo '字符串截取题：<br>
$str = \'学习<div>php来<a href="http://www.itcast.cn <br>
<br>
">传智</a>播客</div>。\';<br>
截取前7个字符显示出来，最终应该要这个结果：<br>
\'学习<div>php来<a href="http://www.itcast.cn <br>
<br>
">传</a></div>\'<br>
要求：1. 如果字符串中有HTML标签就略过不记数<br>
     2. 如果截取完之后有HTML标签被截断了，那么要在最后把截断的标签再补上结束标签<br>';














?>















<div style="height: 500px;"></div>




