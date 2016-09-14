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
      width: 300px;
      display: block;
      margin-bottom: 10px;
    }
  
  </style>

</head>
<body>

<button onclick="ajax()">获取图片</button>

</body>

<script>
  
  function ajax()
  {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function()
    {
      console.log(xhr.readyState);
      if (xhr.readyState == 4)
      {
        var obj = document.createElement('img');
        obj.src = xhr.responseText;
        document.body.appendChild(obj);
      }
    };
    xhr.open('GET', '02data.php');
    xhr.send();
  }
  
</script>

</html>
