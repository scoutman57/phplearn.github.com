<?php
header("Content-Type:text/html;charset=utf-8");
echo '<style>
body{
text-align: center;
}
</style>';

//内置函数-----------------------------------------------------------------------------------------------------------------------------------------
// strrev('原始字符串'); // 反转字符串
// 返回反转后的字符串
$a = 'safrvsaefrb134432bf';
echo strrev($a);
echo '<hr>';
// str_shuffle('原始字符串'); // 打乱字符串
// 返回打乱后的字符串
//实现验证码功能,输出6位验证码,要求有大写字母,小写字母,数字
$a = '0123456789';
$b = 'abcdefghijklmnopqrstuvwxyz';
$c = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$a = substr($a, rand(0,9) , 2);
$b = substr($b, rand(0,25) , 2);
$c = substr($c, rand(0,25) , 2);
$a = $a . $b . $c;
echo str_shuffle($a);
echo '<br>';
$a = '0123456789';
$b = 'abcdefghijklmnopqrstuvwxyz';
$c = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$a = substr($a, rand(0,9) , rand(1,4));
$b = substr($b, rand(0,25) , 5-strlen($a));
$c = substr($c, rand(0,26 - strlen($a.$b)) , 6 - strlen($a.$b));
$a = $a . $b . $c;
echo str_shuffle($a);
echo '<hr>';
function number ()
{
    $a = '0123456789';
    $a = substr($a, rand(0,9) , rand(1,4));
    low($a);
}
function low ($a)
{
    $b = 'abcdefghijklmnopqrstuvwxyz';
    $b = substr($b, rand(0,25) , 5-strlen($a));
    up($a,$b);
}
function up($a,$b)
{
    $c = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $c = substr($c, rand(0,26 - strlen($a.$b)) , 6 - strlen($a.$b));
    echo str_shuffle($a = $a . $b . $c);
}
function yanZhengMa()
{
    number();
}
yanZhengMa();
echo '<hr>';
function getCode($type = array())
{
    $str = '';
    if(in_array('num', $type))
        $str .= implode(range('0' , '9'));
    if(in_array('alpha', $type))
        $str .= implode(range('a' , 'z'));
    if(in_array('big_alpha', $type))
        $str .= implode(range('A' , 'Z'));
    $str = str_shuffle($str);
    return substr($str , 0 , 6);
}
echo getCode(array('num' , 'alpha' , 'big_alpha'));



echo '<hr>';






//--------------------------------------------------------------------------------------------------------------------------------
//大小写转换---------------------------------------------------
//string strtolower (string 字符串)
// - 将字符串转为小写
// - 返回转为小写的字符串
//
//string strtoupper (string 字符串)
// - 将字符串转为大写
// - 返回转为大写的字符串

$low = 'abc';
$up = 'DEF';
echo $low.'<br>';
echo $up.'<br>';
echo strtoupper($low).'<br>';
echo strtolower($up).'<br>';

echo '<hr>';

//string ucfirst (string 字符串)
// - 将开头字母转为大写
// - 返回开头字母为大写的字符串
//
//string ucwords (string 字符串)
// - 将字符串每个单词的开头字母转为大写
// - 返回单词开头字母转为大写的字符串


$up = 'abc def gh';
echo $up.'<br>';
echo ucfirst($up).'<br>';
echo ucwords($up).'<br>';











echo '<hr>';

//-------------------------------------------------------------------------------------------------------------------
//HTML编码
// addslashes('原始字符串'); //在特殊字符前加上反斜杠进行转义
$str = "这里\r有一个\n'字符'串!";
echo $str.'<br>';
echo addslashes($str);






echo '<hr>';
//--------------------------------------------------------------------------------------------------------------------------------
//nl2br('原本是字符串'); 把 \n 转为<br>
$str = "asdafsda\nvadsfwae\ncea";
echo $str.'<br>';
echo nl2br($str);






echo '<hr>';

//--------------------------------------------------------------------------------------------------------------------------------
//htmlspecialchars('原始字符串') 把特殊字符串转移为实体

$str = '我这里有个<div style = "color:red" class = "code">哈哈哈</div>';

echo $str;
echo '<hr>';

