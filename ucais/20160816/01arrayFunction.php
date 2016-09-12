<?php
header("Content-Type:text/html;charset=utf-8");


//数组函数 – 数组创建----------------------------------------------------------------------------------------------------
//range('起始值' ,'终止值', '步长');
// - 阿拉伯数字
// - 英文小写字母
// - 英文的大写字母
// - 返回从起始值到终止值，相隔为步长的数组
echo '<h2>range(\'起始值\' ,\'终止值\', \'步长\')</h2>';

var_dump(range('a','z',3));
var_dump(range('A','Z'));
var_dump(range('1','20'));
var_dump(range('A','z'));//可以用但会多一些字符
var_dump(range('1','20',5));
// array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12)
foreach ( range ( 0 ,  12 ) as  $number )
{
    echo  $number ;
}









echo '<hr>';
//数组函数 – 数组创建--------------------------------------------------------------------------------------------------------------
//array_combine('为键的数组', '为值的数组');
// - 两个数组必须元素数相等
// - 返回一个由第一个数组提供键，第二个数组提供值，的合并的新数组
echo '<h2>array_combine(\'为键的数组\', \'为值的数组\');</h2>';
$arr1 = range('a','d');
$arr2 = range('A','D');
$newArr = array_combine($arr1,$arr2);
var_dump($newArr);
$a  = array( 'green' ,  'red' ,  'yellow' );
$b  = array( 'avocado' ,  'apple' ,  'banana' );
$c  =  array_combine ( $a ,  $b );

var_dump ( $c );













echo '<hr>';
//数组函数 – 数组创建--------------------------------------------------------------------------------------------------------------
//compact('变量名1' ,'变量名2'....);
// - 传入多个变量为参数
// - 变量名会变成返回数组的键
// - 变量的值会变成返回数组的值
echo '<h2>compact(\'变量名1\' ,\'变量名2\'....);</h2>';
$a = 'apple';
$b = 'baidu';
$c = 'cai';
$newArr = compact('a','b','c');
var_dump($newArr);

$city   =  "San Francisco" ;
$state  =  "CA" ;
$event  =  "SIGGRAPH" ;

$location_vars  = array( "city" ,  "state" );

$result  =  compact ( "event" ,  "nothing_here" ,  $location_vars );
var_dump ( $result );







echo '<hr>';

//数组函数 – 数组创建--------------------------------------------------------------------------------------------------------------------------------0
//array_fill('索引起始键', '元素个数' , '期待填充的值');
// - 起始键必须是索引数值
// - 返回一个索引从起始键开始，输入个数的元素，填充值为值的新的数组
echo '<h2>array_fill(\'索引起始键\', \'元素个数\' , \'期待填充的值\')</h2>';
$newArr = array_fill(10 , 5 , '啦啦啦');
var_dump($newArr);
$a  =  array_fill ( 5 ,  6 ,  'banana' );
$b  =  array_fill (- 2 ,  4 ,  'pear' );
var_dump ( $a );
var_dump ( $b );









echo '<hr>';
//数组函数 – 合并和拆分------------------------------------------------------------------------------------------------------------------------
//array_chunk('原始数组', '每组个数');
// - 返回一个新的数组
// - 把原始数组分割为多维数组，每个元素的值的数组的元素个数为设置的元素个数
//- 数组元素的下标会变成索引下标
// 不保留原始下标
echo '<h2>array_chunk(\'原始数组\', \'每组个数\')</h2>';

$arr = range('a' , 'f');
var_dump($arr);
$arr = array_chunk($arr , 2);
var_dump($arr);


















echo '<hr>';

//数组函数 – 合并和拆分------------------------------------------------------------------------------------------------------------------------------
//array_merge('数组1' ,'数组2' ,'数组3' ....);
// - 返回一个合并后数组,数组元素在下标不一致的情况下，元素数目相加
//- 下标相同时，后传入数组的值会覆盖前面
echo '<h2>array_merge(\'数组1\' ,\'数组2\' ,\'数组3\' ....)</h2>';

$arr1 = array('a' => 'apple' , 'b' => 'banana', 'c' => 'caomei');
$arr2 = array('r' => 'red' , 'b' => 'blue', 'z' => 'yellow');
$arr3 = array('b' => 'black');
$arr = array_merge($arr1 , $arr2 , $arr3);
var_dump($arr1 , $arr2 , $arr);

