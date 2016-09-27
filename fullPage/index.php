<?php
header("Content-Type:text/html;charset=utf-8");


?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="jquery.fullPage.css">
<!--  <script src="jquery3.1.0.js"></script>-->
<!--  <script src="jquery.fullPage.js"></script>-->
  <style>
    /*.section{*/
      /*width: 100%;*/
      /*height: 100%;*/
    /*}*/
    .div1{
      background: tomato;
    }
    .div2{
      background: aqua;
    }
    .div3{
      background: tomato;
    }
    .div4{
      background: aqua;
    }
    div{
      text-align: center;
      font-size: 3rem;
    }
  </style>
  <title>fullPage</title>
</head>
<body>
<div id="fullpage">
  <div class="section active div1">Some section1</div>
  <div class="section  div2">
    <div class="slide"> Slide 1 </div>
    <div class="slide"> Slide 2 </div>
    <div class="slide"> Slide 3 </div>
    <div class="slide"> Slide 4 </div>
  </div>
  <div class="section  div3">Some section3</div>
  <div class="section  div4">Some section4</div>
</div>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>-->
<script type="text/javascript" src="jquery3.1.0.js"></script>

<script type="text/javascript" src="jquery.fullPage.js"></script>
<script>
  $(document).ready(function() {
    $('#fullpage').fullpage();
  });
</script>
</body>
</html>