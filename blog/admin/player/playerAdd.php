<?php
header("Content-Type:text/html;charset=utf-8");


include '../../public/func.php';

if (!empty($_POST))
{
  $arrayImage = $_FILES['local_route'];
  $res = getUpload('local_route' , 'player');
  $imageName = $res['data'];
  $ord = intval($_POST['ord']);
  $sql = "select * from cate where cate_name='图片轮播'";
  $pid = DB($sql)[0]['cid'];
  $sql = "insert into player VALUES (NULL , {$pid} , '{$_POST['player_name']}' , '{$imageName}' , '{$_POST['link']}' , '{$ord}' , '{$_POST['status']}')";
  if (DB($sql))
  {
    echo '<script>
          alert(\'新增成功!您可以继续新增!\');
        </script>';
  }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/admin/player/playerAdd.css">
  <script src="/js/jquery3.1.0.js"></script>
  <title></title>
</head>
<body>

<h1>新增轮播图</h1>
<h2>请按照格式新增!</h2>

<form action="playerAdd.php" method="post" enctype="multipart/form-data" onsubmit="return myCheck()">
  
  <label for="">轮播名称　　　　　<input type="text" class="carouselAdd" name="player_name"></label><br><br>
  <label for="">图片　　　　　　　<input type="file" name="local_route"></label><br><br>
  <label for="">链接　　　　　　　<input type="text" class="carouselAdd" name="link"></label><br><br>
  <label for="">排序　　　　　　　<input type="text" class="carouselAdd" name="ord" value="0"></label><br><br>
  <label for="">是否显示　　　　　<input type="radio" name="status" value="0" checked>　不显示　<input type="radio" name="status" value="1">　显示　</label><br><br>
  <input type="submit" class="btnsub" name="btnsub">
  
</form>

</body>

<script>
  function myCheck()
  {
    if ($("input[name='carousel_name']").val() == '')
    {
      alert('轮播名称不能为空!');
      return false;
    }
    if ($("input[type='file']").val() == '')
    {
      alert('请选择上传图片!');
      return false;
    }
  }
</script>

</html>
