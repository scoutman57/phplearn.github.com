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
  
  </style>

</head>
<body>

<button>获取内容</button>
<div></div>

</body>

<script>
  
  function ajax(url , callback)
  {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function ()
    {
      /*
       监听网络请求的事件
       0 - （未初始化） 还没有用send方法
       1 - （载入） 已调用send() 方法，正在发送请求
       2 - （载入完成） send方法执行完成
       3 - （交互） 正在解析相应内容
       4 - （完成） 相应内容解析完成
       */
//      alert(xhr.readyState);
      if (xhr.readyState == 4)
      {
        div.innerHTML = xhr.responseText;
      }
    };
    //指定请求方法和地址
    xhr.open('GET' , '02data.php');
    //开始发送请求
    xhr.send();
  }
  
  var btn1 = document.getElementsByTagName('button')[0];
  var div1 = document.getElementsByTagName('div')[0];
  
  
  


</script>

</html>
