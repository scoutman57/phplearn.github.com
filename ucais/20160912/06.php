<?php
header("Content-Type:text/html;charset=utf-8");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  
  <style>
    *{
      margin: 0;
      padding: 0;
    }
    div{
      width: 200px;
      height: 200px;
      background: tomato;
      /*position: absolute;*/
    }
  </style>

</head>
<body>
<div id="d1" onmousedown="mousedown(event)" onmousemove="mousemove(event)"
     onmouseup="mouseup(event)" onmouseout="mouseup(event)"></div>
</body>

<script>
  //是否在拖曳 ,刚开始是未拖曳
  var draging = false;
  var startx , starty;
  var div = document.getElementById('d1');
  //当鼠标点击是记录鼠标的初始位置
//  var div = document.getElementById('d1');
  function mousedown(event)
  {
    draging = true;
    console.log('down');
    startx = event.clientX;
    starty = event.clientY;
  }
  function mousemove(event)
  {
    if (!draging)
    {
      return;
    }
    //获取元素当前左边与上边的边距
    var x = div.offsetLeft;
    var y = div.offsetTop;
//      alert(x,y);
    //获取移动边距
    var deltax = event.clientX - startx;
    var deltay = event.clientY - starty;
    //重新设置元素的left和top
//    div.style.left = (x + deltax) + 'px';
//    div.style.top = (y + deltay) + 'px';
    div.style.marginLeft = (x + deltax) + 'px';
    div.style.marginTop = (y + deltay) + 'px';
    //重新设置初始位置
    startx = event.clientX;
    starty = event.clientY;
    console.log('move');
  }
  function mouseup(event)
  {
    draging = false;
    console.log('up');
  }
</script>

</html>
