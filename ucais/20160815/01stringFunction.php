<?php
header("Content-Type:text/html;charset=utf-8");


//重写substr-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	echo '<h2>重写substr</h2>';
// 1. 起始位置为0时截取整个字符串

// 2. 起始位置为正数时,表示从设置位置开始截取
// 3. 起始位置为负数时,表示从右侧开始截取,右侧第一位为-1
// 4. 截取长度为正数时,表示截取几位,为0时,则为空
// 5. 截取长度为负数时,表示终止位置
// 6. 当截取长度大于字符串剩余总长度是,则返回直到末尾所有字符
// 7. 挡截取长度为负数时,终止位置比起始位置还靠前是,则返回空  

function mysubstr($str , $start , $len = 0)
{
	$arr = str_split($str);
	$s = '';
	$count = count($arr);

	if ($start < 0)
		$start = $count + $start > 0 ? $count + $start : 0;

	if ($len > 0)
		$len = $start + $len < $count ? $start + $len : $count;
	else
		$len = $count + $len;

	for ($i = $start ; $i < $len ; $i++)
	{
		$s .= $arr[$i]; 
	}
	return $s;
}


echo mysubstr($str = '1234567890' , -5 , -3);











//猴王--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	echo '<h2>猴王</h2>';

echo '<hr>';
function getMonkeyKing($m , $n)
{
	$arr = range(1 , $n);
	
	$i = 0;
	while(count($arr) > 1)
	{
		if(($i + 1) % $m == 0)
		{
			unset($arr[$i]);
		}
		else
		{
			array_push($arr, $arr[$i]);
			unset($arr[$i]);
		}
		$i++;
	}
	return $arr[$i];
}

echo getMonkeyKing(10 , 5);



echo "<hr>";
function yuesefu($n,$m) 
{ 
	$r=0; 
	for($i=2; $i<=$n; $i++)  
		$r=($r+$m)%$i; 
	return $r+1; 
} 
echo '第'.yuesefu(5,10).'只猴子成为猴王';










echo '<hr>';
//字符串查找 替换-----------------------------------------------------------------------------------------------------------------------------------------------------------------

// str_replace('查找的内容', '替换的内容', '原始字符串', ['替换次数'])区分大小写

echo '<h2>字符串查找 替换</h2><br>';

$str = '1234567890,1234567890,1234567890';
echo $str.'<br>';

$str2 = str_replace(5, 'x', $str);
echo $str2.'<br>';

echo '<hr>';
$find = array('3' , '6' , '9');//9变为空
$replace = array('y' , 'z');
$str3 = str_replace($find, $replace, $str);
echo $str3;

echo '<br>';

$str  =  str_replace ( "ll" ,  "" ,  "good golly miss molly!" ,  $count );
echo  $count ;
// str_ireplace(search, replace, subject)不区分大小写



echo '<hr>';
// 赋值: <body text='red'>
$color = '<body text="black">';
$bodytag  =  str_replace ( "black" ,  "green" ,  $color );
echo $bodytag;



