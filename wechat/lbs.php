<?php
header("Content-Type:text/html;charset=utf-8");



//定义接口请求地址

$url = "http://api.map.baidu.com/telematics/v3/reverseGeocoding?location=116.3017193083,40.050743859593&coord_type=gcj02&ak=5t9nvsyxzl5ADzvng2ZgpIn27nn2IWsE";

//模拟http中的get请求

$str = file_get_contents($url);
//$str2->load($url);

echo $str.'<hr>';

$p = xml_parser_create();
xml_parse_into_struct($p,$str,$arr1,$arr2);
for ($i = 0 ; ; $i++)
{
    foreach ($arr1[$i] as $k => $v)
    {
        if ($v == 'DESCRIPTION' || $v == 'description')
        {
            $desc = $arr1[$i]['value'];
            break(2);
        }
    }
}
echo $desc;
?>



