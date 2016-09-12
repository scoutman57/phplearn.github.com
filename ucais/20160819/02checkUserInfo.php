<?php
header("Content-Type:text/html;charset=utf-8");

define('PATH' , './data.log');
function checkUserName($username)
{
    return strlen($username) != 0;
}

function checkPhone($phone)
{
    if (!is_numeric($phone) || strlen($phone) != 11 || substr_count($phone , '.') != 0)
        return 1;
    if (!file_exists(PATH))
        file_put_contents(PATH , '');//放进空字符串相当于创建一个文件
    $data = file('./data.log');
    $bool = true;
    foreach ($data as $user)
    {
        $userInfo = explode('|', $user);
        if ($phone == $userInfo[1])
        {
            $bool = false;
            break;
        }
    }
    return $bool?0:2;
    //1 数据不符合标准
    //2 手机号被注册
}

function checkPassword($password)
{
    $len = strlen($password);
//    if ($len >= 6 && $len <=18)
//        return md5($password);
//    else
//        return false;
    return ($len >= 6 && $len <=18) ? md5($password) : false;
}

function saveUserInfo($usename , $password , $phone)
{
    $data = $usename.'|'.$phone.'|'.$password."\r\n";
    file_put_contents(PATH , $data , FILE_APPEND);
    echo '用户名:' . $usename .'<br>';
    echo '手机号:' . $phone .'<br>';
    echo '密　码:' . $password .'<br>';
    return $data.'<br>';
}

function reister()
{
    $post = $_POST;
    $username = $post['username'];
    if (!$post)
        header('location:03reister.php');
    if (!checkUserName($post['username']))
        return '用户名不能为空';
    switch (checkPhone($post['phone']))
    {
        case 1:
            return '请输入正确的手机号';
        break;
        case 2:
            return '手机号已经被注册';
            break;
    }
    $pass = checkPassword($post['password']);
    if (!$pass)
        return '请输入6到18位密码';
    if (saveUserInfo($post['username'] , $pass , $post['phone']))
        return '注册成功<br>';
    else
        return '注册失败<br>';
}

echo reister();

?>