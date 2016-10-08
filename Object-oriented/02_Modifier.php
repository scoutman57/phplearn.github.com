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
  <title>修饰符</title>
</head>
<body>
<?php
class a{
  public $p1 = 1;
  protected $p2 = 2;
  private  $p3 = 3;
}

$a1 = new a();
echo "p1 = " . $a1 -> p1 . "<br>";
//echo "p2 = " . $a1 -> p2 . "<br>";
//echo "p3 = " . $a1 -> p3 . "<br>";
?>
</body>
</html>