//用加号后面重复的值会忽略,不会覆盖
$array1  = array( 0  =>  'zero_a' ,  2  =>  'two_a' ,  3  =>  'three_a' );
$array2  = array( 1  =>  'one_b' ,  3  =>  'three_b' ,  4  =>  'four_b' );
$result  =  $array1  +  $array2 ;
var_dump ( $result );














echo '<hr>';
//数组函数 – 合并和拆分-------------------------------------------------------------------------------------------------------------------
//array_slice('原始数组', '起始元素位置' , '返回元素个数/终止位置');
// - 返回一个截取后数组	//当起始元素位置为正数是，会从元素起始端开始开始计数，起始端为 0
// - 当起始元素位置为负数，会从元素末端开始计数，最末端为 -1
//- 当第三个参数为正整数，表示截取几个元素
//- 当第三个参数为负数时，表示从末端开始的终止位置
//- 后两个传参方式与substr一样
echo '<h2>array_slice(\'原始数组\', \'起始元素位置\' , \'返回元素个数/终止位置\')</h2>';

$arr = range('a' , 'z');
var_dump($arr);
$arr1 = array_slice($arr , 5 );
$arr2 = array_slice($arr , -5 );
$arr3 = array_slice($arr , 5 , 5);
$arr4 = array_slice($arr , -5 ,3);

var_dump($arr1 , $arr2 , $arr3 , $arr4);















echo '<hr>';
//数组函数 – 数组比较-----------------------------------------------------------------
//array_diff('原始数组','数组1' ,'数组2',.....);
// - 返回一个与第一数组的差集的数组
// - 原始数组里面有，"任意"比较数组里面没有的元素返回
echo '<h2>array_diff(\'原始数组\',\'数组1\' ,\'数组2\',.....)</h2>';

$arr1 = array(0 => 'apple' , 'b' => 'banana', 'c' => 'caomei');
$arr2 = array('r' => 'red' , 'b' => 'banana', 'z' => 'yellow');
//$arr3 = array('apple');

$newArr = array_diff($arr1 , $arr2);
//array (size=2)
//  'a' => string 'apple' (length=5)
//  'c' => string 'caomei' (length=6)
var_dump($newArr);


//练习:重写array_diff-------------------------------------------------------------------
//要求比较两个数组就行
echo '练习<br>';
//foreach ($arr2 as $k2 => $v2)
//{
//    foreach ($arr1 as $k1 => $v1)
//    {
//        if ($v2 == $v1)
//            unset($arr1[$k2]);
//    }
//}

foreach ($arr2 as $k2 => $v2)
{
    if (!(array_search($v2, $arr1) === false))
        unset($arr1[array_search($v2, $arr1)]);
}
var_dump($arr1);

















echo '<hr>';
//数组函数 – 数组比较-----------------------------------------------------------------------------------------------------------------
//array_intersect('原始数组','数组1' ,'数组2'.....);
// - 返回一个与第一个数组交集的数组
// - 原始数组里面有，"所有"比较数组里面也有的元素返回
echo '<h2>array_intersect(\'原始数组\',\'数组1\' ,\'数组2\'.....)</h2>';

$arr1 = array('a' => 'apple' , 'b' => 'banana', 'c' => 'caomei');
$arr2 = array('r' => 'red' , 'b' => 'banana', 'z' => 'yellow');

$newArr = array_intersect($arr1 , $arr2);
//array (size=1)
//'b' => string 'banana' (length=6)
var_dump($newArr);

$array1  = array( "a"  =>  "green" ,  "red" ,  "blue" );
$array2  = array( "b"  =>  "green" ,  "yellow" ,  "red" );
$array3  = array('green');
$result  =  array_intersect ( $array1 ,  $array2 );
var_dump ( $result );//green red
$result2  =  array_intersect ( $array1 ,  $array2 , $array3);
var_dump ( $result2 );//green










echo '<hr>';
//数组函数 – 数组查找替换----------------------------------------------------------------------------------------------------------------
//array_search('要匹配的值' ,'原始数组');
// - 如果匹配到的话，会返回配置元素的键，否则返回false

echo '<h2>array_search(\'要匹配的值\' ,\'原始数组\')</h2>';
$arr = array(1,2,3,4,5);
$str = 1;
if (!(array_search($str , $arr) === false))//返回键值为0时if判断为false.这样写就行
    echo $str.'在数组中';
else
    echo $str.'不在数组中';










