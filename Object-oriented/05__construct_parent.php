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
  <title>Document</title>
</head>
<body>
<?php
//	公司成员
class member{
  public $name = '匿名';
  public $age = 18;
  public $sex;
  function show(){
	echo "姓名 : {$this -> name}<br>";
	echo "年龄 : {$this -> age}<br>";
	echo "性别 : {$this -> sex}<br>";
  }
  function __construct($name , $age , $sex)
  {
	$this -> name = $name;
	$this -> age = $age;
	$this -> sex = $sex;
  }
}
//	讲师类
class teacher extends member {
  public $edu = '大学';
  public $major;
  function __construct($name , $age , $sex , $edu , $major)
  {
	//$this -> name = $name;
    //$this -> age = $age;
    //$this -> sex = $sex;
	//	以上三行 (若干行) , 被下面一行代替
	parent::__construct($name , $age , $sex);
	$this -> edu = $edu;
	$this -> major = $major;
  }
  function show(){
	echo "姓名 : {$this -> name}<br>";
	echo "年龄 : {$this -> age}<br>";
	echo "性别 : {$this -> sex}<br>";
	echo "学历 : {$this -> edu}<br>";
	echo "专业 : {$this -> major}<br>";
  }
}
$t1 = new teacher('张三' , 30 , '男' , '大学' , 'PHP');
$t1 -> show();
?>
</body>
</html>