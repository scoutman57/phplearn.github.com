<?php
header("Content-Type:text/html;charset=utf-8");

for ($j2 = 1 ; $j2 <= 5; $j2++)
{//---------------------------------------------------------------------------------------------------

    $url = 'http://www.budejie.com/pic/';
    $url .= $j2;
//    var_dump($url);
//    die;

    $file = 'html/' . md5($url) . '.log';

    if (!file_exists($file))
    {
        $urlContent = file_get_contents($url);
        file_put_contents($file, $urlContent);
    }

    $content = file_get_contents($file);

    $check = '/data-original=\"(.*?)" title=\"(.*?)\"/';

    preg_match_all($check, $content, $match);

    $count = count($match['0']);

    date_default_timezone_set('PRC');
    $date = date('Y-m-d H-i-s');

    $con = mysqli_connect('localhost', 'root', '') or die('数据库连接失败!');
    $url = $match['1'];
    $title = $match['2'];


    mysqli_query($con, 'set names utf8');


    mysqli_select_db($con, 'db_php');

    for ($i = 0, $j = 1; $i < $count; $i++, $j++)
    {
        $sql = "insert into images0905 VALUES (null , '$title[$i]' , '$url[$i]' , '$date' , 1)";
        echo mysqli_query($con , $sql) ? '图片'.$j.': '.$title[$i].' <br>写入成功<br><br>' : '图片'.$j.': '.$title[$i].'<br>写入失败<br><br>';
    }


//图片表
//id            自增id
//title         图片标题
//url           图片地址
//pass_time     添加时间
//status        状态//值 只有 0/1


}//-------------------------------------------------------------------------------------------------------------------

//die;





?>























