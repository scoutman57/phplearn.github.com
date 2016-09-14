<?php
header("Content-Type:text/html;charset=utf-8");

$fp = fopen('02.txt' , 'a');//追加方式打开02.txt文件，没有的话会自动创建
fwrite($fp , 'php20160914');//为文件写内容
fclose($fp);//关闭文件
?>

