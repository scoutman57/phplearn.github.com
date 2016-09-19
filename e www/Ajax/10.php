<?php
header("Content-Type:text/html;charset=utf-8");
//设置header头
header("Cache-Control:no-cache");//禁止缓存
header("Pragma:no_cache");//禁止缓存
header("Expires:-1");//禁止缓存

$fp = fopen('10.txt' , 'a');//追加方式打开02.txt文件，没有的话会自动创建
fwrite($fp , 'java');//为文件写内容
fclose($fp);//关闭文件
?>

