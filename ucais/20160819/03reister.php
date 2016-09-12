<?php
header("Content-Type:text/html;charset=utf-8");


?>


<html>
<head>
    <title>注册</title>
</head>
<body>
<form action="02checkUserInfo.php" method="post">
    <p>用户名: <input type="text" name="username"></p>
    <p>手机号: <input type="text" name="phone"></p>
    <p>密　码: <input type="password" name="password"></p>
    <p><input type="submit" value="注 册"></p>
</form>
</body>
</html>