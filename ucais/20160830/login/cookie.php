<title>cookie</title>
<?php
header("Content-Type:text/html;charset=utf-8");

//向cookie里面多设置一个字段,来判断是否是登录状态

//isLogined = 1 则用户是登录过得,否则没有登陆过
//$_COOKIE['isLogined'] = '';
//var_dump($_COOKIE);
if (!(isset($_COOKIE['isLogined']) && $_COOKIE['isLogined']))
{
    echo '尚未登录,请前去登录';
    echo '
    <script>
        setTimeout("location=\'login.php\'" , 3000);
    </script>';
}

?>
