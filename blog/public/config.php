<?php
header("Content-Type:text/html;charset=utf-8");

date_default_timezone_set('PRC'); //设置时区

//mysql  连接
define('HOST' , 'localhost');
define('MYSQL_USER' , 'root');
define('MYSQL_PASSWORD' , '');
define('MYSQL_DATABASE' , 'blog');

define('PAGE_NUM' , '5');
define('PAGE_OFFSET' , '5');


?>

