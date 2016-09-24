<?php
header("Content-Type:text/html;charset=utf-8");


include '../../public/func.php';


//$_POST---------------------------------------------------------------------------------------------------------------------------------
if (!empty($_POST))
{
  $date = date('Y-m-d H-i-s');
  $sql = "update article set cid = {$_POST['pid']} , article_name = '{$_POST['article_name']}' , article_describe = '{$_POST['article_describe']}' , article_content = '{$_POST['article_content']}' , article_author = '{$_POST['article_author']}' , click_count = {$_POST['click_count']} , ord = {$_POST['ord']} , essence = {$_POST['essence']} , top = {$_POST['top']} , status = {$_POST['status']} , last_time = '{$date}' where aid = {$_POST['aid']}";

  if (DB($sql))
  {
    if (isset($_POST['tids']))
    {
      $arr = $_POST['tids'];
      $count = count($arr);
      DB("delete from article_tags where aid = {$_POST['aid']}");
      for ($i = 0 ; $i < $count ; $i++)
      {
        $sql = "insert into article_tags VALUES (null , {$_POST['aid']} , {$arr[$i]})";
        DB($sql);
      }
    }
    else
    {
      var_dump('1111');
      DB("insert into article_tags VALUES (null , {$_POST['aid']} , {$_POST['tid']})");
    }
    echo '<script>
          alert(\'修改成功\');
        </script>';
    echo '<script>setTimeout("location=\'articleList.php\'" , 0)</script>';
    exit();
  }
}
//---------------------------------------------------------------------------------------------------------------------------------


$aid = $_GET['aid'];
$sql = "select a.aid,a.cid,a.article_name,a.article_describe,a.article_content,a.article_author,a.click_count,a.ord,a.essence,a.top,a.status,a.last_time,c.cate_name from cate c , article a where a.cid = c.cid && a.aid = {$aid}";

$arrayUpdate = DB($sql)[0];

$tagsList = DB("select * from article_tags where aid = {$_GET['aid']}");
$taglDefaultList = array();
$countTL = count($tagsList);
for ($i = 0 ; $i < $countTL ; $i++)
{
  $sql = "select tagname , tid from tags where tid = {$tagsList[$i]['tid']}";
  $res = DB($sql)[0];
  $taglDefaultList[] = $res;
}


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

<h1>修改内容</h1>
<h2>请按照格式修改!</h2>

<form action="articleUpdate.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="aid" value="<?php echo $aid; ?>">
  <label for="">栏目　　　　　　
    <select name="pid" id="" class="articleUpdate">
      <option value="<?php echo $pid; ?>">根分类</option>
      <?php
      
      function show($arrayTree , $c , $arrayUpdate)
      {
        $count = count($arrayTree);
        for ($i = 0 ; $i < $count ; $i++)
        {
          $arr = $arrayTree[$i];
          $xian = '　'.str_repeat('|----' , $c-1);
          if ($arr['cid'] == $arrayUpdate['pid'])
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
            show($arr['son'] , $c , $arrayUpdate);
            $c -= 1;
          }
        }
      }
      show($arrayTree , $c = 1 , $arrayUpdate);
      
      
      ?>
    </select>
  </label><br><br>
  <div id="tags" >
    <label></label>
    <?php
    $countTaglDefaultList = count($taglDefaultList);
    for ($i = 0 ; $i < $countTaglDefaultList ; $i++)
    {
      $html = "<div class=\"tag-list\">{$taglDefaultList[$i]['tagname']}<input type=\"hidden\" name=\"tids[]\" value='{$taglDefaultList[$i]['tid']}'><span>X</span></div>";
      echo $html;
    }
    
    
    
    ?>
    
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
      
//      echo "<p>var_dump($arrayTag)<p>";

      ?>
    </select>
    <input type="button"class="btnsub" name="but" value="选中">
  </label><br><br>
  <label for="">文章标题 　　　　<input type="text" name="article_name" class="articleUpdate" value="<?php echo $arrayUpdate['article_name']; ?>"></label><br><br>
  <p class="fl">文章描述　　　　　</p> 　　　　
  <textarea class="fl" name="article_describe" id="" cols="80" rows="10">
    <?php echo $arrayUpdate['article_describe']; ?>
  </textarea>
  <br><br><br>
  <div style="clear: both;height: 30px"></div>
  
  
  
  <!--<form action="" method="post">-->
  
  
<!--   加载编辑器的容器 -->
  
<!--  <script id="container" name="content" type="text/plain">-->
<!--          这里写你的初始化内容-->
<!--      </script>-->
  <p class="fl">文章内容　　　　</p>
  <textarea id="container" name="article_content" type="text/plain">
    <?php echo $arrayUpdate['article_content']; ?>
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
    
  <!--</form>-->
  
  
  <label for="">作者　 　　　　<input type="text" name="article_author" class="articleUpdate" value="<?php echo $arrayUpdate['article_author']; ?>"></label><br><br>
  <label for="">点击量　 　　　<input type="text" name="click_count" class="articleUpdate" value="<?php echo $arrayUpdate['click_count']; ?>"></label><br><br>
  <label for="">排序　　 　　　<input type="text" name="ord" class="articleUpdate" value="<?php echo $arrayUpdate['ord']; ?>"></label><br><br>
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
    
    var essence = <?php echo $arrayUpdate['essence']; ?>;
    var top = <?php echo $arrayUpdate['top']; ?>;
    var status = <?php echo $arrayUpdate['status']; ?>;
    
    
    if (essence == '1')
    {
      $('#essence').attr('checked' , 'checked');
    }
    if (top == '1')
    {
      $('#top').attr('checked' , 'checked');
    }
    if (status == '1')
    {
      $('#status').attr('checked' , 'checked');
    }

  
    
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
  
  
//    var strs= new Array(); //定义一数组
//    var strs2= new Array(); //定义一数组
//    strs=TL.split(","); //字符分割
//    strs2=TL2.split(","); //字符分割
//    alert(strs);
//    alert(strs2);
//    for (var i=0;i<strs.length ;i++ )
//    {
//      var defaultTagName = <?php //$y = 0 ;$taglDefaultList[$y]['tagname']; ++$y; ?>
//      document.write(strs[i]+"<br/>"); //分割后的字符输出
//      var html2 = '<div class="tag-list">'+defaultTagName+' <input type="hidden" name="tids[]" value='+strs[i]+'><span>X</span></div>';
//    }
  
  
  
  });
  

  
</script>

</html>

