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
	<title>mysql</title>
</head>
<body>
<?php
class MySQLDB{
	public $con = null;
	function __construct($host , $port , $user , $pass , $dbname)
	{
		$this->con = mysqli_connect("$host:$port" , "$user" , "$pass");
		mysqli_select_db($this->con , $dbname);
		mysqli_query($this->con , 'set names utf8');
		if ($errno = mysqli_errno($this->con))
			return '错误码:'.$errno.',错误信息:'.mysqli_error($this->con);
	}
	
	//	可以设定要使用的连接编码
	function setCharset($charset)
	{
		mysqli_query($this->con , "set names $charset");
	}
	
	//	使用默认数据库 , 也可以改成指定数据库
	function operationDB($sql , $dbname2 = '' , $type = MYSQLI_ASSOC)
	{
		if ($dbname2 != '')
		{
			echo $dbname2;
			mysqli_select_db($this->con , $dbname2);
		}
		
		if($sql == '')
			return false;
		$res = mysqli_query($this->con , $sql);
		
		if ($errno = mysqli_errno($this->con))
			return '错误码: ' . $errno . ' 错误信息: ' . mysqli_error($this->con);
		
		$sql = strtolower($sql);
		if(substr_count($sql , 'select'))
		{
			$rows = array();
			//返回结果集中的一条信息,MYSQLI_ASSOC 关联数组返回 MYSQLI_NUM 索引数据返回
			while($row = mysqli_fetch_array($res , $type))
			{
				$rows[] = $row;
			}
			return $rows;
		}elseif(substr_count($sql , 'insert')){
			return mysqli_insert_id($this->con); //返回上一条 insert 语句的自增ID
		}else{
			$affected = mysqli_affected_rows($this->con); //如果SQL执行失败会返回 -1,所以处理一下
			return $affected >= 0 ? $affected : '0'; //返回影响行数
		}
	}
	
	function closeDB()
	{
		mysqli_close($this->con);
	}
	
	function __destruct()
	{
		mysqli_close($this->con);
	}
}

$host = 'localhost';
$port = 3306;
$user = 'root';
$pass = '';
$dbname = 'blog';
$db = new MySQLDB($host , $port , $user , $pass , $dbname);
//$db->setCharset('gbk');
$sql = 'select * from lunbo';
$res = $db->operationDB($sql);
var_dump($res);
?>
</body>
</html>
