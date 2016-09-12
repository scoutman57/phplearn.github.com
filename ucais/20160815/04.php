<?php
header("Content-Type:text/html;charset=utf-8");
echo md5('mypassabcde');

?>
<form action="login.php" method="post">
<p><input type="text" name="username"></p>
<p><input type="password" name="password"></p>
<p><input type="submit" name="sub" value="登录"></p>

</form>