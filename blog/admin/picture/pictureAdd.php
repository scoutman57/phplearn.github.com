<?php
header("Content-Type:text/html;charset=utf-8");



include '../../public/func.php';




//$_POST-----------------------------------------------------------------------------------------------------------------
if (!empty($_POST))
{
  $arrayPicture = $_FILES['picture'];
  $res = getUpload('picture' , 'picture');
  $imageName = $res['data'];
//  var_dump($_POST , $_FILES , $arrayPicture ,$imageName);
  $sql = "insert into picture VALUES (NULL , {$_POST['pid']} , '' , '{$imageName}' , '' , 0 , '{$_POST['status']}')";
  if (DB($sql))
  {
    echo '<script>
          alert(\'新增成功!您可以继续新增!\');
        </script>';
  }
}
//$_POST-----------------------------------------------------------------------------------------------------------------





$sql = "select cid from cate where cate_name = '图片栏目'";
$res = DB($sql)[0]['cid'];
function tree($pid = 0)//15 为cate表中文章分类的CID
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
$arr = tree($res);
$countPictureLists = count($arr);
//var_dump($arr , $countPictureLists);
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

<h1>新增图片</h1>
<h2>请按照格式新增!</h2>

<form action="pictureAdd.php" method="post" enctype="multipart/form-data" onsubmit="return myCheck()">
  
  <label for="">选择相册　　　　　　
    <select name="pid" id="" class="pictureAdd">
      <?php
      
      function myshow($arr , $countPictureLists , $c)
      {
        for ($i = 0 ; $i < $countPictureLists ; $i++)
        {
          $xian = '　'.str_repeat('|----' , $c-1);
          echo "<option value='{$arr[$i]['cid']}'>{$xian}{$arr[$i]['cate_name']}</option>";
          if (!empty($arr['son']))
          {
            $c += 1;
            show($arr['son'] , $c );
            $c -= 1;
          }
        }
      }
      myshow($arr , $countPictureLists , $c = 1);
      
      ?>
    </select>
  </label><br><br>
  <label for="">图片:　　　　　　　　<input type="file" name="picture"></label><br><br>
  <label for="">是否显示:　　　　　　<input type="radio" name="status" value="0" checked>　不显示　<input type="radio" name="status" value="1">　显示　</label><br><br>
  <input type="submit" value="提 交" class="btnsub">
  
</form>

</body>

<script>
  function myCheck()
  {
    if ($("input[type='file']").val() == '')
    {
      alert('请选择需要上传的图片!!!');
      return false;
    }
  }
</script>

</html>
