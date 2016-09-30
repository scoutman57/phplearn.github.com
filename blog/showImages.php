<?php
header("Content-Type:text/html;charset=utf-8");

include './public/func.php';
//var_dump($_GET)
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/jquery.fullPage.css">
  <style>
	.section img{
	  width: 100%;
	  height: 100%;
	}
  </style>
  <title>Document</title>
</head>
<body>
<div id="fullpage">
  <?php
  $sql = "select * from picture where picid={$_GET['picid']}";
  $image = DB($sql)[0];
  echo "
  <div class=\"section active div1\"><img src='images/{$image['local_route']}' alt=''></div>
  ";

  $sql = "select * from picture where picid != {$_GET['picid']} && status = 1";
  $image = DB($sql);
  for ($i = 0 ; $i < count($image) ; $i++)
  {
	echo "
  <div class=\"section\"><img src='images/{$image[$i]['local_route']}'></div>
  ";
  }
  var_dump($image);
  ?>
<!--  <div class="section active div1">Some section1</div>-->
<!--  <div class="section  div2">Some section2</div>-->
<!--  <div class="section  div3">Some section3</div>-->
<!--  <div class="section  div4">Some section4</div>-->
</div>
</body>
<script type="text/javascript" src="./js/jquery3.1.0.js"></script>
<script type="text/javascript" src="./js/jquery.fullPage.js"></script>
<script>
  $(document).ready(function() {
	$('#fullpage').fullpage();
  });
</script>
</html>