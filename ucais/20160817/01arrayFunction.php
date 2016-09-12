<?php
header("Content-Type:text/html;charset=utf-8");

//数组函数 – 数组查找替换
//array_sum('数组');
// - 数组元素值的和
// - 当数组元素值不是数值的时候，便不会相加
echo '<h2>array_sum(\'数组\')</h2>';
$arr = range(1 , 10);
$arr[0] = 50.5;
$arr[1] = 'abc';
$arr[2] = '3';
$arr[3] = array(1,2,3);//array_sum只能计算以为数组值
$sum = array_sum($arr);
var_dump($arr , $sum);

$a  = array( 2 ,  4 ,  6 ,  8 );
echo  "sum(a) = "  .  array_sum ( $a ) .  "\n" ;//20

$b  = array( "a"  =>  1.2 ,  "b"  =>  2.3 ,  "c"  =>  3.4 );
echo  "sum(b) = "  .  array_sum ( $b ) .  "\n" ;//6.9











echo '<hr>';
//数组函数 – 数组查找替换------------------------------------------------------
//array_key_exists('下标字符串' ,'数组');
// - 判断数组中是否包含传入下标字符串，存在返回true，否则false
echo '<h2>array_key_exists(\'下标字符串\' ,\'数组\')</h2>';

$arr = array('a' => 'apple' , 'b' => 'banana' , 'c' => 'cao');

if (array_key_exists('c' , $arr))
{
    var_dump($arr['c']);
}
else
{
    var_dump('c不在数组中');
}

$search_array  = array( 'first'  =>  null ,  'second'  =>  4 );

// returns false
isset( $search_array [ 'first' ]);

// returns true
array_key_exists ( 'first' ,  $search_array );








echo '<hr>';
//数组函数 – 数组指针操作
//reset();		重置指针
//prev();		上移一次指针
//next();		下移一次指针
//end();		指针移动到最后
//key();		返回当前指针所在元素的键
//current();	返回当前指针所在元素的值
next($arr);//b  下移一次指针
next($arr);//c  下移一次指针
prev($arr);//b  上移一次指针
end($arr);//c   指针移动到最后
echo key($arr).'======================>'.current($arr);


$transport  = array( 'foot' ,  'bike' ,  'car' ,  'plane' );
$mode  =  current ( $transport );  // $mode = 'foot';
$mode  =  next ( $transport );     // $mode = 'bike';
$mode  =  next ( $transport );     // $mode = 'car';
$mode  =  prev ( $transport );     // $mode = 'bike';
$mode  =  end ( $transport );      // $mode = 'plane';











echo '<hr>';


//数组函数 – 数组指针操作
//array_shift(‘原始数组’);
// - 删除第一个元素，并返回其值
echo '<h2>array_shift(‘原始数组’)</h2>';

$arr = range('a' , 'e');
$arr1 = range('A' , 'E');
$arr = array_combine($arr , $arr1);

var_dump($arr);

$return = array_shift($arr);//下标索引为0,1,2...时会重置

var_dump($arr , $return);

$stack  = array( "orange" ,  "banana" ,  "apple" ,  "raspberry" );
$fruit  =  array_shift ( $stack );
print_r ( $stack );








echo '<hr>';
//数组函数 – 数组指针操作
//array_unshift('数组' ,'插入的元素值1','插入的元素值2'.... );
// - 插入的数组的新元素的下标为索引，如果数组中已经有存在的索引下标
//- 则原数组里面下标会沿着追加元素的下标增长
//- 返回值是插入后的数组元素个数

echo '<h2>array_unshift(\'数组\' ,\'插入的元素值1\',\'插入的元素值2\'.... )</h2>';

$arr = array(1,2,3);
$arr2 = array_unshift($arr , array('a' , 'b') , 5);//返回的数插入之后的数组中元素个数
var_dump($arr , $arr2);

$arr = array('a' => 'apple' , 'b' => 'banana' , 'c' => 'cao');
var_dump($arr);
$return = array_unshift($arr , 'aaa' , 'bbb');
var_dump($arr , $return);

$queue  = array( "orange" ,  "banana" );
array_unshift ( $queue ,  "apple" ,  "raspberry" );
var_dump ( $queue );









echo '<hr>';
//数组函数 – 数组指针操作
//array_push('数组','追加元素1'....);
// - 在数组后面压入（追加）元素
//- 返回追加完成后的数组元素总数

echo '<h2>array_push(\'数组\',\'追加元素1\'....)</h2>';

$arr = array('a' => 'apple' , 'b' => 'banana' , 'c' => 'cao');
var_dump($arr);
$arr1 = array_push($arr , 'sssssssssss');
var_dump($arr , $arr1);
echo '------------------------------------';
$arr = array('a' => 'apple' , 'b' => 'banana' , 'c' => 'cao');
var_dump($arr);
$arr1 = array_push($arr , array('fuck' , 'shit'));
var_dump($arr , $arr1);

