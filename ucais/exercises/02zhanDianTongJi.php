<?php
header("Content-Type:text/html;charset=utf-8");

//站点统计--------------------------------------------------------------

//获取用户信息-----------------------------------------------------------
$ip = $_SERVER['REMOTE_ADDR'];

//写入文件(追加)----------------------------------------------------------
file_put_contents('recode.txt' , $ip . "\r\n" , FILE_APPEND);

//读取数据:以行为单位
$info = file('recode.txt');

//求出网站的总访问量
$visits = count($info);

//求出当前用户的访问次数(ip出现的次数)
$ip_visits = 0;
$unique_ips = array();
foreach ($info as $each_ip)
{
    //统计当前数组中拥有的独立ip数
    if (!in_array($each_ip , $unique_ips))
    {
        //将当前新的用户加入到独立ip数组中
        $unique_ips[] = $each_ip;
        //判断当前新加的ip($each_ip)是否是当前用户的ip
        if ($ip == trim($each_ip)) $user_visit = count($unique_ips);
    }
    //比较:从文件中读取的是一行:需要去除换行符才能比较
    if (trim($each_ip) == $ip) $ip_visits++;
}

//总共有多少用户访问过:便利当前所有的访问用户信息,另外使用一个数组保存:如果当前ip在数组中存在,那么不加入;最后统计新数组即可;
//统计$unique中的元素个数: 就是独立ip数: 总用户
$users = count($unique_ips);


//需求: 输出
echo "欢迎访问某某网站,你是第{$user_visit}个用户,当前网站一共有{$users}个用户, 当前网页一共被访问了{$visits}次,您当前是第{$ip_visits}次访问!";
?>










<title>站点统计</title>
































<?php
header("Content-Type:text/html;charset=utf-8");
$ip = $_SERVER['REMOTE_ADDR'];
file_put_contents('recode.txt' , $ip . "\r\n" , FILE_APPEND);
$info = file('recode.txt');
$visits = count($info);
$ip_visits = 0;
$unique_ips = array();
foreach ($info as $each_ip)
{
    if (!in_array($each_ip , $unique_ips))
    {
        $unique_ips[] = $each_ip;
        if ($ip == trim($each_ip)) $user_visit = count($unique_ips);
    }
    if (trim($each_ip) == $ip) $ip_visits++;
}
$users = count($unique_ips);
echo "欢迎访问某某网站,你是第{$user_visit}个用户,当前网站一共有{$users}个用户, 当前网页一共被访问了{$visits}次,您当前是第{$ip_visits}次访问!";
?>

















