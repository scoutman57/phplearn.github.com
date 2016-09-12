
<?php
header("Content-Type:text/html;charset=utf-8");


session_start();


$_SESSION['userInfo'] = $_POST;
$array = $_SESSION['userInfo'];
if (!count($array) == 0)
    db2($array);

function db2($array)
{
    $con = mysqli_connect('localhost', 'root', '', 'db_php');
    if (mysqli_connect_errno($con))
        die('错误信息:' . mysqli_connect_error($con));
    mysqli_query($con, 'set names utf8');
    $sql = "select * from admin WHERE username = '$array[username]'";
    $res = mysqli_query($con, $sql);
    $sql = strtolower($sql);
    $rows = array();
    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $rows[] = $row;
    }

    if (count($rows) == 0)
    {
        echo '账号错误!';
        echo '<br><a href="login.php">重新登录</a>';
        die;
    }
    if ($array['username'] == $rows[0]['username'] && md5($array['password']) != $rows[0]['password'])
    {
        echo '密码错误';
        echo '<br><a href="login.php">重新登录</a>';
        die;
    }
    if ($array['username'] == $rows[0]['username'] && md5($array['password']) == $rows[0]['password'])
    {
        date_default_timezone_set('PRC');
        $_SESSION['admin'] = $rows[0];
        $last_time = date('Y-m-d H:i:s');
        $con = mysqli_connect('localhost', 'root', '', 'db_php');
        if (mysqli_connect_errno($con))
            die('错误信息:' . mysqli_connect_error($con));
        mysqli_query($con, 'set names utf8');
        $id = $rows[0]["id"];
        $sql = "update admin set last_time = '$last_time' WHERE id = $id";
        $res = mysqli_query($con, $sql);
        echo '登陆成功';
//        sleep(2);
        echo '
    <script>
        setTimeout("location=\'index.php\'" , 3000);
    </script>';

    }
}
echo '<html>
<head>
    <title>登录</title>
</head>
<body>
<div id="one">
<form action="" method="post" id="form1">
    账号: <input type="text" name="username">
    密码: <input type="password" name="password">
    <input type="submit" name="sub">
</form>
</div>

</body>
</html>';
?>
<!--<html>-->
<!--<head>-->
<!--    <title>登录</title>-->
<!--</head>-->
<!--<body>-->
<!--<div id="one">-->
<!--<form action="" method="post" id="form1">-->
<!--    账号: <input type="text" name="username">-->
<!--    密码: <input type="password" name="password">-->
<!--    <input type="submit" name="sub">-->
<!--</form>-->
<!--</div>-->
<!---->
<!--</body>-->
<!--</html>-->