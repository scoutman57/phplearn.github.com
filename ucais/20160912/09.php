<?php
header("Content-Type:text/html;charset=utf-8");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
</head>
<body>

<button onclick="console.log('html click')">按钮</button>

</body>

<script>
  var button = document.getElementsByTagName('button')[0];
  button.onclick = function ()
  {
    console.log('js click');
  };
  button.onclick = function ()
  {
    console.log('js2 click');
  };
  
  button.addEventListener('click' , btnclick);
  function btnclick()
  {
    console.log('event click');
  }
  
  button.addEventListener('click' , btnclick2);
  function btnclick2()
  {
    console.log('event click2');
  }
  
  
  
  
  
</script>

</html>
