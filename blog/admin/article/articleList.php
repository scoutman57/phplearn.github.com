<?php
header("Content-Type:text/html;charset=utf-8");


include '../../public/func.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../../css/admin/article/articleList.css">
  <script src="../../js/jquery3.1.0.js"></script>
  <title>Document</title>
</head>
<body>

<h1>内容列表</h1>
<h2>修改内容需谨慎!</h2>


<?php
$sql = 'select a.aid,a.cid,a.article_name,a.article_describe,a.article_content,a.article_author,a.click_count,a.ord,a.essence,a.top,a.status,a.last_time,c.cate_name from cate c , article a where a.cid = c.cid';
//$tags = DB($sql);
$tags = getPageList($sql);

if (!empty($tags))
{
  $tagcount = count($tags['data']);
//  var_dump($tags['data']);
//  die;
  echo <<<eof
	<table>
    <tr><th>AID</th><th>栏目名称</th><th>标题</th><th>作者</th><th>排序</th><th>点击量</th><th>是否置顶</th><th>是否加精</th><th>是否显示</th><th>跟新时间</th><th>操作</th></tr>
eof;
  $array = array();
  for ($i = 0 ; $i < $tagcount ; $i++)
  {
    $array = $tags['data'][$i];
    $show = $array['status'] ? '显示' : '不显示';
    $essence = $array['essence'] ? '是' : '否';//是否加精
    $top = $array['top'] ? '是' : '否';//是否加精
    echo "<tr><td>{$array['aid']}</td><td>{$array['cate_name']}</td><td>{$array['article_name']}</td><td>{$array['article_author']}</td><td>{$array['ord']}</td><td>{$array['click_count']}</td><td class='td{$array['top']}'>{$top}</td><td class='td{$array['essence']}'>{$essence}</td><td class='td{$array['status']}'>{$show}</td><td>{$array['last_time']}</td><td class='tdupdate'><a href='articleUpdate.php?aid={$array['aid']}'>修改</a></td></tr>";
  }
  echo '</table>';
//echo $tags['page'];
  echo "<div class='divpage'>
        {$tags['page']}
      </div>";
  
}
else
{
  $tags = DB($sql);
  $tagcount = count($tags);
  echo <<<eof
	<table>
    <tr><th>AID</th><th>栏目名称</th><th>标题</th><th>作者</th><th>排序</th><th>点击量</th><th>是否置顶</th><th>是否加精</th><th>是否显示</th><th>跟新时间</th><th>操作</th></tr>
eof;
  $array = array();
  for ($i = 0 ; $i < $tagcount ; $i++)
  {
    $array = $tags[$i];
    $show = $array['status'] ? '显示' : '不显示';
    $essence = $array['essence'] ? '是' : '否';//是否加精
    $top = $array['top'] ? '是' : '否';//是否加精
    echo "<tr><td>{$array['aid']}</td><td>{$array['cate_name']}</td><td>{$array['article_name']}</td><td>{$array['article_author']}</td><td>{$array['ord']}</td><td>{$array['click_count']}</td><td class='td{$array['top']}'>{$top}</td><td class='td{$array['essence']}'>{$essence}</td><td class='td{$array['status']}'>{$show}</td><td>{$array['last_time']}</td><td class='tdupdate'><a href='articleUpdate.php?aid={$array['aid']}'>修改</a></td></tr>";
  }
  echo '</table>';
}

?>





</body>

<script>
  $('.td0').css('color' , 'red');
  $('.td1').css('color' , 'green');
</script>



</html>