echo $str = htmlspecialchars($str);
echo '<hr>';

echo $str = htmlspecialchars_decode($str);







echo '<hr>';

//--------------------------------------------------------------------------------------------------------------------------------
//字符串比较大小-------------------
//strcasecmp('字符串1' , '字符串2');//二进制比较字符串,不区分大小写,比较的是 爱四次 码

$str1 = 'hello';
$str2 = 'hello world';

echo strcasecmp($str1 , $str2);






echo '<hr>';

//--------------------------------------------------------------------------------------------------------------------------------
//分割字符串-------------------

//chunk_split('原始字符串' , '长度' , '指定字符');//使用指定字符分割为小块

$str = 'fdgshrfsthsrhdsfbdfg';

echo chunk_split($str , 4 , '+').'<br>';
echo chunk_split($str , 3 , ',').'<br>';
echo chunk_split($str , 2 , ' ').'<br>';

echo '<hr>';
//substr('原始字符串' , '起始位置' , '指定长度');//使用指定字符分割为小块

$str = 'sdgfheaouihbaejdfgnl';
echo substr($str , 2 , -5).'<br>';
echo substr($str , -6 , -2).'<br>';
echo substr($str , 2 , 5).'<br>';
echo substr($str , -2 , 5).'<br>';


//如果起始位置Wie整数,则表示从左侧0开始
//如果起始位置为负数,则表示从右侧-1开始
//截取长度为正数,则表示向右截取
//截取长度为负数,则表示终止位置,会返回终止位置与起始位置所有字符









echo '<hr>';

//--------------------------------------------------------------------------------------------------------------------------------
//array explode (string 指定字符串 , string 被切割的字符串 )
//使用指定字符讲=将原始字符串切割成数组并返回
// - 使用一个字符串分割另一个字符串
// - 此函数返回由字符串组成的 array，每个元素都是 被切割字符串的一个子串，它们被指定字符串作为边界点分割出来
//

$str = '123,dfgb,647,fdgb,456hg,s5e3';
var_dump(explode(',' , $str));
var_dump(explode('456' , $str));



//string implode (string 指定字符串  , array 数组)
//使用指定字符将原始数组元素连接成字符串并返回,如果不指定字符,则无缝连接
//- 将一个一维数组的值转化为字符串
//- 返回一个字符串，其内容为由 指定字符串 分割开的数组的值

$array = array(1,2,3,4,5,6);

echo implode(',' , $array).'<br>';
echo implode('*' , $array).'<br>';



echo '<hr>';
//重写explode函数--------------------

explode2($arr = '1,2,3,4,5,6,7,8,9' , $str = ',');

function explode2($arr , $str)
{


    echo str_split($arr , 1);
    if (strstr($arr , $str))
    {
        $time =  substr_count($arr , $str);
        for ($i = 0 ; $i <= $time ; $i++) {
            $array[$i] = substr($arr, $i * 2, strpos($arr, $str));
            $array2 = str_split($arr , strpos($arr, $str));
            foreach ($array2 as $v => $k)
            {
                array_splice();
            }

        }

    }
    else {
        $array = array($arr);
    }
    var_dump($array);
}




function getCharpos2($str, $char){

    $j = 0;

    $arr = array();

    $count = substr_count($str, $char);

    for($i = 0; $i < $count; $i++){

        $j = strpos($str, $char, $j);

        $arr[] = $j;

        $j = $j+1;

    }
    return $arr;
}
getCharpos2( '1,2,3,4,5,6,7,8,9' , ',');




echo '<hr>';

//explode($a,$str)字符串转数组；
function myExplode($a,$str)
{
    $s = '';
    $j = 0;
    $arr2= array();
    $arr = str_split($str);
    echo count($arr);
    $arr[count($arr)]=$a;
    for($i = 0;$i <count($arr);$i++)
    {
        if($arr[$i]!=$a)
        {
            $s.=$arr[$i];
        }else{
            $arr2[$j++] = $s;
            $s= '';
        }
    }
    return $arr2;
}
// echo  myExplode('a','saddad');
var_dump(myExplode(',' , 'we1,2,3,rwe4,35,6,ds37,8,9'));


?>

<div style="height: 500px"></div>


























