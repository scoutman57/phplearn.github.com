<?php
header("Content-Type:text/html;charset=utf-8");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  
  <style>
    #div1{
      width: 300px;
      height: 300px;
      background: tomato;
    }
    #div2{
      width: 200px;
      height: 200px;
      background: aqua;
    }
    #div3{
      width: 100px;
      height: 100px;
      background: gold;
    }
  </style>
  
</head>
<body>

<div id="div1">
  <div id="div2">
    <div id="div3">
      <button>移除div1事件</button>
    </div>
  </div>
</div>

</body>

<script>
  function div1click()
  {
    console.log('div1 click');
  }
  document.getElementById('div1').addEventListener('click' , div1click , true);
  //第三个参数改变冒泡的方向，默认为false，即从里往外
  document.getElementById('div2').addEventListener('click' , function ()
  {
    console.log('div2 click');
  });
  document.getElementById('div3').addEventListener('click' , function (event)
  {
    console.log('div3 click');
    //组织事件的冒泡，否则父容器也会受到事件
//    event.cancelBubble = true;
    event.stopPropagation();
//    event.preventDefault();
  });
  
  document.getElementsByTagName('button')[0].addEventListener('click' , function (event)
  {
    document.getElementById('div1').removeEventListener('click' , div1click);
    event.stopPropagation();
  })
  
</script>

</html>
