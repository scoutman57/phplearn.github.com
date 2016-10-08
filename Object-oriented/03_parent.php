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
  <title>parent</title>
</head>
<body>
<?php
//	parent 关键词演示
class a{
  //	没有写访问修饰符 , 就是public
  static $p1 = 1;
  static protected $p2 = 2;
}

class b extends a{
  static function Show(){
    echo "b中的方法<br>";
	echo parent::$p1 . "<br>";
	echo parent::$p2 . "<br>";
	echo a::$p1 . "<br>";
	echo a::$p2 . "<br>";
}
}
//	静态方法直接使用类名来调用
b::Show();

class c{
  public $p1 = 1;
  function showc(){
    echo 'c中的属性 : ' . $this -> p1;
  }
}

class d extends c{
  function show(){
    echo '父类中的实例方法 : ';
	parent::showc();
  }
}

$d1 = new d();
$d1 -> show();
?>
</body>
</html>