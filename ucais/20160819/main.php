<?php
header("Content-Type:text/html;charset=utf-8");
$phone = $_POST['phone'];
$password = $_POST['password'];

echo checkSame($phone , $password);

function checkSame($phone , $password)
{
    $data = file('./user.txt');
    $pass = md5($password)."\r\n";
    foreach ($data as $user)
    {
        $userInfo = explode('|', $user);
        if ($phone == $userInfo[1] && $userInfo[2] == $pass)
            return  '登陆成功!!!<br>您的手机号为:'.$phone.'<br>您的用户名是:'.$userInfo[0];
    }
    return '登录失败!!!<br>';
}

?>
