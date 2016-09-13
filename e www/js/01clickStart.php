<?php
header("Content-Type:text/html;charset=utf-8");


?>

<!DOCTYPE html>
<html lang="en" onclick="star(event)">

<head>
  <meta charset="UTF-8">
  <title>Title</title>
  
  <style>
    body{
      /*min-height: 1000px;*/
      /*height: auto;*/
    }
    img{
      position: absolute;
    }
  </style>
  
</head>

<body>

</body>

<script>
  
  function star(event)
  {
    //创建一个星星
    var obj = document.createElement('img');
    obj.src = 'images/star.png';
    //让星星大小在20到100之间随机
    var w = Math.floor(Math.random()*(100-20+1)+20);
    obj.width = w;
    //找到鼠标点击时候的坐标位置
    var x = event.clientX;
    var y = event.clientY;
    obj.style.left = (x - w / 2) + 'px';
    obj.style.top = (y - w / 2) + 'px';
    //放到body里面
    document.body.appendChild(obj);
  }

</script>

</html>
