<?php
header("Content-Type:text/html;charset=utf-8");

include '../../public/func.php';
//include '../../public/func.php';


//$sql = 'select * from cate where pid = 0';
//$data = DB($sql);
//$datacount = count($data);
//var_dump($data);

//$sql = "select * from cate where pid = 2";
//$res = DB($sql);
//var_dump($res);

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

//echo '<pre>';
$array = tree();
//print_r($array);



?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
  <link rel="stylesheet" href="../../css/admin/cate/cateList.css">
  <script src="../../js/jquery3.1.0.js"></script>
</head>
<body>

<h1>栏目列表</h1>
<h2>修改栏目需谨慎!</h2>
<!--<ul>-->
<!--<dl>-->
<?php


function show($array , $c)
{
  $count = count($array);
  for ($i = 0 ; $i < $count ; $i++)
  {
    echo "<dl>";
    $arr = $array[$i];
    $xian = '　'.str_repeat('|----' , $c-1);
    echo "<dt class='li{$c}'>{$xian}{$arr['cate_name']}<a href='cateUpdate.php?cid={$arr['cid']}'>修改</a></dt>";
    if (!empty($arr['son']))
    {
      $c += 1;
      echo "<dd>";
      show($arr['son'] , $c);
      $c -= 1;
      echo "</dd>";
    }
//    echo "</dt>";
    echo "</dl>";
  }
}
show($array , $c = 1);
//var_dump($count);


?>
<!--</ul>-->
<!--</dl>-->


</body>

<script>
<?php
//    for ($i = 0; $i < $datacount ; $i++)
//    {
//      echo "$('<dl><dt>{$data[$i]['cate_name']}</dt></dl>').appendTo($('body'));
//            $('dl:eq({$i})').addClass('c{$i}');
//            ";
//      $pid = $data[$i]['cid'];
//      $sql = "select * from cate where pid = {$pid}";
//      $res = DB($sql);
//      $rescount = count($res);
//      for ($j = 0 ; $j < $rescount ; $j++)
//      {
//        echo "$('.c{$i}').append($('<dd>{$res[$j]['cate_name']}</dd>'));";
//      }
//    }
//  ?>
  
//  $('li:odd').css('background','#DDDDDD');

  $('dt').click(function ()
  {
    $(this).parent().find('dd').slideToggle();
  });
</script>

</html>