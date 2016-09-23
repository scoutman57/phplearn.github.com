<?php
header("Content-Type:text/html;charset=utf-8");

include '../../public/func.php';


if (!empty($_POST))
{
//  var_dump($_POST , $_FILES);
//  die;
  $sql = "select * from cate where pid = {$_POST['cid']}";
  $res = DB($sql);
  if (!empty($res));
  {
    function tree2($pid = 0)
    {
      $arr = array();
      $data = DB('select cid , cate_name , pid from cate where pid = ' . $pid);
      foreach ($data as $cate)
      {
        $cate['son'] = tree($cate['cid']);
        $arr[] = $cate;
      }
      return $arr;
    }
    $checkArray = tree2($_POST['cid']);
//    var_dump($checkArray);
//    die;
  
    function show2($array)
    {
      $count = count($array);
      for ($i = 0 ; $i < $count ; $i++)
      {
        $arr = $array[$i];
        if ($arr['cid'] == $_POST['pid'])
        {
          echo '<script>
          alert(\'不能移动到自己的子分类中\');
        </script>';
          echo "<script>setTimeout('location=\'cateUpdate.php?cid={$arr['cid']}\'' , 0)</script>";
          exit();
        }
        if (!empty($arr['son']))
        {
          show2($arr['son']);
        }
      }
    }
    show2($checkArray);
  }
  
     
  if ($_FILES['pic']['name'] != '')
  {
    $res = getUpload();
//    var_dump($res);
    $fileName = explode('/' , $res['data'])[2];
//    var_dump($fileName);
//    die;
  }
  else
  {
    $fileName = $_POST['defaultImage'];
  }
    
//  var_dump($res);
//  die;
  $sql =   $sql = "update cate set cate_name = '{$_POST['cate_name']}' , pic = '{$fileName}' , ord = {$_POST['ord']} , status = {$_POST['status']} , pid = {$_POST['pid']} WHERE cid = {$_POST['cid']};";
//  var_dump($sql);
//  die;
  DB($sql);
  echo '<script>
          alert(\'修改成功\');
        </script>';
//  die;
  echo '<script>setTimeout("location=\'cateList.php\'" , 0)</script>';
  exit();
}



//var_dump($_GET);
$cid = intval($_GET['cid']);
$sql = 'select * from cate WHERE cid = ' . $cid;
$array = DB($sql)[0];
//var_dump($array);

function tree($pid = 0)
{
  $arr = array();
  $data = DB('select cid , cate_name from cate where pid = ' . $pid);
  foreach ($data as $cate)
  {
    $cate['son'] = tree($cate['cid']);
    $arr[] = $cate;
  }
  return $arr;
}
$arrayTree = tree();

//var_dump($array[0]);

//die;
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../../css/admin/cate/cateUpdate.css">
  <script src="../../js/jquery3.1.0.js"></script>
  <title></title>
</head>
<body>

<h1>栏目修改</h1>
<h2>请按照格式修改!</h2>

<form action="cateUpdate.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="cid" value="<?php echo $array['cid']; ?>">
  <label for="">父ID　　　　　　
    <select name="pid" id="" class="cateupdate">
      <option value="0">根分类</option>
      <?php

      function show($arrayTree , $c , $array)
      {
        $count = count($arrayTree);
        for ($i = 0 ; $i < $count ; $i++)
        {
          $arr = $arrayTree[$i];
          $xian = '　'.str_repeat('|----' , $c-1);
          if ($arr['cid'] == $array['pid'])
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
            show($arr['son'] , $c , $array);
            $c -= 1;
          }
        }
      }
      show($arrayTree , $c = 1 , $array);
      
      
      ?>
    </select>
  </label><br><br>
  <input type="hidden" name="defaultImage" value="<?php echo $array['pic']; ?>">
  <input type="hidden" name="cid" value="<?php echo $array['cid']; ?>">
  <label for="">栏目名称 　　　　<input type="text" name="cate_name" class="cateupdate" value="<?php echo $array['cate_name']; ?>"></label><br><br>
  <img src="../../images/cate_image/uploads<?php echo '/'.$array['pic']; ?>" alt=""><br><br>
  <label for="">栏目图标 　　　　　<input type="file" name="pic" class="" value="<?php echo $array['pic']; ?>"></label><br><br>
  <label for="">排序 　　　　　　<input type="text" name="ord" value="<?php echo $array['ord']; ?>" class="cateupdate"></label><br><br>
  <label for="">是否显示 　　　<input type="radio" name="status" value="0" checked>　不显示　　<input type="radio" name="status" value="1" id="radioShow">　显示</label><br><br>
  <input type="submit" value="提 交" class="btnsub">
</form>

</body>

<script>
  var value = <?php echo $array['status']; ?>;
  if (value == '1')
  {
    $('#radioShow').attr('checked' , 'checked');
  }
</script>

</html>