<?php
header("Content-Type:text/html;charset=utf-8");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  
  <style>
    div{
      height: 200px;
      background: black;
      color: white;
      cursor: crosshair;
    }
  </style>
  
</head>
<body>

<div id="d1" onmousemove="fn(event)"></div>

</body>

<script>
  function fn(e)
  {
    var obj = document.getElementById('d1');
    var x = e.clientX;
    var y = e.clientY;
    obj.innerHTML = '坐标：' + x + ',' + y;
    
  }
</script>

</html>
