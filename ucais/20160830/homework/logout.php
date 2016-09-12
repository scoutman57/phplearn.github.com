<?php
header("Content-Type:text/html;charset=utf-8");

session_start();
$_SESSION = array();
$_SESSION['userInfo']['username'] = '';
$_SESSION['admin']['id'] = '';

session_destroy();
echo '已退出　3秒后返回登录页面';
echo '
    <script>
        setTimeout("location=\'login.php\'" , 3000);
    </script>';

?>
