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
  <title>继承</title>
</head>
<body>
<?php
class a{
  public $p1 = "这是a中属性";
  
  function f1()
  {
    echo "<br>这是a中方法<br>";
  }
}

class b extends a{
  public $p2 = "这是b中属性";
}

$b1 = new b();
echo $b1 -> p1;
$b1 -> f1();
?>
</body>
</html>