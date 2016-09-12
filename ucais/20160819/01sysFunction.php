<?php
header("Content-Type:text/html;charset=utf-8");

echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------
//文件函数
//basename('路径');
// - 返回路径中的文件名部分

echo '<h2>返回路径中的文件名部分:basename(\'路径\')</h2>';

$path = 'D:/www/ucais';
echo basename($path).'<br>';//获取路径文件名(最后一部分)


echo  "1) " . basename ( "/etc/sudoers.d" ,  ".d" ). PHP_EOL ;
echo  "2) " . basename ( "/etc/passwd" ). PHP_EOL ;
echo  "3) " . basename ( "/etc/" ). PHP_EOL ;
echo  "4) " . basename ( "." ). PHP_EOL ;
echo  "5) " . basename ( "/" );









echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------
//dirname('路径');
//- 返回路径中的目录部分
//- 返回 path 的父目录。 如果在 path 中没有斜线，则返回一个点（'.'），表示当前目录

echo '<h2>返回路径中的目录部分:dirname(\'路径\')</h2>';
echo dirname($path).'<br>';//获取路径中的路径部分(最后一部分之前的路径)


echo  "1) "  .  dirname ( "/etc/passwd" ) .  PHP_EOL ;  // 1) /etc
echo  "2) "  .  dirname ( "/etc/" ) .  PHP_EOL ;  // 2) / (or \ on Windows)
echo  "3) "  .  dirname ( "." );  // 3) .






echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------
//文件函数
//copy('源文件地址' , '目标地址');
// - 将文件复制到目标地址
// - 如果目标地址存在该文件,则会覆盖该文件
//- 执行成功则返回 true 否则 返回false

echo '<h2>将文件复制到目标地址:copy(\'源文件地址\' , \'目标地址\')</h2>';

//var_dump(copy('D:/1/s.txt' , 'D:/2/2.php'));







echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------
//rename('源文件地址' , '目标地址');
//- 将文件剪切到指定地址并重命名
//- 成功返回true

echo '<h2>将文件剪切到指定地址并重命名:rename(\'源文件地址\' , \'目标地址\')</h2>';

//var_dump(rename('D:/1/s.txt' , 'D:/2/2.php'));







echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------
//文件函数
//unlink('文件路径');
// - 删除文件
// - 成功返回true ,失败 false

echo '<h2>删除文件:unlink(\'文件路径\')</h2>';

//var_dump(unlink('D:/2/1.php'));
$p = 'D:/2/1.php';
if (file_exists($p))
    unlink($p);
else
//    fopen('D:/2/1.php' , 'w');







echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------
//mkdir('目录路径' , '权限');
//- 创建目录
//创建成功返回true

echo '<h2>创建目录:mkdir(\'目录路径\' , \'权限\')</h2>';
$p = 'D:/newFloder';

if (file_exists($p))
    rmdir($p);//删除目录
else
    mkdir($p , 0777);//0777最大权限,默认的








echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------
//rmdir('目录路径');
//- 删除目录
//删除成功返回true


echo '<h2></h2>';
$p2 = 'D:/newtest';

if (file_exists($p2))
    rmdir($p2);//删除目录
else
    mkdir($p2 , 0777);//0777最大权限,默认的








echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------
//文件函数
//file_put_contents('目标文件' , '数据' [ ,'是否追加' ]);
// - 把数据写到目标文件中
// - 数据可以是字符串和一维数组
// - 返回写入到文件内数据的字节数，失败时返回FALSE
//- 第三个设置为FILE_APPEND可以实现追加写入

echo '<h2>把数据写到目标文件中:file_put_contents(\'目标文件\' , \'数据\' [ ,\'是否追加\' ])</h2>';

$str = "敢不敢不垫砖头\n";
//file_put_contents('./1.txt' , $str  , FILE_APPEND);








echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------
//file_get_contents('目标文件或者URL' , '是否在include_path中搜索');
//- 把整个文件读入一个字符串中
//- 如果想在include_path中搜索,第二个参数可以设置为1
//- 在php.ini 里面查看和修改include_path参数

echo '<h2>把整个文件读入一个字符串中:file_get_contents(\'目标文件或者URL\' , \'是否在include_path中搜索\')</h2>';

$get = file_get_contents('./1.txt');
var_dump($get);
$file = file('./1.txt');
echo '<br>--------------------------------------------';
var_dump($file);
echo '<br>--------------------------------------------';
//$url = 'http://www.ucai.cn';
//$get = file_get_contents($url);
//var_dump($get);
//print_r($get);
//$file = file($url);
//print_r($file);







echo '<hr>';
//---------------------------------------------------------------------------------------------------------------------------------
//文件函数
//file('目标文件或URL');
// - 把整个文件读入一个数组中
// - 每一行为一个元素
// -
//注意:大家可以自行了解 fopen() , fread() , fwrite() , fclose(), 等读取写入函数

echo '<h2>把整个文件读入一个数组中:file(\'目标文件或URL\')</h2>';
//$url = 'http://www.baidu.com';
//$file = file($url);
//var_dump($file);
//print_r($file);










//-------------------------------------------------------
















echo '<hr>';
echo '练习<br>';

//$path = 'D:/www/ucais';
//$p = 'D:/2';
//$a = 'D:/www/ucais/20160819/1.txt';
//echo basename($a).'<br>';
//echo dirname($a).'<br>';
////fopen('D:/www/ucais/20160819/1.txt' , 'w');
//if (!file_exists('D:/www/ucais/txt'))
//    mkdir('D:/www/ucais/txt' , 0777);
//if (file_exists('D:/www/ucais/20160819/1.txt'))
//    copy('D:/www/ucais/20160819/1.txt' , 'D:/www/ucais/txt/1.txt');
//if (file_exists('D:/www/ucais/20160819/1.txt'))
//    rename('D:/www/ucais/20160819/1.txt' , 'D:/www/ucais/txt/2.txt');
//if (file_exists('D:/www/ucais/txt/2.txt'))
//    unlink('D:/www/ucais/txt/2.txt');
//if (file_exists('D:/www/ucais/txt/1.txt'))
//    unlink('D:/www/ucais/txt/1.txt');
//if (file_exists('D:/www/ucais/txt'))
//    rmdir('D:/www/ucais/txt');//只能删除空文件夹




echo '<hr>练习<br>';
echo '<h3>模拟用户注册</h3>';

?>
<form action="checkUser.php" method="post">
    <p>用户名: <input type="text" name="userName"></p>
    <p>手机号: <input type="text" name="phone"></p>
    <p>密 码 : <input type="password" name="password"></p>
    <p><input type="submit" value="注 册"></p>
</form>













<div style="height:500px"></div>