echo '<hr>';
//in_array('要匹配的值' ,'原始数组');
//- 如果匹配到的话，会返回true ，否则false

echo '<h2>in_array(\'要匹配的值\' ,\'原始数组\')</h2>';
$arr = array(1,2,3,4,5);
$str = 7;
if (in_array($str , $arr))
    echo $str.'在数组中';
else
    echo $str.'不在数组中';









echo '<hr>';
//数组函数 – 数组查找替换
//array_splice('初始数组','起始位置' ,'期待个数/终止位置' ,'填充数组');
// - 返回删除部分的数组
// - 删除部分可以用第四个填充数组参数进行填充,填充数组下标不会被保留,会变为索引下标,原有递增
// - 起始位值（第二个参数）为负数，计数从数组末端元素开始
//- 第三个参数为正数时，显示期待截取几位，为负数时，表示终止位置
//- 会改变原始数组

echo '<h2>array_splice(\'初始数组\',\'起始位置\' ,\'期待个数/终止位置\' ,\'填充数组\')</h2>';
$arr = array('a' , 'b' , 'c' , 'd' , 'e');
var_dump($arr);
$arr2 = array_splice($arr , 1 , 2);//返回的部分就是删除的部分赋值给$arr2. $arr为删除后剩下的
var_dump($arr , $arr2);

$arr = array('a' , 'b' , 'c' , 'd' , 'e');
var_dump($arr);
$arrT = array('x' , '*' ,'$');
$arr2 = array_splice($arr , 1 , 2 , $arrT);//返回的部分就是删除的部分赋值给$arr2. $arr为删除后剩下的并把$arrT放到$arr删除部位
var_dump($arr , $arr2);


$arr1 = array('a' => 'apple' , 'b' => 'banana', 'c' => 'caomei' , 'e' => 'egg');
$arr2 = array('d' => 'dark');
$newArr = array_splice($arr1 , 1,1,$arr2);
var_dump($newArr , $arr1);









echo '<hr>';
//数组函数 – 数组查找替换
//array_sum('数组');
// - 数组元素值的和
// - 当数组元素值不是数值的时候，便不会相加

echo '<h2>array_sum(\'数组\')</h2>';










echo '<hr>';
//数组函数 – 数组查找替换
//array_key_exists('下标字符串' ,'数组');
// - 判断数组中是否包含传入下标字符串，存在返回true，否则false

echo '<h2>array_key_exists(\'下标字符串\' ,\'数组\')</h2>';










echo '<hr>';
echo '<h2></h2>';










echo '<hr>';
echo '<h2></h2>';










echo '<hr>';
echo '<h2></h2>';












//作业----------------------------------------------------------------------------------------------------------------------------
$info = array();
$class = array();
$user = array();
$string="一班:小马,女,25岁.老王,男,28岁.老李,女,33岁;二班:老宋,男,30岁.老徐,男,45岁";
$arr=explode(';',$string);//得到2个字符串在一个数组里面
for ($i=0;$i<count($arr);$i++)
{
    $class[$i]= explode(':',$arr[$i])[0];
    $info[$i]=explode(':',$arr[$i])[1];
}
for ($i=0;$i<count($info);$i++)
{
    $user[$i]= explode('.',$info[$i]);
}
for ($i=0;$i<count($user);$i++)
{
    for ($j=0;$j<count($user[$i]);$j++)
    {
        $detail[$i][$j]['姓名']  =explode(',',$user[$i][$j])[0];
        $detail[$i][$j]['性别']  =explode(',',$user[$i][$j])[1];
        $detail[$i][$j]['年龄']  =explode(',',$user[$i][$j])[2];
    }
}

for ($i=0;$i<count($arr);$i++)
{
    $news[$class[$i]]=$detail[$i];
}
var_dump($news);



echo '------------------------';
$str = '一班:小马,女,25岁.老王,男,28岁.老李,女,33岁;二班:老宋,男,30岁.老徐,男,45岁;';

function getArr($str)
{
    $str = rtrim($str , ';' );
    $result = array();
    $class = explode(';' , $str);
    foreach ($class as $classKey => $classValue)
    {
        $classArr = explode(':' , $classValue);
        $result[$classArr[0]] = $classArr[1];
        foreach ($result as $cls => $users)
        {
            $users = exp('.' , $users);
            $result[$classArr[0]][] = $users;
        }
    }
    return $class;
}
var_dump(getArr($str));
?>

















<div style="height:500px"></div>