echo '<hr>';
// 赋值: Hll Wrld f PHP
 $vowels  = array( "a" ,  "e" ,  "i" ,  "o" ,  "u" ,  "A" ,  "E" ,  "I" ,  "O" ,  "U" );
 $onlyconsonants  =  str_replace ( $vowels ,  "" ,  "Hello World of PHP" );
 echo $onlyconsonants;














 //-substr_count----------------------------------------------------------------------------------------------------------------------------------------------------------------
 // substr_count('原始字符串', '要搜索的字符串', ['开始位置', '查找长度['终止位置']')
 //不指定后两个参数的时候,则表示在所有的字符中查找
 //如果指定,则表示在范围内查找
 echo '<hr>';
 echo '<h2>ubstr_count</h2><br>';

 $str = '1234567890,1234567890,1234567890';

 echo substr_count($str, '0').'<br>';
 echo substr_count($str, '0', 10).'<br>';
 echo substr_count($str, '0', 10, 20 ).'<br>';



 echo '<hr>';
 // strstr('原始字符串', '被查找的内容', [,boolean查找方向])
 // - 查找字符串的首次出现,区分大小写
 // - 返回字符串的一部分或者 FALSE (如果找不到)
 // - bool 默认为false , 为true时则返回查找位置之前的位置
 // - 如果想区分大小写请使用 stristr()
 // - 如果不指定第三个参数,则表示返回包括首次出现位置直到字符串结尾的所有字符

 $str = '1234567890,1234567890,1234567890';
 echo strstr($str , '5').'<br>';//567890,1234567890,1234567890
 echo '<hr>'; 
 echo strstr($str , '5' , true).'<br>';//1234


 $email   =  'name@example.com' ;
 $domain  =  strstr ( $email ,  '@' );
 echo  $domain .'<br>';  // 打印 @example.com

 $user  =  strstr ( $email ,  '@' ,  true );  // 从 PHP 5.3.0 起
 echo  $user .'<br>';  // 打印 name













 //strpos-----------------------------------------------------------------------------------------------------------------------------------------------------------------

 // int strpos (string 被查找字符串 ,  string 要搜索的字符串 [ , int 查找的开始位置 ] )
 // - 查找字符串首次出现的数字位置,区分大小写
 // - 返回起始位置
 // - 如果要不区分大小写可以使用 stripos()

 echo '<hr>';
 echo '<h2>strpos</h2><br>';


 $str = '1234567890,1234567890,1234567890';
 echo strpos($str, ',', 10).'<br>';//10

$mystring  =  'abc' ;
 $findme    =  'a' ;
 $pos  =  strpos ( $mystring ,  $findme );

 // 注意这里使用的是 ===。简单的 == 不能像我们期待的那样工作，
// 因为 'a' 是第 0 位置上的（第一个）字符。
 if ( $pos  ===  false ) {
    echo  "这个 ' $findme ' 没有找到在' $mystring '" .'<br>';
} else {
    echo  "这个 ' $findme ' 找到了在' $mystring '" .'<br>';
    echo  " 并且位置为  $pos " .'<br>';
}











 //字符串统计-----------------------------------------------------------------------------------------------------------------------------------------------------------------
// 字符串函数 – 字符串统计
// int strlen (string 字符串 )
//  - 统计字符串长度
//  - 返回字符串长度
 // - utf-8中一个汉字=3个字符

 echo '<hr>';
 echo '<h2>strlen</h2><br>';

$str  =  'abcdef' ;
echo  strlen ( $str ).'<br>';  // 6

 $str  =  ' ab cd ' ;
echo  strlen ( $str ).'<br>';  // 7











 //md5-----------------------------------------------------------------------------------------------------------------------------------------------------------------
// string md5 (string 字符串 [ , bool true])
//  - 对字符串进行MD5方式加密
//  - 以 32 字符十六进制数字形式返回散列值
//  - 如果bool 为true 则返回16位二进制散列


 echo '<hr>';
 echo '<h2>md5加密</h2><br>';

 $password = 'mypass123456';
 echo md5($password).'<br>';

 //加盐



 $str  =  'apple' ;

if ( md5 ( $str ) ===  '1f3870be274f6c49b3e31a0c6728957f' ) {
    echo  "苹果" .'<br>';
}












//练习1
echo '<hr>';
$str = 'abcde12345abcd12345';
$arr = str_split($str);
$arr2 =array();
foreach ($arr as $k => $v)
	$arr2[$v] = 0;
foreach ($arr as $k => $v)
	$arr2[$v] += 1;
foreach ($arr2 as $k => $v)
	if ($arr2[$k] == 1)
		echo $k.'<br>';





echo '<hr>';
$arr = str_split($str);
for ($i = 0 ; $i < count($arr) ; $i++)
{
	if (substr_count($str, $arr[$i]) == 1)
		echo $arr[$i].'<br>';
}











