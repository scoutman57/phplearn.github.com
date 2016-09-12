<?php
header("Content-Type:text/html;charset=utf-8");

$url = 'http://www.budejie.com/pic/';

$str = file_get_contents($url);


$check = '/(<img src).{1,}(\n).{1,}(\n).{1,}(title).{1,}(>)/';
preg_match_all($check, $str, $all);
$all = $all['0'];
//var_dump($all);
echo '<hr>';
$allstr = implode($all);
//var_dump($allstr);
echo '<hr>';


$check = '/(src=").{1,}(")/';
preg_match_all($check, $allstr, $src);
$src = $src['0'];
foreach ($src as $k => $v)
{
    $v = substr($v , 5 , -1);
    $src[$k] = $v;
}
//var_dump($src);
echo '<hr>';

$check = '/(title=").{1,}(" )/';
preg_match_all($check, $allstr, $title);
$title = $title['0'];
foreach ($title as $k => $v)
{
    $v = substr($v , 7 , -2);
    $title[$k] = $v;
}
//var_dump($title);
echo '<hr>';

$check = '/(alt=").{1,}("\/)/';
preg_match_all($check, $allstr, $alt);
$alt = $alt['0'];
foreach ($alt as $k => $v)
{
    $v = substr($v , 5 , -2);
    $alt[$k] = $v;
}
//var_dump($alt);

$con = mysqli_connect('localhost' , 'root' , '') or die('数据库连接失败!');


mysqli_query($con , 'set names utf8');


mysqli_select_db($con , 'db_php');

$count = count($src);
for ($i = 0 ; $i < $count ; $i++)
{
    $src2 = $src[$i];
    $title2 = $title[$i];
    $alt2 = $alt[$i];
    $sql = "insert into images values(null , '$src2' , '$title2' , '$alt2')";
//    var_dump($sql);
    $res = mysqli_query($con , $sql);
    if ($res)
        echo '添加成功<br>';
    else
        echo '添加失败<br>';
}
?>
