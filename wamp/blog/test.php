<?php
header("Content-Type:text/html;charset=utf-8");

include_once 'public/func.php';
//var_dump(end(explode('.' , '15.jpg')));


//include 'public/func.php';
//$sql = 'select * from article where aid = 2';
//$res = DB($sql);
//$content = $res[0]['article_content'];
////var_dump($res);
////var_dump('./admin/article/articles/uploads/'.$content);
//$a = file_get_contents('./admin/article/articles/uploads/'.$content);
////var_dump($content , $a);
//$content = htmlspecialchars_decode($a);
//echo $content;
//$sql = "select * from cate where cate_name = '文章分类'";
//$cid = DB($sql)[0]['cid'];
//function tree($pid = 0)
//{
//  $arr = array();
//  $data = DB('select cid , cate_name from cate where pid = ' . $pid . '&& status=1');
//  foreach ($data as $cate)
//  {
//    $cate['son'] = tree($cate['cid']);
//    $arr[] = $cate;
//  }
//  return $arr;
//}
//
//echo '<pre>';
//$array = tree($cid);
//print_r($array);
//$count = count($array);
//for ($i = 0 ; $i < $count ; $i++)
//{
//  echo "<a href=''>{$array[$i]['cate_name']}</a>";
//  if (isset($array[$i]['son']['cid']))
//  {
//    $arraySon = $array[$i]['son'];
//    $countSon = count($arraySon);
//    echo "<ul class=\"nav-menu\">";
//    for ($i = 0 ; $i < $count ; $i++)
//    {
//      echo "<li><a href=\"#\">{$arraySon[$i]['cate_name']}</a></li>";
//    }
//    echo "</ul>";
//  }
//}
//$sql = 'select * from player where status = 1';
//$sql = "select * from tags where status = 1";
//$sql = "select * from tags where status = 1";
//
//var_dump(DB($sql));
//$tagsList = DB($sql);
//$strtemp = '';
//$countTagsList = count($tagsList);
//for ($i = 0 ; $i < $countTagsList ; $i++)
//{
//  $strtemp .= $tagsList[$i]['tid'].',';
//}
//$strtemp = rtrim($strtemp , ',');
//$sql = "Select count(aid) as count , tid from article_tags where tid in({$strtemp}) group by tid";
//var_dump($strtemp , $sql , DB($sql));


//$sql = "select cid from cate where cate_name='神技能'";
//$cid = DB($sql)[0]['cid'];
//$sql = "select * from article where cid != {$cid} && status=1 ORDER BY last_time DESC";
//$arrayArticle = DB($sql);
//$countArrayArticle = count($arrayArticle);
//if ($countArrayArticle > 10)
//{
//  $countArrayArticle = 10;
//}
//for ($i = 0 ; $i < $countArrayArticle ; $i++)
//{
//
//}
//$sql = "select * from article where cid ={$cid} && status = 1 ORDER BY click_count DESC , last_time DESC";
//$arrayArticle = DB($sql);
//$countArrayArticle = count($arrayArticle);

//$sql = "select * from article_tags where aid = 2";
//$sql = "select * from tags where tid = 1";
//$sql = "select * from cate where pid = 17";
//$sonArray = DB($sql);
//$cidStr = '';
//for ($i = 0 ; $i < count($sonArray) ; $i++)
//{
//  $cidStr .= $sonArray[$i]['cid'].',';
//}
//$cidStr = $cidStr.'17';
//var_dump($sonArray , $cidStr);
//
//$sql = "select * from article where cid  IN (21)";
//var_dump(DB($sql));


//$subject  =  "一言不合就学习,优秀PHP文章整理" ;
//$res = substr($subject);
//$res = substr(strrchr($subject , 'php'));
$sql = "select * from comment where Pcommentid=1";
var_dump(DB($sql));
?>

<!--<script>-->
<!--  location='index.php'-->
<!--</script>-->
