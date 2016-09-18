<?php
header("Content-Type:text/html;charset=utf-8");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  
  <style>
    h2,div{
      width:auto; margin: auto}
    h2{
      text-align: center;
    }
  </style>

</head>
<body>

<h2>ajax无刷新分页效果</h2>

<div id="result"></div>

</body>

<script>

  //制作函数（ajax去获得分页信息）
  function showPage(url)
  {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function ()
    {
      if (xhr.readyState == 4)
      {
        document.getElementById('result').innerHTML = xhr.responseText;
      }
    };
    xhr.open('get' , url);
    xhr.send(null);
  }
  
  window.onload = function ()
  {
    showPage('data.php');
  }

</script>

</html>
