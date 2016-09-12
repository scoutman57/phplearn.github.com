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

<form action="">
  <label>账　号:
    <input type="text" name="username">
  </label>
  <label>密　码:
    <input type="password" name="password">
  </label>
  <button onclick="submitform()">提　交</button>
</form>

<button onclick="location.href='http://cn.bing.com'">bing href</button>

<button onclick="location.assign('http://cn.bing.com')">bing assign</button>

<button onclick="location.replace('http://cn.bing.com')">bing replace</button>

<button onclick="location.reload()">bing reload</button>

<button onclick="history.forward()">bing history.forward</button>

</body>

<script>
  
  //获取网页上第一个form对象
  var form = document.forms[0];
  function submitform()
  {
    //调用提交表单的方法
    form.submit();
  }
  
</script>

</html>






