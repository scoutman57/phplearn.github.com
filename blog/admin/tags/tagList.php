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
  <link rel="stylesheet" href="../../css/admin/tags/tagList.css">
  <title></title>
</head>
<body>

<h1>标签列表</h1>
<h2>修改标签需谨慎!</h2>

<?php
$sql = 'select * from tags';
$tags = DB($sql);
$tagcount = count($tags);
echo <<<eof
	<table>
    <tr><th>TID</th><th>标签名称</th><th>排序</th><th>点击量</th><th>是否显示</th><th>操作</th></tr>
eof;
$array = array();
for ($i = 0 ; $i < $tagcount ; $i++)
{
  $array = $tags[$i];
  $value = $array['status'] ? '显示' : '不显示';
  echo "<tr><td>{$array['tid']}</td><td>{$array['tagname']}</td><td>{$array['ord']}</td><td>{$array['clickcount']}</td><td class='tdshow'>{$value}</td><td class='tdupdate'><a href='tagupdate.php?tid={$array['tid']}'>修改</a></td></tr>";
}
echo '</table>';

?>

</body>
</html>

