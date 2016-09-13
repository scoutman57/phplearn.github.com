<?php
header("Content-Type:text/html;charset=utf-8");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  <link rel="stylesheet" href="../fontawesome/css/fontawesome.css">
  
  <style>
	
	* {
	  margin: 0;
	  padding: 0;
	}
    
    #divImage{
      width: 700px;
      height: 400px;
      position: relative;
      margin-left: 50%;
      left: -350px;
      top: 100px;
      z-index: 2333;
    }
    
    img{
      width: 100%;
      height: 100%;
    }
    
    #divText1{
      width: 100%;
      height: 100px;
      position: absolute;
      bottom: 0px;
      background: black;
      opacity: 0.5;
      z-index: 2;
      color: white;
    }
    
    #divText2{
      height: 100px;
      line-height: 100px;
      color: white;
      font-size: 2rem;
    }
    
    #divLeft,#divRight{
      width: 50px;
      height: 80px;
      background: black;
      opacity: 0.5;
      position: absolute;
      color: white;
    }
    
    #divLeft{
      left: 0;
      top: 150px;
    }
    
    #divRight{
      right: 0;
      top: 150px;
    }
    
    #divLeft div , #divRight div{
      text-align: center;
    }
  
  </style>

</head>
<body>

<div id="divImage" onmousemove="clearTimerx()" onmouseout="startTimer()">
  
  <img src="images/1.jpg" id="img1">
  
  <div id="divText1">
    <div id="divText2" >这是第1张图片的描述</div>
  </div>
  
  <div id="divLeft" onclick="backImage()">
    <div id="next">
      <i class="fa fa-angle-left fa-5x" aria-hidden="true"></i>
    </div>
  </div>
  
  <div id="divRight" onclick="nextImage()">
    <div id="back">
      <i class="fa fa-angle-right fa-5x" aria-hidden="true"></i>
    </div>
  </div>
  
</div>
  
</body>

<script>

  var timer;
  var obj = document.getElementById('img1');
  var textx = document.getElementById('divText2');
  function startTimer()
  {
    timer = setInterval('change()' , 2000);
  }

  function clearTimerx()
  {
    clearInterval(timer);
  }
  
  function change()
  {
    var src = obj.src;//http://localhost:81/js/images/1.jpg
    var arr = src.split('/');
    var num = parseInt(arr[5]);
    if (num < 5)
    {
      num += 1;
      obj.src = 'images/' + num + '.jpg';
      textx.innerHTML = '这是第' + num + '张图片的描述！'
    }
    else
    {
      obj.src = 'images/' + '1' + '.jpg';
      textx.innerHTML = '这是第1张图片的描述!'
    }
  }
  
  function backImage()
  {
    var src = obj.src;//http://localhost:81/js/images/1.jpg
    var arr = src.split('/');
    var num = parseInt(arr[5]);
    if (num > 1)
    {
      num -= 1;
      obj.src = 'images/' + num + '.jpg';
      textx.innerHTML = '这是第' + num + '张图片的描述！'
    }
    else
    {
      obj.src = 'images/' + '5' + '.jpg';
      textx.innerHTML = '这是第5张图片的描述!'
    }
  }

  function nextImage()
  {
    change();
  }
  
  window.onload = startTimer;

</script>

</html>
