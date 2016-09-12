<?php
header("Content-Type:text/html;charset=utf-8");

$str = '双方的胳膊上的俺说的吧是不是发过吧http://www.baidu.com公司的风格18583638609随你的便水波蓝短http://www.ucai.com裤了世界是大法官是大法官都不http://static.test.com能阿双12345679801方各杜积分吧';

$check = '/\d{11}/'; //匹配11位数字

//preg_match('正则表达式','要匹配的字符串','匹配成功后返回的字符串')匹配一个,返回第一个符合条件的
//preg_match_all(,,)匹配所有符合条件的的,返回一个数组

$str = "thaa is is ad test for try 1234aa aa bbbb_
";
//$check = '/([a-z]{2}) \1/';
//$check = '/[a-z]+/';

//$str = 'fgn5发的鬼地方的个地的方64654gfnxfgdsgf510125199408254111gghjgfhj发光飞碟分割';
//$check = '/(\d{6})(\d{4})(\d{2})(\d{2})(\d{3})([0-9]|X)/';

//$str = '814241783@qq.comjrjdfgh';
//$check = '/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/';
$str = 'dfg123456789012sfgsfd';
$check = '/[1-9][0-9]{5,10}/';

if (preg_match_all($check , $str , $match))
{
    echo '匹配到了:';
    var_dump($match);
}
else
    echo '没有匹配到';




?>












