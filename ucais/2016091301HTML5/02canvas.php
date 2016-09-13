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
    
    canvas{
      width: 500px;
      height: 500px;
      background: tomato;
    }
  
  </style>

</head>
<body>

<canvas>
  
  <script>
    var canvas = document.getElementsByTagName('canvas')[0];
    var ctx = canvas.getContext('2d');
    ctx.fillStyle = 'aqua';
    ctx.fillRect(0 , 0 , 100 , 100);
  </script>
  
</canvas>

</body>

<script>


</script>

</html>
