<?php
header("Content-Type:text/html;charset=utf-8");


include '../../public/func.php';



//
if (!empty($_POST))
{
  if ($_FILES['picture']['error'] == 4)
  {
    $sql = "update picture set status = {$_POST['status']} , pid = {$_POST['pid']} where picid = {$_POST['picid']}";
    if (DB($sql))
    {
      echo '<script>
          alert(\'修改成功\');
        </script>';
      echo '<script>setTimeout("location=\'pictureList.php\'" , 0)</script>';
      exit();
    }
  }
  else
  {
    $arrayImage = $_FILES['picture'];
    $res = getUpload('picture' , 'picture');
    $imageName = $res['data'];
    $sql = "update picture set pid = {$_POST['pid']} , status = {$_POST['status']} , local_route = '{$imageName}' where picid = {$_POST['picid']}";
    if (DB($sql))
    {
      echo '<script>
          alert(\'修改成功2\');
        </script>';
      echo '<script>setTimeout("location=\'pictureList.php\'" , 0)</script>';
      exit();
    }
  }


  die;
}





$sql = "select p.picid , p.pid , p.pic_name , p.local_route , p.link , p.ord , p.status , c.cate_name from picture p , cate c where p.pid = c.cid && p.picid = {$_GET['picid']}";
$picture = DB($sql)[0];
function tree($pid = 0)
{
  $arr = array();
  $data = DB('select cid , cate_name from cate where pid = ' . $pid .'&& cate_name != \'图片轮播\'');
  foreach ($data as $cate)
  {
    $cate['son'] = tree($cate['cid']);
    $arr[] = $cate;
  }
  return $arr;
}
$sql = "select cid from cate where cate_name = '图片栏目'";
$res = DB($sql)[0]['cid'];
$arr = tree($res);
$countPictureLists = count($arr);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../../css/admin/picture/pictureAdd.css">
  <script src="../../js/jquery3.1.0.js"></script>
  <title></title>
</head>
<body>

<h1>修改图片</h1>
<h2>请按照格式修改!</h2>

<form action="pictureUpdate.php" method="post" enctype="multipart/form-data">
  
  <label for="">选择相册　　　　　　
    <select name="pid" id="" class="pictureAdd">
      <?php
      
      function myshow($array , $countPictureLists , $c , $picture)
      {
        for ($i = 0 ; $i < $countPictureLists ; $i++)
        {
          $arr = $array[$i];
          $xian = '　'.str_repeat('|----' , $c-1);
          if ($arr['cid'] == $picture['pid'])
          {
            echo "<option value='{$arr['cid']}' selected>{$xian}{$arr['cate_name']}</option>";
          }
          else
          {
            echo "<option value='{$arr['cid']}'>{$xian}{$arr['cate_name']}</option>";
          }
          if (!empty($arr['son']))
          {
            $c += 1;
            show($arr['son'] , $c );
            $c -= 1;
          }
        }
      }
      myshow($arr , $countPictureLists , $c = 1 , $picture);
      
      ?>
    </select>
  </label><br><br>
  <img src="/images/<?php echo $picture['local_route']; ?>" alt=""><br><br>
  <label for="">图片:　　　　　　　　<input type="file" name="picture"></label><br><br>
  <label for="">是否显示:　　　　　　<input type="radio" name="status" value="0" checked>　不显示　<input type="radio" name="status" value="1" id="status">　显示　</label><br><br>
  <input type="submit" value="提 交" class="btnsub">
  <input type="hidden" name="picid" value="<?php echo $_GET['picid']; ?>">

</form>



</body>

<script>
  
  
  var status = <?php echo $picture['status']; ?>;
  
  
  if (status == '1')
  {
    $('#status').attr('checked' , 'checked');
  }
</script>

</html>