$stack  = array( "orange" ,  "banana" );
array_push ( $stack ,  "apple" ,  "raspberry" );
var_dump ( $stack );









echo '<hr>';
//array_pop('数组');
//- 删除数组的最后一个元素
//- 返回被删除的元素

echo '<h2>array_pop(\'数组\')</h2>';

$arr = array('a' => 'apple' , 'b' => 'banana' , 'c' => 'cao');
var_dump($arr);
$arr2 = array_pop($arr);
var_dump($arr2 , $arr);
echo '------------------------------------';
$arr = array('a' => 'apple' , 'b' => 'banana' , 'c' => array('doubi' , 'max'));
var_dump($arr);
$arr2 = array_pop($arr);
var_dump($arr2 , $arr);

$stack  = array( "orange" ,  "banana" ,  "apple" ,  "raspberry" );
$fruit  =  array_pop ( $stack );
var_dump ( $stack );








echo '<hr>';
//数组函数 – 数组键值操作
//shuffle(’原始数组');
// - 打乱数组元素顺序
// - 返回打乱顺序的数组

echo '<h2>shuffle(’原始数组\')</h2>';

$arr = array('a' => 'apple' , 'b' => 'banana' , 'c' => 'cao');
var_dump($arr);
$arr2 = shuffle($arr);
var_dump($arr2 , $arr);
echo '------------------------------------';
$arr = array('a' => 'apple' , 'b' => 'banana' , 'c' => array('doubi' , 'max'));
var_dump($arr);
$arr2 = shuffle($arr);//下标被重置为索引,不保留原始下标
var_dump($arr2 , $arr);

$numbers  =  range ( 1 ,  20 );
shuffle ( $numbers );
foreach ( $numbers  as  $number ) {
    echo  " $number  " ;
}








echo '<hr>';
//array_flip('数组')
//- 使数组的键值反转并返回
//- 返回反转后的数组

echo '<h2>array_flip(\'数组\')</h2>';

$arr = array('a' => 'apple' , 'b' => 'banana' , 'c' => 'cao');
var_dump($arr);
$arr2 = array_flip($arr);
var_dump($arr2 , $arr);
echo '------------------------------------';

$trans  = array( "a"  =>  1 ,  "b"  =>  1 ,  "c"  =>  2 );
$trans  =  array_flip ( $trans );
//array (size=2)
//  1 => string 'b' (length=1)
//  2 => string 'c' (length=1)
var_dump ( $trans );//键值相同的后面的会覆盖前面的











echo '<hr>';
//数组函数 – 数组键值操作
//array_keys('数组');
// - 使数组中所有的键组成一个数组并返回
// - 返回一个由传入数组键组成的数组

echo '<h2>array_keys(\'数组\')</h2>';

$arr = array('a' => 'apple' , 'b' => 'banana' , 'c' => 'cao');
var_dump($arr);
$arr2 = array_keys($arr);
var_dump($arr , $arr2);

echo '------------------------------------';

$arr = array('a' => 'apple' , 'b' => 'banana' , 'c' => array('d' => '*' , '+'));
var_dump($arr);
$arr2 = array_keys($arr);
var_dump($arr , $arr2);

echo '------------------------------------';

$array  = array( 0  =>  100 ,  "color"  =>  "red" );
var_dump ( array_keys ( $array ));

$array  = array( "blue" ,  "red" ,  "green" ,  "blue" ,  "blue" );
var_dump ( array_keys ( $array ,  "blue" ));//返回存在的所有下标

$array  = array( "color"  => array( "blue" ,  "red" ,  "green" ),
    "size"   => array( "small" ,  "medium" ,  "large" ));
var_dump ( array_keys ( $array ));










echo '<hr>';
//array_values('数组');
//- 使传入数组所有值组成一个数组并返回
//- 返回一个由传入数组值组成的数组

echo '<h2>array_values(\'数组\')</h2>';

$arr = array('a' => 'apple' , 'b' => 'banana' , 'c' => 'cao');
var_dump($arr);
$arr2 = array_values($arr);
var_dump($arr , $arr2);

echo '------------------------------------';

$arr = array('a' => 'apple' , 'b' => 'banana' , 'c' => array('d' => '*' , '+'));
var_dump($arr);
$arr2 = array_values($arr);
var_dump($arr , $arr2);










echo '<hr>';
//array_reverse('数组');
//- 返回一个元素顺序倒置的数组，键值对应不变

echo '<h2>array_reverse(\'数组\')</h2>';

$arr = array('a' => 'apple' , 'b' => 'banana' , 'c' => 'cao');
var_dump($arr);
$arr2 = array_reverse($arr);
var_dump($arr , $arr2);

echo '------------------------------------';

$arr = array('5' => 'apple' , '6' => 'banana' , '7' => array('d' => '*' , '+'));
var_dump($arr);
$arr2 = array_reverse($arr);
var_dump($arr , $arr2);//值针对一位数组  下标为默认(0,1,2,3...)的时候不会变5,6,7会重置为0,1,2,3..











