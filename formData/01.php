<?php
header("Content-Type:text/html;charset=utf-8");


?>
<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--  <meta charset="UTF-8">-->
<!--  <meta name="viewport"-->
<!--        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--  <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--  <script src="../jquery3.1.0.js"></script>-->
<!--  <title>Document</title>-->
<!--</head>-->
<!--<body>-->
<!---->
<!--<form action="01data.php">-->
<!--  账号: <input type="text"><br>-->
<!--  密码: <input type="password"><br>-->
<!--  <input type="submit">-->
<!--</form>-->
<!---->
<!--</body>-->
<!--<script>-->
<!--  $('form:eq(0)').submit(function (event)-->
<!--  {-->
<!--    var zh = $('input:eq(0)').val();-->
<!--//    alert(zh);-->
<!--    var mm = $('input:eq(1)').val();-->
<!--//    alert(mm);-->
<!--    var info = 'name='+zh+'&pwd='+mm;-->
<!--//    alert(info);-->
<!--    -->
<!--    var xhr = new XMLHttpRequest();-->
<!--    xhr.onreadystatechange = function ()-->
<!--    {-->
<!--      if (xhr.readyState == 4)-->
<!--      {-->
<!--        alert(xhr.responseText);-->
<!--      }-->
<!--    };-->
<!--    xhr.open('post' , './01data.php');-->
<!--    xhr.setRequestHeader('content-type' , 'application/x-www-form-urlencoded');-->
<!--    xhr.send(info);-->
<!--    event.preventDefault();-->
<!--  });-->
<!--</script>-->
<!--</html>-->






<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="../jquery3.1.0.js"></script>
  <title>Document</title>
</head>
<body>

<form action="01data.php">
  账号2: <input type="text" name="username"><br>
  密码2: <input type="password" name="pwd" ><br>
  <input type="submit">
</form>

</body>
<script>
  $('form:eq(0)').submit(function (event)
  {
//    var zh = $('input:eq(0)').val();
////    alert(zh);
//    var mm = $('input:eq(1)').val();
////    alert(mm);
//    var info = 'name='+zh+'&pwd='+mm;
////    alert(info);
    var fd = new FormData(this);
    
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function ()
    {
      if (xhr.readyState == 4)
      {
        alert(xhr.responseText);
      }
    };
    xhr.open('post' , './01data.php');
//    xhr.setRequestHeader('content-type' , 'application/x-www-form-urlencoded');
    xhr.send(fd);
    event.preventDefault();
  });
</script>
</html>