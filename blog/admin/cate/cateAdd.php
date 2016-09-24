<?php
header("Content-Type:text/html;charset=utf-8");

include '../../public/func.php';

if (!empty($_POST))
{
  if ($_FILES['pic']['name'] != '')
  {
    $res = getUpload('pic' , 'cate_image');
    $fileName = explode('/' , $res['data'])[2];
  }
  else
  {
    $fileName = '';
  }
  
  $ord = $_POST['ord'] == '' ? 0 : $_POST['ord'];
  var_dump($ord);
  die;
  $sql = "insert into cate VALUES (NULL , '{$_POST['cate_name']}' , {$_POST['pid']} , '{$fileName}' , {$_POST['ord']} , {$_POST['status']})";
  if(DB($sql))
  {
    echo "<script>
            alert('新增成功!!!您可以继续添加!');
          </script>";
  }
//  exit();
}





$sql = 'select * from cate';
$res = DB($sql);

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
//var_dump($arrayTree);

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
  <title>Document</title>
</head>
<body>

<h1>添加栏目</h1>
<h2>请按照格式添加!</h2>

<form action="cateAdd.php" method="post" enctype="multipart/form-data" onsubmit="return checkCate()">
<label for="">父ID　　　　　　
  <select name="pid" id="" class="cateupdate">
    <option value="0">根分类</option>
    <?php
    
    function show($arrayTree , $c)
    {
      $count = count($arrayTree);
      for ($i = 0 ; $i < $count ; $i++)
      {
        $arr = $arrayTree[$i];
        $xian = '　'.str_repeat('|----' , $c-1);
//        if ($arr['cid'] == $array['pid'])
//        {
//          echo "<option value='{$arr['cid']}' selected>{$xian}{$arr['cate_name']}</option>";
//        }
//        else
//        {
          echo "<option value='{$arr['cid']}'>{$xian}{$arr['cate_name']}</option>";
//        }
        
        if (!empty($arr['son']))
        {
          $c += 1;
          show($arr['son'] , $c);
          $c -= 1;
        }
      }
    }
    show($arrayTree , $c = 1);
    
    
    ?>
  </select>
</label><br><br>
<label for="">栏目名称 　　　　<input type="text" name="cate_name" class="cateupdate" value="" onblur="ajax()"></label><br><br>
<label for="">栏目图标 　　　　　<input type="file" name="pic" class="" value=""></label><br><br>
<label for="">排序 　　　　　　<input type="text" name="ord" value="0" class="cateupdate"></label><br><br>
<label for="">是否显示 　　　<input type="radio" name="status" value="0" checked>　不显示　　<input type="radio" name="status" value="1" id="radioShow">　显示</label><br><br>
<input type="submit" value="提 交" class="btnsub">
</form>

</body>

<script>
  function checkCate()
  {
    if ($('input:eq(0)').val() == '')
    {
      alert('栏目名称不能为空!');
      return false;
    }
    ajax();
  }
  
  function ajax()
  {
    var value = $('input:eq(0)').val();
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function ()
    {
      if (xhr.readyState == 4)
      {
        if (xhr.responseText.length > 100)
        {
          alert('该标签已存在!');
          $(':submit').attr('disabled' , true).val('请填写对应内容');
          return true;
        }
        else
        {
          $(':submit').attr('disabled' , false).val('提 交');
        }
      }
    };
  
    xhr.open('get' , 'cateAddAjax.php?'+'value='+value);
  
    xhr.send();
  }
</script>


</html>
