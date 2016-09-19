<?php
header("Content-Type:text/html;charset=utf-8");


//日期函数---------------------------------------------------------------------------------------------------------------------------------
//date_default_timezone_set(‘时区标识符’)
// - 设定用于一个脚本中所有日期时间函数的默认时区
echo '<h2>设置时区:date_default_timezone_set(‘时区标识符’)</h2>';

date_default_timezone_set('PRC');//设置默认时区
//中国有 Asia/Shanghai  Asia/Chongqing  PRC

echo date('Y-m-d H:i:s');










echo '<hr>';
//日期函数---------------------------------------------------------------------------------------------------------------------------------
//time()
//- 返回当前的 Unix 时间戳
//时间戳
//- 自从 Unix 纪元（格林威治时间 1970 年 1 月 1 日 00:00:00）到当前时间的秒数
echo '<h2>时间戳:time()</h2>';

echo time();








echo '<hr>';
//日期函数---------------------------------------------------------------------------------------------------------------------------------
//microtime(bool)
//- 返回当前 Unix 时间戳和微秒数
//- 1微秒是百万分之一秒
//- bool 为 true 时将返回一个浮点数//可以不加true

echo '<h2>返回当前 Unix 时间戳和微秒数:microtime(bool)</h2>';

echo microtime(true);
$strat = microtime(true);







echo '<hr>';
//usleep(微秒数);---------------------------------------------------------------------------------------------------------------------------------
//- 以指定的微秒数延迟执行

echo '<h2>延迟执行时间:usleep(微秒数)</h2>';

//usleep(1000000);//延迟执行1秒
usleep(100000);

echo microtime(true) - $strat;









echo '<hr>';

//日期函数---------------------------------------------------------------------------------------------------------------------------------
//localtime([时间戳 [, bool ]])
// - 取得本地时间
// - bool 如果设为 FALSE 或未提供则返回的是普通的数字索引数组
//- bool 如果设为 TRUE 返回包含有所有从 C 的 localtime 函数调用所返回的不同单元的关联数组
echo '<h2>本地时间:localtime([时间戳 [, bool ]])</h2>';
$local = localtime(time());
var_dump($local);

$local = localtime(time() , true);
var_dump($local);
//localtime 关联数组的不同下标表示
//tm_sec 	- 秒数， 0 到 59
//tm_min 	- 分钟数， 0 到 59
//tm_hour 	- 小时， 0 到 23
//tm_mday 	- 月份中的第几日， 1 到 31
//tm_mon 	- 年份中的第几个月， 0 (Jan) 到 11 (Dec)
//tm_year 	- 年份，从 1900 开始
//tm_wday 	- 星期中的第几天， 0 (Sun) 到 6 (Sat)
//tm_yday 	- 一年中的第几天， 0 到 365
//tm_isdst 	- 夏令时当前是否生效？ 如果是生效的是正数， 0 代表未生效，负		   数代表未知











echo '<hr>';

//日期函数---------------------------------------------------------------------------------------------------------------------------------
//date(‘日期格式’);
// - 格式化一个本地时间／日期
//- 返回格式化后的日期时间的字符串表达
//
//注意:日期格式请参见手册
echo '<h2>日期格式:date(‘日期格式’)</h2>';

echo date('j' );//格式化时间为字符串,










echo '<hr>';

//日期函数---------------------------------------------------------------------------------------------------------------------------------
//strtotime(‘日期字符串’);
// - 将任何英文文本的日期时间描述解析为 Unix 时间戳
//- 成功则返回时间戳，否则返回 FALSE
    echo '<h2>将任何英文文本的日期时间描述解析为 Unix 时间戳:strtotime(‘日期字符串’);
</h2>';

	echo strtotime("2016-08-11 10:00:00").'<br>';
    echo strtotime("2016-08-11").'<br>';
    echo strtotime("10 September 2000").'<br>';
    echo strtotime("+1 day").'<br>';
    echo strtotime("+1 week").'<br>';
    echo strtotime("+1 week 2 days 4 hours 2 seconds").'<br>';
    echo strtotime("next Thursday").'<br>';
    echo strtotime("last Monday").'<br>';












