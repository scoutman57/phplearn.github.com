<?php
header("Content-Type:text/html;charset=utf-8");


include '../../public/func.php';



//$_POST-----------------------------------------------------------------------------------------------------------------
if (!empty($_POST))
{
  $html = htmlspecialchars($_POST['article_content']);

  $date = date("Y-m-d H-i-s");
  $sql = "insert into article values(null , {$_POST['pid']} , '{$_POST['article_name']}' , '{$_POST['article_describe']}' , '{$html}' , '{$_POST['article_author']}' , {$_POST['click_count']} , {$_POST['ord']} , {$_POST['essence']} , {$_POST['top']} , {$_POST['status']} , '{$date}')";
//  var_dump($_POST);
  if (isset($_POST['tids']))
  {
    if (DB($sql))
    {
      $aid = DB('select max(aid) from article')[0]['max(aid)'];
//      var_dump($aid);
//      die;
      $arr = $_POST['tids'];
      $count = count($arr);
      for ($i=0;$i<$count;$i++)
      {
        DB("insert into article_tags values(null , {$aid} , {$arr[$i]})");
      }
      echo '<script>
          alert(\'新增成功!您可以继续新增!\');
        </script>';
    }
  }
  else
  {
    if (DB($sql))
    {
      $aid = DB('select max(aid) from article')[0]['max(aid)'];
      DB("insert into article_tags values(null , {$aid} , {$_POST['tid']})");
      echo '<script>
          alert(\'新增成功!您可以继续新增!\');
        </script>';
    }
  }
}
//$_POST-----------------------------------------------------------------------------------------------------------------






function tree($pid = 0)//15 为cate表中文章分类的CID
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
$sql = "select * from cate where cate_name = '文章分类'";
$pid = DB($sql)[0]['cid'];
$arrayTree = tree($pid);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/admin/article/articleUpdate.css">
  <script src="/js/jquery3.1.0.js"></script>
  <title></title>
</head>
<body>


<h1>新增内容</h1>
<h2>请按照格式新增!</h2>

<form action="articleAdd.php" method="post" enctype="multipart/form-data">
  <label for="">栏目　　　　　　
    <select name="pid" id="" class="articleUpdate">
      <option value="<?php echo $pid; ?>">根分类</option>
      <?php
      
      function show($arrayTree , $c )
      {
        $count = count($arrayTree);
        for ($i = 0 ; $i < $count ; $i++)
        {
          $arr = $arrayTree[$i];
          $xian = '　'.str_repeat('|----' , $c-1);
          echo "<option value='{$arr['cid']}'>{$xian}{$arr['cate_name']}</option>";
          if (!empty($arr['son']))
          {
            $c += 1;
            show($arr['son'] , $c );
            $c -= 1;
          }
        }
      }
      show($arrayTree , $c = 1 );
      
      
      ?>
    </select>
  </label><br><br>
  <div id="tags" style="display:none">
    <label></label>
    
    
    <div class="clear" style="clear: both"></div>
  </div>
  <label for="">添加标签　　　　
    <select name="tid" id="" class="articleUpdate">
      <?php
      $sql = "select * from tags";
      $arrayTags = DB($sql);
      $countTags = count($arrayTags);
      for ($j = 0 ; $j < $countTags ; $j++)
      {
        $arr = $arrayTags[$j];
        echo "<option value='{$arr['tid']}'>{$arr['tagname']}</option>";
      }
      
      ?>
    </select>
    <input type="button"class="btnsub" name="but" value="选中">
  </label><br><br>
  <label for="">文章标题 　　　　<input type="text" name="article_name" class="articleUpdate" value=""></label><br><br>
  <p class="fl">文章描述　　　　　</p> 　　　　
  <textarea class="fl" name="article_describe" id="" cols="80" rows="10">
    
  </textarea>
  <br><br><br>
  <div style="clear: both;height: 30px"></div>
  
  

  <p class="fl">文章内容　　　　</p>
  <textarea id="container" name="article_content" type="text/plain">
  </textarea>
  <div style="clear: both;height: 30px"></div>
  
  <!--   配置文件 -->
  <script type="text/javascript" src="/js/ue/ueditor.config.js"></script>
  <!--   编辑器源码文件 -->
  <script type="text/javascript" src="/js/ue/ueditor.all.js"></script>
  <!--   实例化编辑器 -->
  <script type="text/javascript">
    var ue = UE.getEditor('container');
  </script>
  
  
  <label for="">作者　 　　　　<input type="text" name="article_author" class="articleUpdate" value="author" placeholder=""></label><br><br>
  <label for="">点击量　 　　　<input type="text" name="click_count" class="articleUpdate" value="0"></label><br><br>
  <label for="">排序　　 　　　<input type="text" name="ord" class="articleUpdate" value="0"></label><br><br>
  <label for="">是否加精 　　　<input type="radio" name="essence" value="0" checked>　不显示　　<input type="radio" name="essence" value="1" id="essence">　显示</label><br><br>
  <label for="">是否置顶 　　　<input type="radio" name="top" value="0" checked>　不显示　　<input type="radio" name="top" value="1" id="top">　显示
  </label><br><br>
  <label for="">是否显示 　　　<input type="radio" name="status" value="0" checked>　不显示　　<input type="radio" name="status" value="1" id="status">　显示</label><br><br>
  <input type="submit" value="提 交" class="btnsub">

</form>



</body>

<script>
  $(function ()
  {
    //标签选择
    $('input[name=but]').on('click' , function(){
//        alert('1');
      var sval = $('select[name=tid] option:selected').val();
      var stext = $('select[name=tid] option:selected').text();
    
      var html = '<div class="tag-list">'+stext+' <input type="hidden" name="tids[]" value='+sval+'><span>X</span></div>';
      var i = 0;
    
      $('#tags input').each(function(){
        if($(this).val() == sval)
        {
          i++;
          return false;
        }
      });
    
      if(i == 0)
      {
        $('#tags').css('display','block');
        $('.clear').before(html);
      }else{
        alert('当前标签已经被选中!');
      }
    });
  
    $('#tags').on( 'click' , 'span' ,function(){
      $(this).parent().remove();
      var len = $('#tags').children('.tag-list').length;
      if(len == 0)
      {
        $('#tags').css('display','none');
      }
    });
  
  
  })
</script>


</html>
