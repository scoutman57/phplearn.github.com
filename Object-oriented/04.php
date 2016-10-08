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
  <title>构造方法和析构方法调用上级同类方法的问题</title>
</head>
<body>
<?php
class a{
  function __construct()
  {
    echo "父类中的构造方法.<br>";
	var_dump($this);
  }
}

class b extends a{
  function __construct()
  {
	echo "子类中的构造方法.<br>";
	var_dump($this);
  }
}

class c extends a{
  //	这类中没有构造方法
}

$obj1 = new b();
$obj2 = new c();
?>
</body>
</html>