<?php
header("Content-Type:text/html;charset=utf-8");

//$username = 'xiaoming';
//
//file_put_contents('./user.log' , $username);


//设置 cookie , 可以通过头函数,通过响应头给客户端设置cookie,过期时间必须为未来时间
//setcookie('username' , '小明' , strtotime('+1 day'));
//setcookie('gender' , '男' , strtotime('+1 day'));

//$userInfo = array(
//    'username' => 'small ming',
//    'gender' => '1',
//    'phonr' => 'phone'
//);

setcookie('userInfo["username"]' , 'small ming' , strtotime('+1 day'));
setcookie('userInfo["gender"]' , '1' , strtotime('+1 day'));
setcookie('userInfo["phone"]' , '12345678901' , strtotime('+1 day'));

//销毁cookie,可以设置时间为过去时间
//setcookie('username' , '' , time() - 3600);
//setcookie('gender' , '' , time() - 3600);

print_r($_COOKIE);

?>

<a href="04.php">跳转</a>
