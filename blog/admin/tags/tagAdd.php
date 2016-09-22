<?php
header("Content-Type:text/html;charset=utf-8");

include '../../public/func.php';

if (!empty($_POST))
{
  $sql = "insert into tags VALUES (null , '{$_POST['tagname']}' , '{$_POST['ord']}' , '{$_POST['clickcount']}' , '{$_POST['status']}')";
  if (DB($sql))
  {
    echo "<script>
            alert('新增成功!!!您可以继续添加!');
          </script>";
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
  <link rel="stylesheet" href="../../css/admin/tags/tagupdate.css">
  <script src="../../js/jquery3.1.0.js"></script>
  <title></title>
</head>
<body>

<h1>添加标签</h1>
<h2>请按照格式添加!</h2>

<form action="tagAdd.php" method="post"  ONSUBMIT="check()">
  <label for="">标签名称 　　　<input type="text" name="tagname" class="tagupdate" onblur="ajax()"></label><br><br>
  <label for="">点击量 　　　　<input type="text" name="clickcount" class="tagupdate" value="0" placeholder="2"></label><br><br>
  <label for="">排序 　　　　　<input type="text" name="ord" class="tagupdate" value="0"></label><br><br>
  <label for="">是否显示 　　　<input type="radio" name="status" value="0">　不显示　　<input type="radio" name="status" value="1" checked>　显示</label><br><br>
  <input type="submit" value="请填写对应内容" class="btnsub">
</form>

</body>

<script>

  
  function check()
  {
    if ($('input:eq(0)').val() == '' || $('input:eq(1)').val() == '' || $('input:eq(2)').val() == '' )
    {
      $(':submit').attr('disabled' , true).val('请填写对应内容');
      return false;
    }
    else
    {
      if (ajax())
      {
        
      }
      else
      {
        $(':submit').attr('disabled' , false).val('提 交');
        return true;
      }
     
    }
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

    xhr.open('get' , 'tagAddAjax.php?'+'value='+value);

    xhr.send();
  }
</script>
</html>


