<?php
header("Content-Type:text/html;charset=utf-8");

//var_dump(end(explode('.' , '15.jpg')));


include 'public/func.php';
$sql = 'select * from article where aid = 2';
$res = DB($sql);
$content = $res[0]['article_content'];
//var_dump($res);
//var_dump('./admin/article/articles/uploads/'.$content);
$a = file_get_contents('./admin/article/articles/uploads/'.$content);
//var_dump($content , $a);
$content = htmlspecialchars_decode($a);
echo $content;
?>


