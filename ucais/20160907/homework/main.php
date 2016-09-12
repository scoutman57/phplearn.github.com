<?php
header("Content-Type:text/html;charset=utf-8");

$post = $_POST;

echo '您的账号是: '.$post['account'].'<br>您的密码是: '.$post['password'].'<br>您的手机号是: '.$post['phone'].'<br>您的邮箱是: '.$post['email']
?>
