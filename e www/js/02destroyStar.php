<?php
header("Content-Type:text/html;charset=utf-8");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  
  <style>
	
	* {
	  margin: 0;
	  padding: 0;
	}
    
    img{
      position: absolute;
    }
  
  </style>

</head>
<body>

</body>

<script>

//  var timer = setInterval('createStar()' , 1000);
  createStar();
  function createStar()
  {
    //创建一个星星
    var obj = document.createElement('img');
    obj.src = 'images/star.png';
    //让星星大小在20到100之间随机
    var w = Math.floor(Math.random()*(100-20+1)+20);
    obj.width = w;
    //生成图片的位置位置
    var left = Math.floor(Math.random() * (90 - 5 + 1) + 5);
    var top = Math.floor(Math.random() * (90 - 5 + 1) + 5);
    obj.style.left = left + '%';
    obj.style.top = top + '%';
    //放到body里面
    document.body.appendChild(obj);
    obj.addEventListener('click' , destroy);
    setTimeout('createStar()' , 1000);
  }
  
  function destroy()
  {
    this.remove();
  }

</script>

</html>
