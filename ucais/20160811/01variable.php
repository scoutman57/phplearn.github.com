<?php
	header("Content-Type:text/html;charset=utf-8");

	$_SERVER['my'] = 'my';

	//预定义服务变量
	var_dump($_SERVER);


	echo $_SERVER['DOCUMENT_ROOT'].'<br>';

	echo '<hr>';

	var_dump($_ENV);//会打印系统信息,尽量不要开启,如果要开启,在php.ini里搜索 variables_order

	// $_GET		//通过 URL 参数传递给当前脚本的变量的数组
	// $_POST	//通过 HTTP POST 方法传递给当前脚本的变量的数组
	// $_FILES		//通过 HTTP POST 方式上传到当前脚本的项目的数组
	// $_COOKIE	//通过 HTTP Cookies 方式传递给当前脚本的变量的数组


	echo '<hr>';
	// $num = 0;
	// if(isset($_GET['num']))
	// 	$num = $_GET['num'];

	$num = false;//empty可以判断 '0'   ''  0  array()  null false 都为空

	if (!empty($num))
		$num = 'num不为空';


	var_dump($num);

	// isset();//检测变量是否定义

	// empty();//检测变量值是否为空






	//POST----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	echo '<hr>';
	echo 'POST<br><br><br>';

	var_dump($_POST);//post
	// var_dump($_POST['num1']);
	// var_dump($_POST['num2']);
	// echo  (int)$_POST['num1'] . '$_POST['fu']' . (int)$_POST['num2'];
	if($_POST['fu'] == '/' && (int)$_POST['num2'] == 0)
	{
		echo '除数不能为0';
	}
	elseif (!empty($_POST['num1']) && !empty($_POST['num2']))
		countf($_POST);
	else
	{
		echo '请输入两个正确的数';
	}

	function countf($array)
	{
		switch ($array['fu']) {
			case '+':
				echo $array['num1'].'+'.$array['num2'].'='.($array['num1']+$array['num2']);
				break;
			case '-':
				echo $array['num1'].'-'.$array['num2'].'='.($array['num1']-$array['num2']);
				break;
			case '*':
				echo $array['num1'].'*'.$array['num2'].'='.($array['num1']*$array['num2']);
				break;			
			case '/':
				echo $array['num1'].'/'.$array['num2'].'='.($array['num1']/$array['num2']);
				break;
			default:
				echo $array['num1'].'%'.$array['num2'].'='.($array['num1']%$array['num2']);
				break;
		}
	}


	// function countf ($array)
	// {		
	// 	echo $array['num1'].$array['fu'].$array['num2'].'='.($array['num1']$array['fu']$array['num2']);
	// }



?>

<form action = "" method = "post"><!--post-->

	<input type="text" name="num1" value="">
	
		<select name="fu"> 
			<option value="+">+</option>
			<option value="-">-</option>
			<option value="*">*</option>
			<option value="/">/</option>
			<option value="%">%</option>		
		</select>
	
	<input type="text" name="num2" value="">
	<input type="submit" name="sub" value="计算">

</form>
	<div style="height:500"></div>






	<!-- var_dump($_REQUEST);
	//定义成函数方式
	//
	// echo $_POST['num1'];
	
	$num1 = isset($_POST['num1']) ? $_POST['num1'] : '';
	$num2 = isset($_POST['num2']) ? $_POST['num2'] : '';
	$fu = isset($_POST['fu']) ? $_POST['fu'] : '+';
	function jisuan($fu , $num1 , $num2){
		if(!$fu)
			return '符号不能为空!';
		if(!$num1 && $num1 != '0')
			return '数值1不能为空!';
		if(!$num2 && $num2 != '0')
			return '数值2不能为空!';
		if(!is_numeric($num1) || !is_numeric($num2))
			return '请输入数字进行计算';
		$res = '';
		switch ($fu) {
			case '+':
				$res = $num1 + $num2;
				break;
			case '-':
				$res = $num1 - $num2;
				break;
			case '*':
				$res = $num1 * $num2;
				break;
			case '/':
				$res = $num2 != 0 ? $num1 / $num2 : '除数不能为0';
				break;
			case '%':
				$res = $num2 != 0 ? $num1 % $num2 : '除数不能为0';
				break;
		}
		return $res;
	}
	if($_POST)
		echo jisuan($fu , $num1 , $num2);
?>
 <form action="" method="post">
	<p><input type="text" name="num1" value="<?php echo $num1 ?>"></p>
	<p>
		<select name="fu">
			<option value="+" <?php if($fu == '+') echo 'selected="selected"' ?>>+</option>
			<option value="-" <?php if($fu == '-') echo 'selected="selected"' ?>>-</option>
			<option value="*" <?php if($fu == '*') echo 'selected="selected"' ?>>*</option>
			<option value="/" <?php if($fu == '/') echo 'selected="selected"' ?>>/</option>
			<option value="%" <?php if($fu == '%') echo 'selected="selected"' ?>>%</option>
		</select>
	</p>
	<p><input type="text" name="num2" value="<?php echo $num2 ?>"></p>
	<p><input type="submit" name="sub" value="计算"></p>
</form> -->