echo '<hr>';

//数学函数---------------------------------------------------------------------------------------------------------------------------------
//max(数组或者多个值);
// - 返回数组或者多个值之间的最大值
echo '<h2>返回数组或者多个值之间的最大值:max(数组或者多个值)</h2>';

$arr = range(1, 9);
echo max($arr).'<br>';
echo max(15,66,99,2,99);











echo '<hr>';

//min(数组或者多个值);---------------------------------------------------------------------------------------------------------------------------------
//-  返回数组或者多个值之间的最小值

echo '<h2>返回数组或者多个值之间的最小值:min(数组或者多个值)</h2>';

$arr = range(1, 9);
echo min($arr).'<br>';
echo min(15,66,99,2,99);







echo '<hr>';
//pow( 数值 , 指数);---------------------------------------------------------------------------------------------------------------------------------
//- 返回数值的指数次方的幂。如果可能，本函数会返回 integer

echo '<h2>返回数值的指数次方的幂:pow( 数值 , 指数)</h2>';
echo pow(2 , 10);//1024







echo '<hr>';
//sqrt(要处理的数);---------------------------------------------------------------------------------------------------------------------------------
//- 返回平方根,负数时返回 NAN


echo '<h2>返回平方根:sqrt(要处理的数)</h2>';
echo sqrt(9);//1024
echo '<br>'.sqrt(-4);//NAN
echo '<br>'.sqrt(16);//1024










echo '<hr>';
//数学函数---------------------------------------------------------------------------------------------------------------------------------
//round( 原数值 , 精度 );
// - 对浮点数进行四舍五入,如果精度是负数,则表示向左执行精度位再进行四舍五入

echo '<h2>对浮点数进行四舍五入:round( 原数值 , 精度 )</h2>';

echo round(1.23456789  , 7).'<br>';

echo round(768  , -1).'<br>';//770
echo round(764  , -1).'<br>';//760








echo '<hr>';
//rand( 最小值 , 最大值 );---------------------------------------------------------------------------------------------------------------------------------
//- 返回一个最小值和最大值之间的随机数
//- 如果不指定参数,则随机返回数值

echo '<h2>返回一个最小值和最大值之间的随机数:rand( 最小值 , 最大值 )</h2>';
echo rand(1 , 99)/100;










echo '<hr>';
//目录函数---------------------------------------------------------------------------------------------------------------------------------
//DIRECTORY_SEPARATOR
//- 常量,目录分隔符 , 为了兼容 windows 和 Linux
// windows /  \
// linux   /

echo '<h2>常量,目录分隔符:DIRECTORY_SEPARATOR</h2>';

echo DIRECTORY_SEPARATOR;//\  目录分隔符,可以自动识别系统








echo '<hr>';
//PATH_SEPARATOR---------------------------------------------------------------------------------------------------------------------------------
//- include多个路径使用，在windows下，当你要include多个路径的话，你要用”;”隔开，但在linux下就使用”:”隔开的

echo '<h2>include多个路径使用:PATH_SEPARATOR</h2>';










echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------
//目录函数
//getcwd();
// - 获取当前目录

echo '<h2>获取当前目录:getcwd()</h2>';
echo getcwd();










echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------
//opendir( 路径 );
//- 打开目录句柄 , 失败返回 false

echo '<h2>打开目录句柄:opendir( 路径 )</h2>';

$path = getcwd();
var_dump(opendir($path));









echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------
//readdir();
//- 返回目录句柄中的条目,失败返回 false

echo '<h2>返回目录句柄中的条目:readdir()</h2>';
$path = 'D:\www\ucais';
$handle = opendir($path);
//echo readdir().'<br>';//从目录句柄中读取条目,目录清两条 . .. ,如果超过条目以后会直接返回false
//echo readdir().'<br>';
//echo readdir().'<br>';
//echo readdir().'<br>';
//echo readdir().'<br>';
//echo readdir().'<br>';
//echo readdir().'<br>';
//echo readdir().'<br>';

while (($file = readdir($handle)) !== false)
{
    echo $file . '<br>';
}








echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------
//scandir();
//- 列出指定路径中的文件和目录

echo '<h2>列出指定路径中的文件和目录:scandir()</h2>';
$mulu = scandir($path);//以数组形式返回目录中所有条目,直接传路径就行
var_dump($mulu);










echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------
//目录函数
//is_dir();
// - 如果文件名存在，并且是个目录，返回 TRUE，否则返回FALSE
//判断给定文件名是否是一个目录

echo '<h2>判断给定文件名是否是一个目录:is_dir()</h2>';
foreach ($mulu as $file)
{
    if (is_dir($path.'/'.$file))//传入路径,判断路径是否是文件夹
        echo '文件夹'.$file.'<br>';
    else
        echo $file.'<br>';
}









echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------
//closedir();
//- 关闭目录句柄

echo '<h2>关闭目录句柄:closedir()</h2>';
closedir($handle);//关闭目录句柄,释放文件































echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------


echo '练习<br>';
$str = '1454947200';
$num = intval($str);
var_dump($str , strlen($num));
if (strlen($str) == 10 && strlen($num) == 10)
    localTimes($str);
else
    echo '请输入正确时间<br>';

function localTimes($a)
{
    $local = localtime($a, true);
    $year = $local['tm_year'] + 1900;
    $mon = $local['tm_mon'] + 1;
    $senson = senson($mon);     //获得季节
    $wd = wday($local);         //获得星期几
    echo '当前是 ' . $year . '年 ' . $mon . '月' . $local['tm_mday'] . '日 ' . $senson .' '. $wd . ' ' . $local['tm_hour'] . '时' . $local['tm_min'] . '分';
}


function senson($mon)   //判断季节的函数
{
    if ($mon >= 3 && $mon <= 5)
        $senson = '春季';
    elseif ($mon >= 6 && $mon <= 8)
        $senson = '夏季';
    elseif ($mon >= 9 && $mon <= 11)
        $senson = '秋季';
    else
        $senson = '冬季';
    return $senson; //返回季节
}

function wday($local)   //判断星期几的函数
{
    switch ($local['tm_wday'])
    {
        case '1':
            $wd = '星期一';
            break;
        case '2':
            $wd = '星期二';
            break;
        case '3':
            $wd = '星期三';
            break;
        case '4':
            $wd = '星期四';
            break;
        case '5':
            $wd = '星期五';
            break;
        case '6':
            $wd = '星期六';
            break;
        default:
            $wd = '星期天';
            break;
    }
    return $wd; //返回星期几
}


//$str = '石头';
$arr = array('石头' , '剪刀' , '布');
$sttime = 0;
$jdtime = 0;
$btime = 0;
$youWin = 0;
$IWin = 0;
$ping = 0;
$array = array(0,0,0,0,0,0);
for ($i = 0 ; $i < 100 ; $i++)
{
    foreach ($arr as $k => $v)
    {
        $array = getWin($v,$sttime,$jdtime,$btime,$youWin,$IWin,$ping);
        $sttime = $array['0'];
        $jdtime = $array['1'];
        $btime = $array['2'];
        $youWin = $array['3'];
        $IWin = $array['4'];
        $ping = $array['5'];
    }
}

echo '<br>你出剪刀'.$jdtime.'次<br>'.'你出石头'.$sttime.'次<br>'.'你出布'.$btime.'次<br>';
echo '你赢了'.$youWin.'次'.'我赢了'.$IWin.'次'.'打平了'.$ping.'次<br>';
$a = $youWin/($jdtime + $sttime + $btime);
echo '你的胜率为:'.$a;

