<title>login登录页</title>
<?php
header("Content-Type:text/html;charset=utf-8");

?>
<form action="loginAction.php" method="post">
    用户名:<input type="text" name="username" autocomplete="off"><br><br>
    密　码:<input type="password" name="password" autocomplete="off">
    <input type="submit" name="sub" value="登录">
</form>