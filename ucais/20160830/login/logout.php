<title>logout退出</title>
<?php
header("Content-Type:text/html;charset=utf-8");

$username = $_COOKIE['user']['username'];

//销毁cookie 使其过期
setcookie('user[username]' , '' , time() - 3600);
setcookie('user[password]' , '' , time() - 3600);
setcookie('isLogined' , '' , time() - 36000);

echo '再见'.$username;

echo '<br>即将跳转到登录页面<br>
<script>
    setTimeout("location=\'login.php\'" , 3000)
</script>
';
?>
