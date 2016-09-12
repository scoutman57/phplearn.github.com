<?php
header("Content-Type:text/html;charset=utf-8");




$appid = "wx5a11e641945cb23f";
$appsecret = "74f23c900d601b496b5fd6c001379f01 ";
$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";

$output = https_request($url);
$jsoninfo = json_decode($output, true);

$access_token = $jsoninfo["access_token"];
var_dump($access_token);

$jsonmenu = ' {
     "button":[
     {	
          "type":"click",
          "name":"今日歌曲",
          "key":"V1001_TODAY_MUSIC"
      },
      {
           "name":"菜单",
           "sub_button":[
           {	
               "type":"view",
               "name":"搜索",
               "url":"http://www.soso.com/"
            },
            {
               "type":"view",
               "name":"视频",
               "url":"http://v.qq.com/"
            },
            {
               "type":"click",
               "name":"赞一下我们",
               "key":"V1001_GOOD"
            }]
       }]
 }';


$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
$result = https_request($url, $jsonmenu);
var_dump($result);

function https_request($url,$data = null){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}
////模拟发送post请求(使用curl)
////1. 创建curl句柄
//$ch = curl_init();
////2.设置curl
//curl_setopt($ch , CURLOPT_URL , $url);
////捕获内容但是不输出
//curl_setopt($ch , CURLOPT_RETURNTRANSFER , 1);
////模拟发送post请求
//curl_setopt($ch , CURLOPT_POST , 1);
////发送相关数据
//$data = '{
//     "button":[
//     {
//          "type":"click",
//          "name":"今日歌曲",
//          "key":"V1001_TODAY_MUSIC"
//      },
//      {
//           "name":"菜单",
//           "sub_button":[
//           {
//               "type":"view",
//               "name":"搜索",
//               "url":"http://www.soso.com/"
//            },
//            {
//               "type":"view",
//               "name":"视频",
//               "url":"http://v.qq.com/"
//            },
//            {
//               "type":"click",
//               "name":"赞一下我们",
//               "key":"V1001_GOOD"
//            }]
//       }]
// }';
////发送post请求是传递数据
//curl_setopt($ch , CURLOPT_POSTFIELDS , $data);
//
////禁止服务器端校验ssl
//curl_setopt($ch , CURLOPT_SSL_VERIFYHOST , false);
//curl_setopt($ch , CURLOPT_SSL_VERIFYPEER , false);
//
////3.执行curl
//$output = curl_exec($ch);
//if ($output === false)
//    echo curl_error($ch);
//else
//    echo $output;
//
////4.关闭curl
//curl_close($ch);

?>



