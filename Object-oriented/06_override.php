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
  <title>覆盖 / 重写</title>
</head>
<body>
<?php
//	动物类
class animal{
  public $p1 = '进食';
  function move(){
    echo "能移动身体!<br>";
  }
}

//	鱼类
class fish extends animal {
  public $skin = '布满鱼鳞';
  //	覆盖父类的同名属性
  public $p1 = '鱼的进食';
  //	覆盖父类的同名方法
  function move(){
	echo "摆动尾巴前进!<br>";
  }
}

//	鸟类
class bird extends animal {
  public $skin = '布满羽毛';
  //	覆盖父类的同名属性
  public $p1 = '鸟的进食';
  //	覆盖父类的同名方法
  function move(){
	echo "煽动翅膀飞翔前进!<br>";
  }
}
?>
</body>
</html>
