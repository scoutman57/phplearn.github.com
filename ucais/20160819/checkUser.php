<?php
header("Content-Type:text/html;charset=utf-8");
$userName = $_POST['userName'];
$phone = $_POST['phone'];
$password = $_POST['password'];

echo check($userName , $phone , $password);
function check($userName , $phone , $password)
{
    $a = checkNull($userName , $phone , $password);
    if ($a != '')
        return $a;
    $p = checkPhone($phone);
    if ($p != '')
        return $p;
    $password2 = md5($password);
    $userInfo = $userName.'|'.$phone.'|'.$password2."\r\n";
    file_put_contents('./user.txt' , $userInfo  , FILE_APPEND);
    return '注册成功!!!<br>您的用户名为:'.$userName.'<br>您注册的手机号为:'.$phone;
}

function checkNull($userName , $phone , $password)
{
    if ($userName === '')
        return '用户名为空!!!<br>注册失败!!!<br>';
    if ($phone === '')
        return '手机号为空!!!<br>注册失败!!!<br>';
    if ($password === '')
        return '密码为空!!!<br>注册失败!!!<br>';
    if (strlen($phone) != 11)
        return '手机号必须为11位数字!!!<br>注册失败!!!<br>';
    if (strlen($password) < 6 || strlen($password) > 18)
        return '密码必须为6到18位字符!!!<br>注册失败!!!<br>';
}

function checkPhone($phone)
{
    $arr = str_split($phone);
    $float = floatval($phone);
    if (strlen($float) != strlen($phone) || in_array('.' , $arr))
        return '手机号必须为11位数字!!!<br>注册失败!!!<br>';
    $str = file_get_contents('./user.txt');
    $arr2 = explode('|' , $str);
    if ($str != '')
        if (in_array($phone, $arr2))
            return '手机号已注册!!!<br>注册失败!!!<br>';
}

//function checkSame($phone , $password)
//{
//    $data = file('./user.txt');
//    foreach ($data as $user)
//    {
//        $userInfo = explode('|', $user);
//        if ($phone == $userInfo[1] && $userInfo[2] == md5($password))
//            return true;
//    }
//    return false;
//}
?>