function getWin($str,$sttime,$jdtime,$btime,$youWin,$IWin,$ping)
{
    $a = rand(1 , 3);
    if ($str === '石头')
    {
        $sttime++;
//        echo '<hr>你出的石头<br>';
        if ($a == 1)
        {
//            echo '我出的剪刀<br>你赢了';
            $youWin++;
        }
        elseif ($a == 2)
        {
//            echo '我出的石头<br>打平了';
            $ping++;
        }
        else
        {
//            echo '我出的布<br>我赢了';
            $IWin++;
        }
    }
    //-----------------
    if ($str === '剪刀')
    {
        $jdtime++;
//        echo '<hr>你出的剪刀<br>';
        if ($a == 1)
        {
//            echo '我出的布<br>你赢了';
            $youWin++;
        }
        elseif ($a == 2)
        {
//            echo '我出的剪刀<br>打平了';
            $ping++;
        }
        else
        {
//            echo '我出的石头<br>我赢了';
            $IWin++;
        }
    }
    //------------------
    if ($str === '布')
    {
        $btime++;
//        echo '<hr>你出的布<br>';
        if ($a == 1)
        {
//            echo '我出的石头<br>你赢了';
            $youWin++;
        }
        elseif ($a == 2)
        {
//            echo '我出的布<br>打平了';
            $ping++;
        }
        else
        {
//            echo '我出的剪刀<br>我赢了';
            $IWin++;
        }
    }
    $array['0'] = $sttime;
    $array['1'] = $jdtime;
    $array['2'] = $btime;
    $array['3'] = $youWin;
    $array['4'] = $IWin;
    $array['5'] = $ping;
    return $array;
}



function getSuccess($user = '' , $su = 30)
{
    $arr = array('石头' => '剪刀' , '剪刀' => '布' , '布' => '石头');
    $num = rand(1 , 100);
    if ($num <= $su)
    {
        return $arr[$user];
    }
    else
    {
        unset($arr[$user]);
        return $arr[array_rand($arr)];
    }
}
$j = 0;
$s = 0;
$b = 0;
for ($i = 0 ; $i < 100 ; $i++)
{
    switch (getSuccess('石头' , 30))
    {
        case '石头':
            $s++;
            break;
        case '剪刀':
            $j++;
            break;
        case '布':
            $b++;
            break;
    }
}
echo '<hr>剪刀'.$j.'石头'.$s.'布'.$b;





echo '<hr>';
//-----------------------------------------------------------------------
echo '作业2<br>';
$path='D:/www/ucais';
dg($path);
function dg($path)
{
    $file = scandir($path);
    array_splice($file , 0 , 2);
    foreach ($file as $k=>$v)
    {
        $lj = $path.'/'.$v;
        if (is_dir($lj))
        {
            echo '<br><font color="red" size="5px">'.$v.'</font>'.'<br>';
            dg($lj);
        }
        else
            echo $v.'<br>';
    }
}


echo '<hr>';
//--------------------------------------------------------------------------
echo '作业3<br>';
$path='D:/www/ucais';
$array = array();
//getCopy($path , $array);
function getCopy($path , $array)
{
    global $array;
    $file = scandir($path);
    array_splice($file , 0 , 2);
    foreach ($file as $k=>$v)
    {
        $lj = $path.'/'.$v;
        if (is_dir($lj))
            getCopy($lj , $array);
        else
            $array[] = $lj;
    }
}
date_default_timezone_set('PRC');
foreach ($array as $key => $value)
{
    $file = scandir('D:');
    if (!in_array('resouse' , $file))
    {
        mkdir('D:/resouse');
    }
    $file2 = scandir('D:/resouse');
    $hz = substr($value , strrpos($value , '.')+1);//获得后缀名
    if (!in_array($hz , $file2))
    {
        mkdir('D:/resouse/' . $hz);
    }
    $name = reNamezz();
    $L = 'D:resouse'.'/'.$hz.'.';
    copy($value , $L.'/'.$name.'.'.$hz);
    $date = date('Y-m-d H:i:s');
    $date = $date. ' ' . $value . ' 移动至: '.$L.'/'.$name.'.'.$hz."\r\n";
    file_put_contents('D:/resouse/move.log' , $date , FILE_APPEND);
}

function reNamezz()
{
    $array1 = range('a' , 'z');
    $array2 = range('A' , 'Z');
    $array3 = range('0' , '9');
    $arrayf = array_merge($array1 , $array2 , $array3);
    shuffle($arrayf);
    $arrayff = array_flip($arrayf);
    $name = array_rand($arrayff , rand(2 , 15));
    $name = implode($name);
    return $name;
}
?>



















<div style="height: 500px;"></div>