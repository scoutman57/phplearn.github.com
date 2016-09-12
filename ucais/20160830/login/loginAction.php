<title>action</title>
<?php
header("Content-Type:text/html;charset=utf-8");

//查询数据库里面是否有用户


setcookie('user[username]' , $_POST['username'] , strtotime('+1 day'));
setcookie('user[password]' , $_POST['password'] , strtotime('+1 day'));
setcookie('isLogined' , '1' , strtotime('+1 day'));

echo '登陆成功,即将跳转到首页';
echo '
<script>
    setTimeout("location=\'index.php\'" , 3000)
</script>
';

?>
