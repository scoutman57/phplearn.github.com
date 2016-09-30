<?php
header("Content-Type:text/html;charset=utf-8");

include '../../public/func.php';

if (!empty($_POST))
{
  $sql = "update tags set tagname = '{$_POST['tagname']}' , clickcount = {$_POST['clickcount']} , ord = {$_POST['ord']} , status = {$_POST['status']} WHERE tid = {$_POST['tid']};";
  DB($sql);
//  var_dump($sql);
//  die;
  echo '<script>
          alert(\'修改成功\');
        </script>';
  echo '<script>setTimeout("location=\'tagList.php\'" , 0)</script>';
  exit();
//  $tid = $_POST['tid'];
//  $sql = 'select * from tags WHERE tid = ' . $tid;
//  $array = DB($sql)[0];
}
//else
//{
  $get = $_GET;
//var_dump($get);
//die;
  $tid = intval($get['tid']);
  $sql = 'select * from tags WHERE tid = ' . $tid;
  $array = DB($sql)[0];
//}





?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../../css/admin/tags/tagupdate.css">
  <script src="../../js/jquery3.1.0.js"></script>
  <title></title>
</head>
<body>

<h1>修改标签</h1>
<h2>请按照格式修改!</h2>

<form action="tagupdate.php" method="post">
  <input type="hidden" name="tid" value="<?php echo $array['tid']; ?>">
  <label for="">标签名称 　　　<input type="text" name="tagname" class="tagupdate" value="<?php echo $array['tagname']; ?>"></label><br><br>
  <label for="">点击量 　　　　<input type="text" name="clickcount" class="tagupdate" value="<?php echo $array['clickcount']; ?>"></label><br><br>
  <label for="">排序 　　　　　<input type="text" name="ord" class="tagupdate" value="<?php echo $array['ord']; ?>"></label><br><br>
  <label for="">是否显示 　　　<input type="radio" name="status" value="0">　不显示　　<input type="radio" name="status" value="1">　显示</label><br><br>
  <input type="submit" value="提 交" class="btnsub">
</form>

</body>

<script>
  var value = <?php echo $array['status']; ?>;
  $(function ()
  {
    if (value == 1)
    {
      $('input:eq(5)').attr('checked' , 'checked');
    }
    else
    {
      $('input:eq(4)').attr('checked' , 'checked');
    }
  });
  
</script>

</html>

