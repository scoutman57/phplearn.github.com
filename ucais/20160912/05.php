<?php
header("Content-Type:text/html;charset=utf-8");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  
  <script>
    var draging = false;
    function mousedown()
    {
      draging = true;
      console.log('down');
    }
    function mousemove(e)
    {
      if (!draging)
        return;
      var div = document.getElementById('d1');
      console.log('move');
      var dx = e.clientX;
      var dy = e.clientY;
      div.innerHTML = "坐标:" + dx + ' , ' + dy;
    }
    function mouseup()
    {
      draging = false;
      console.log('up');
    }
  </script>
  
  <style>
    *{
      margin: 0;
      padding: 0;
    }
    div{
      width: 200px;
      height: 200px;
      background: tomato;
    }
  </style>
  
</head>
<body>
<div id="d1" onmousedown="mousedown()" onmousemove="mousemove(event)"
onmouseup="mouseup()"></div>
</body>
</html>
