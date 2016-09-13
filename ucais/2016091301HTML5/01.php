<?php
header("Content-Type:text/html;charset=utf-8");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  
  <style>
    
    *{
      margin: 0;
      padding: 0;
    }
    
    header{
      height: 80px;
      background: tomato;
    }
    
    footer{
      height: 180px;
      background: aqua;
    }
    
    #divmiddle{
      height: 500px;
      background: gold;
    }
    
  </style>
  
</head>
<body>

<header>header</header>

<div id="divmiddle">
  <nav id="divleft">divleft</nav>
  <article>
    <form>
      <input type="email" required placeholder="email">
      <input type="number" placeholder="price">
      <input type="range" placeholder="range">
      <input type="color" name="color" placeholder="color">
      <input type="date" placeholder="date">
      <input type="text" placeholder="3个字母" required pattern="[a-zA-Z]{3}">
      <input type="submit">
    </form>
  </article>
</div>

<footer>footer</footer>

<!--//HTML5语义标签代替div，含义更加明确，但不能取代样式-->
<!--//改用HTML5表单元素，代替js校验，ie8以下不支持-->

</body>

<script>

</script>

</html>