//练习2
echo '<hr>';
$count = 0;
$str = '一班:小马,女,25岁,老王,男,28岁;二班:老宋,男,30岁,老徐,男,45岁;';
$time = substr_count($str, ':');
$arrbei = array('一班','二班',';',':');
$arrti = array('','', ',' ,'');
$str = str_replace($arrbei, $arrti, $str);
$array = explode(',', $str);
$arr1 = array();
$arr2 = array();
$arr3 = array();
$arr4 = array();
for ($i = 0 ; $i < 3 ; $i++)
{
	if ($i == 0)
		$arr1['姓名'] = $array[$i];
	if ($i == 1)
		$arr1['性别'] = $array[$i];
	if ($i == 2)
		$arr1['年龄'] = $array[$i];
}
for ($i = 3 ; $i < 6 ; $i++)
{
	if ($i == 3)
		$arr2['姓名'] = $array[$i];
	if ($i == 4)
		$arr2['性别'] = $array[$i];
	if ($i == 5)
		$arr2['年龄'] = $array[$i];
}
for ($i = 6 ; $i < 9 ; $i++)
{
	if ($i == 6)
		$arr3['姓名'] = $array[$i];
	if ($i == 7)
		$arr3['性别'] = $array[$i];
	if ($i == 8)
		$arr3['年龄'] = $array[$i];
}
for ($i = 9 ; $i < 12 ; $i++)
{
	if ($i == 9)
		$arr4['姓名'] = $array[$i];
	if ($i == 10)
		$arr4['性别'] = $array[$i];
	if ($i == 11)
		$arr4['年龄'] = $array[$i];
}
$array = array('一班' => array($arr1,$arr2),'二班' => array($arr3,$arr4));
var_dump($array);



echo '<hr>';
$str = '123456789';
echo chunk_split($str , 3);



$info = array();
$class = array();
$user = array();
$string="一班:小马,女,25岁.老王,男,28岁.老李,女,33岁;二班:老宋,男,30岁.老徐,男,45岁";
$arr=explode(';',$string);//得到2个字符串在一个数组里面
for ($i=0;$i<count($arr);$i++){
	$class[$i]= explode(':',$arr[$i])[0];
	$info[$i]=explode(':',$arr[$i])[1];
}

for ($i=0;$i<count($info);$i++){
	$user[$i]= explode('.',$info[$i]);
}

for ($i=0;$i<count($user);$i++){
	for ($j=0;$j<count($user[$i]);$j++){
		$detail[$i][$j]['姓名']  =explode(',',$user[$i][$j])[0];
		$detail[$i][$j]['性别']  =explode(',',$user[$i][$j])[1];
		$detail[$i][$j]['年龄']  =explode(',',$user[$i][$j])[2];
	}

}

for ($i=0;$i<count($arr);$i++){
	$news[$class[$i]]=$detail[$i];
}
var_dump($news);
echo '------------------------';
$str = '一班:小马,女,25岁.老王,男,28岁.老李,女,33岁;二班:老宋,男,30岁.老徐,男,45岁;';

function getArr($str)
{
	$arr = explode(';' , rtrim($str , ';'));
	$result = array();
	foreach ($arr as $class)
	{
		$a = explode(':' , $class);
		$result[$a[0]] = $a[1];
	}
	foreach ($result as $c => $users)
	{
		$user = explode('.' , $users);
		$result[$c] = array();
		foreach ($user as $u)
		{
			$res = array();
			$b = explode(',' , $u);
			$res['姓名'] = $b[0];
			$res['性别'] = $b[1];
			$res['年龄'] = $b[2];
			$result[$c][] = $res;
		}
	}
	return $result;
}
var_dump(getArr($str));








echo '<hr>';

