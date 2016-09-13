<?php
header("Content-Type:text/html;charset=utf-8");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  
  <style>
	
	*
    {
	  margin: 0;
	  padding: 0;
	}
    
    @-webkit-keyframes change
    {
      0%
      {
        background: tomato;
        width: 200px;
        height: 200px;
      }
      50%
      {
        background: aqua;
        width: 400px;
        height: 400px;
      }
      100%
      {
        background: tomato;
        width: 200px;
        height: 200px;
      }
    }
    
    div
    {
      width: 200px;
      height: 200px;
      background: tomato;
      -webkit-animation: change 2s ease-in-out 1s infinite;
    }
    /*
      3s为动画的执行时间
      1s为延迟一秒后执行动画
    */
    
    
  
  </style>

</head>
<body>

<div></div>

</body>

<script>


</script>

</html>
