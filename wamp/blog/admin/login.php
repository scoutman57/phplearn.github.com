<?php
header("Content-Type:text/html;charset=utf-8");


?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>管理员登录</title>
  <link rel="stylesheet" href="../css/administrators_login.css">
  <script src="../js/jquery3.1.0.js"></script>
</head>
<body>

<form action="loginAction.php" method="post">
  <label>管理员账号: <input type="text" id="lab1" name="username"></label><br><br>
  <label>管理员密码: <input type="password" name="password"></label><br><br>
  <button>登 录</button>
</form>

</body>
</html>