echo '<hr>';
//array_count_values('数组');
//- 返回一个数组，其元素的键名是原数组的值，键值是该值在原数组中出现的次数

echo '<h2>array_count_values(\'数组\')</h2>';

$array  = array( 1 ,  "hello" ,  1 ,  "world" ,  "hello" );
$arr2 = array_count_values($array);
var_dump ($arr2);









echo '<hr>';
//array_rand('数组','选取个数');
//- 从数组随机选取N个元素的键
//- 返回包含随机键名的数组
//- 不添加第二个参数，默认取一个

echo '<h2>array_rand(\'数组\',\'选取个数\')</h2>';
$arr1 = range('a' , 'z');
$arr2 = range('A' , 'Z');
$arr3 = range('0' , '9');

$arr = array_merge($arr1 , $arr2 , $arr3);
var_dump($arr);
shuffle($arr);
$arr = array_flip($arr);
$key = array_rand($arr , 6);
echo implode($key);
var_dump($key);

echo '-----------------------------';
$input  = array( "Neo" ,  "Morpheus" ,  "Trinity" ,  "Cypher" ,  "Tank" );
$rand_keys  =  array_rand ( $input ,  2 );
echo  $input [ $rand_keys [ 0 ]] .  "\n" ;
echo  $input [ $rand_keys [ 1 ]] .  "\n" ;









echo '<hr>';
//数组函数 – 数组键值操作
//array_unique('数组');
// - 删除数组重复值
// - 返回一个删除重复值后的数组
// - 有重复值时，只保留第一个值，后面的重复值会被删除

echo '<h2>array_unique(\'数组\')</h2>';

$input  = array( "a"  =>  "green" ,  "red" ,  "b"  =>  "green" ,  "blue" ,  "red" );
$result  =  array_unique ( $input );
var_dump ( $result );

echo '------------------------------';

$input  = array( 4 ,  "4" ,  "3" ,  4 ,  3 ,  "3" );
$result  =  array_unique ( $input );
//array (size=2)
//  0 => int 4
//  2 => string '3' (length=1)
var_dump ( $result );//类型不一样也会被删掉












echo '<hr>';
//数组函数 – 数组排序
//sort('数组' , '排序类型');
// - 按照值升序排序数组，不保留下标
//
//rsort('数组','排序类型');
// - 按照数组降序排序数组，不保留下标
//
//asort('数组','排序类型');
// - 使数组升序排序，保留下标
//
//arsort('数组','排序类型');
// - 使数组降序排序，保留下标

echo '<h2>值排序</h2>';
$arr = array('a' => 'f' , 'c' => 'd' , 'd' => 'a' , 'b' => 'c');
var_dump($arr);
sort($arr);
var_dump($arr);

rsort($arr);
var_dump($arr);

$arr = array('a' => 'f' , 'c' => 'd' , 'd' => 'a' , 'b' => 'c');

asort($arr);
var_dump($arr);

arsort($arr);
var_dump($arr);











echo '<hr>';
//数组函数 – 数组排序
//ksort('数组','排序类型');
// - 使数组按照键升序排序，保留下标
//
//krsort('数组','排序类型');
// - 使数组按照键降序排序，保留下标

echo '<h2>下标排序</h2>';

$arr = array('b' => 'banana' , 'c' => 'cao' , 'a' => 'apple');
var_dump($arr);
ksort($arr);
var_dump($arr);

echo '------------------------------';

$arr = array('b' => 'banana' , 'c' => 'cao' , 'a' => 'apple');
var_dump($arr);
krsort($arr);
var_dump($arr);

















echo '练习';
echo '<h3>练习题:有一个数组里面有很多元素,按照数组中相同元素出现的次数,倒序排序</h3>';
$arr = array('apple' , 'apple' , 'apple' , 'ucais' , 'ucais' , 'baidu' , 'baidu' , 'baidu' , 'baidu');
var_dump($arr);
daoXu($arr);
function daoXu($arr)
{
    $arr = array_count_values($arr);
    arsort($arr);
    foreach ($arr as $k => $v)
    {
        for ($i = 0 ; $i < $v ; $i++)
            $arr[] = $k;
        unset($arr[$k]);
    }
    var_dump($arr);
}

//方法2
$arr = array('apple' , 'apple' , 'apple' , 'ucais' , 'ucais' , 'baidu' , 'baidu' , 'baidu' , 'baidu');
function getArr($arr)
{
    $newArr = array_count_values($arr);
    arsort($newArr);
    $res = array();
    foreach ($newArr as $k => $v)
    {
        for ($i = 0 ; $i < $v ; $i++)
        {
            $res[] = $k;
        }
    }
    return $res;
}
var_dump(getArr($arr));
?>
























<div style="height:500px"></div>