//公鸡3元每只,母鸡5元每只,小鸡1元3只,一百元买一百只鸡,请求出公鸡,母鸡,小鸡的数目
for ($j = 0; $j <=34 ;$j++)
{
	for ($i = 0; $i <=20 ;$i++)	
	{
		for ($k = 0; $k <=100 ;$k += 3)
		{
			if (3*$j+5*$i+$k/3==100 && $j+$i+$k==100)
				echo '公鸡'.$j.'只'.'母鸡'.$i.'只'.'小鸡'.$k.'只<br>';
		}
	}
}













echo '<hr>';
//程序设计,猜不中的大奖, 比如有一个边长为n的n的平方宫格,矩形排列.然后用户在选中号码的时候,大奖只能随机出现在所猜号码的隔壁位置



// 比如输入3生成下面的9宫格

// 	1    2    3

// 	4    5    6

// 	7    8    9 
$int = 3;
$gg = 3;
$array = array();
$arr = range(1 ,$gg * $gg);
// var_dump($arr);
foreach ($arr as $k => $v)
{
	echo $arr[$k].'&nbsp;&nbsp';
	if (($k + 1) % $gg == 0)
		echo '<br>';
}
if ($int > $gg*$gg)
{
	echo '生成的n*n宫格不够';
}
else {
	if ($int <= $gg) {
		if ($int > 1 && $int < $gg) {
			$array[] = $arr[$int - 2];//2
			$array[] = $arr[$int];//4
			$array[] = $arr[$int + $gg-1];//7
		} elseif ($int == 1) {
			$array[] = $arr[$int];//2
			$array[] = $arr[$int + $gg-1];//5
		} else {
			$array[] = $arr[$int - 2];//3
			$array[] = $arr[$int + $gg-1];//8
		}
	} elseif ($int >= ($gg * $gg - 3)) {
		if ($int > ($gg * $gg - 3) && $int < $gg * $gg) {
			$array[] = $arr[$int - 2];//13
			$array[] = $arr[$int];//15
			$array[] = $arr[$int - $gg-1];//10
		} elseif ($int == ($gg * $gg - $gg-1)) {
			$array[] = $arr[$int];//14
			$array[] = $arr[$int - $gg-1];//9
		} else {
			$array[] = $arr[$int - 2];//15
			$array[] = $arr[$int - $gg-1];//12
		}
	} else {
		if ($int % $gg == 1) {
			$array[] = $arr[$int - $gg-1];//1
			$array[] = $arr[$int];//6
			$array[] = $arr[$int + $gg-1];//7
		} elseif ($int % $gg == 0) {
			$array[] = $arr[$int - 2];//7
			$array[] = $arr[$int - $gg-1];//4
			$array[] = $arr[$int + $gg-1];//12
		} else {
			$array[] = $arr[$int - 2];//6
			$array[] = $arr[$int - $gg-1];//3
			$array[] = $arr[$int + $gg-1];//11
			$array[] = $arr[$int];//8
		}
	}
}
var_dump($array);//用户选中号码周围的数组成的数组
$num = rand(0,count($array)-1);//在数组中随机选一个
echo '你输入的号是:'.$int.'<br>中奖号码是:'.$array[$num];

echo '----------------------------------------------------------';

function getBigJiang($num , $n)
{
	$fang = $n * $n;
	if ($num > $fang || $num < 1)
		return '请选择正确的数字';
	for ($i = 1 ; $i <= $fang ; $i++)
	{
		if ($i == $num)
		{
			if ($i % $n == 1)
			{
				$arr[] = $i +1;
			}
			elseif ($i % $n ==0)
			{
				$arr[] = $i - 1;
			}
			else
			{
				$arr[] = $i + 1;
				$arr[] = $i - 1;
			}
			if ($i + $n <= $fang)
				$arr[] = $i + $n;
			if ($i - $n > 0)
				$arr[] = $i - $n;
			return $arr[array_rand($arr)];
		}
	}
}
echo getBigJiang(6,5);
?>


<div style="height:500px"></div>























