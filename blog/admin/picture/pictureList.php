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
  <link rel="stylesheet" href="/css/admin/picture/pictureList.css">
  <script src="/js/jquery3.1.0.js"></script>
  <title></title>
</head>
<body>

<h1>图片列表</h1>
<h2>修改图片需谨慎!</h2>

<div id="divShowImage" style="width: 300px;height: 300px;background: tomato;position: absolute;display: none">
  <img id="myimgshowx" src="" alt="" style="width: 100%;height: 100%;background: aqua">
</div>

<?php
$sql = 'select p.picid , p.pid , p.pic_name , p.local_route , p.link , p.ord , p.status , c.cate_name from picture p , cate c where p.pid = c.cid';
$pictureList = DB($sql);
$countPictureList = count($pictureList);

if ($countPictureList < PAGE_NUM)
{
  mytable($pictureList , $countPictureList);
}
else
{
  $res = getPageList($sql);
  $pictureList = $res['data'];
  $countPictureList = count($pictureList);
  mytable($pictureList , $countPictureList);
  echo "<div class='divpage'>
        {$res['page']}
      </div>";
}


function mytable($pictureList , $countPictureList)
{
  echo <<<eof
	<table>
    <tr><th>PICID</th><th>相册名称</th><th>图片</th> <th>是否显示</th><th>操作</th></tr>
eof;
  $array = array();
  for ($i = 0 ; $i < $countPictureList ; $i++)
  {
    $array = $pictureList[$i];
    $show = $array['status'] ? '显示' : '不显示';
    echo "<tr><td>{$array['picid']}</td><td>{$array['cate_name']}</td><td><img src='/images/{$array['local_route']}' alt='' onmouseover='showBig(event , {$i})' class='img1' id='img2{$i}' onmouseout='imgtonone()'></td><td class='td{$array['status']}'>{$show}</td><td class='tdupdate'><a href='pictureUpdate.php?picid={$array['picid']}'>修改</a></td></tr>";
  }
  echo '</table>';
}


?>

</body>

<script>
  $('.td0').css('color' , 'red');
  $('.td1').css('color' , 'green');
  
  function showBig(event , b)
  {
    var x = event.clientX;
    var y = event.clientY;
    var cn = 'img2'+b;
    var mysrc = document.getElementById(cn).src;
    document.getElementById('myimgshowx').src=mysrc;
    $('#divShowImage').css({
      display: 'block',
      left: x,
      top: y
    });
  }
  function imgtonone()
  {
    $('#divShowImage').css({
      display: 'none'
    });
  }
</script>
</html>

