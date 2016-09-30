<?php
header("Content-Type:text/html;charset=utf-8");


include '../../public/func.php';


if (!empty($_POST))
{
//  var_dump($_POST , $_FILES);
  if ($_FILES['local_route']['error'] == 4)
  {
    $ord = intval($_POST['ord']);
    $sql = "update  player set player_name = '{$_POST['player_name']}' , link = '{$_POST['link']}' , ord = {$ord} , status = {$_POST['status']} where playerid = {$_POST['playerid']}";
    if (DB($sql))
    {
      echo '<script>
          alert(\'修改成功\');
        </script>';
      echo '<script>setTimeout("location=\'playerList.php\'" , 0)</script>';
      exit();
    }
  }
  else
  {
    $arrayImage = $_FILES['local_route'];
    $res = getUpload('local_route' , 'player');
    $imageName = $res['data'];
    $ord = intval($_POST['ord']);
    $sql = "update  player set player_name = '{$_POST['player_name']}' , link = '{$_POST['link']}' , ord = {$ord} , status = {$_POST['status']} , local_route = '{$imageName}' where playerid = {$_POST['playerid']}";
    if (DB($sql))
    {
      echo '<script>
          alert(\'修改成功2\');
        </script>';
      echo '<script>setTimeout("location=\'playerList.php\'" , 0)</script>';
      exit();
    }
  }
  
  
  die;
}

//var_dump($_GET);
$sql = "select * from player where playerid = {$_GET['playerid']}";
$res = DB($sql)[0];
//var_dump($res);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../../css/admin/player/playerAdd.css">
  <script src="../../js/jquery3.1.0.js"></script>
  <title></title>
</head>
<body>

<h1>修改轮播图</h1>
<h2>请按照格式修改!</h2>

<form action="playerUpdate.php" method="post" enctype="multipart/form-data" onsubmit="return myCheck()">
  
  <label for="">轮播名称　　　　　<input type="text" class="carouselAdd" name="player_name" value="<?php echo $res['player_name']; ?>"></label><br><br>
  <img src="/images/<?php echo $res['local_route']; ?>" alt=""><br><br>
  <label for="">图片　　　　　　　<input type="file" name="local_route"></label><br><br>
  <label for="">链接　　　　　　　<input type="text" class="carouselAdd" name="link" value="<?php echo $res['link']; ?>"></label><br><br>
  <label for="">排序　　　　　　　<input type="text" class="carouselAdd" name="ord" value="<?php echo $res['ord']; ?>"></label><br><br>
  <label for="">是否显示　　　　　<input type="radio" name="status" value="0" checked>　不显示　<input type="radio" name="status" value="1" id="status">　显示　</label><br><br>
  <input type="submit" class="btnsub" name="btnsub">
  <input type="hidden" name="playerid" value="<?php echo $_GET['playerid']; ?>">
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
  }

  var status = <?php echo $res['status']; ?>;


  if (status == '1')
  {
    $('#status').attr('checked' , 'checked');
  }
</script>

</html>

