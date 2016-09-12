<title>index首页</title>
<?php
header("Content-Type:text/html;charset=utf-8");


include 'cookie.php';

if (isset($_COOKIE['user']))
{
    echo '欢迎您:' . $_COOKIE['user']['username'];
    echo '<br><a href="logout.php">退出</a>';
}


?>