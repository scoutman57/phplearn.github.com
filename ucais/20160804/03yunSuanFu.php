<?php
	header("Content-Type:text/html;charset=utf-8");


	//算数运算符

	// + - * / %
	$a = 1;
	$b = 2;

	$a = 8;
	$b = 3;

	echo $a + $b; 
	echo '<br>';
	echo $a - $b; 
	echo '<br>';
	echo $a * $b; 
	echo '<br>';
	echo $a / $b; 
	echo '<br>'; 
	echo $b % $a; 
	echo '<br>';
	echo -$a * -$b; 



	//字符串运算符
	$a = 'hello';
	$b = 'word';
	$c = 1;
	$d = 5;
	echo $a.$b.'<br>';
	$a .= $b;
	echo $a.'<br>';
	$c += $d;
	echo $c.'<br>';//6
	$c *= $d;
	echo $c.'<br>';//30
	$c /= $d;
	echo $c.'<br>';//6
	$c %= $d;
	echo $c.'<br>';


	$c = 1;
	$d = 5;

	$c *= $c /= $c += $d %= $c;//1
	echo $c;

	$a = 10;
	$b = '10';

	var_dump($a ===$b);

	if ($a = 15)
	{
		echo '成立';
	}else
	{
		echo '不成立';
	}

	var_dump(true !== 1);//true



	$a = 10;
	$b = '10';

	var_dump($a === $b);

	if($a = 1)
	{
		echo '这个条件成立!';
	}else{
		echo '条件不成立';
	}

	var_dump(true !== 1 );

	var_dump('0' == 0);

	echo "<hr>";

	$a = null;
	$b = 0;
	var_dump($a == $b);//true
	var_dump($a === $b);//false

	$a = null;
	$b = '0';
	var_dump($a == $b);//false
	var_dump($a === $b);//false

	$a = null;
	$b = '';
	var_dump($a == $b);//true
	var_dump($a === $b);//false

	echo "<hr>";

	var_dump(null == 0);//true
	var_dump('' == 0);//true
	var_dump('' == null);//true
	var_dump('0' == 0);//true
	var_dump(null === 0);//false
	var_dump('0' === 0);//false
	var_dump(null == '0');//false
	var_dump(null == '1');//false
	var_dump(null == false);//true
	var_dump(false == '0');//true
	var_dump(false == 0);//true
	var_dump('a' == 'b');//false
	var_dump('');//string '' (length=0)
	var_dump(0);//int 0
	var_dump('0');//string '0' (length=1)
	var_dump(null);//null


	echo "<hr>";

	//逻辑运算符

	//与 关系
	// true && true 真

  $a = 10;
  $b = 20;
   if(($a = 5) && $b > $a && $a <= 10)
   {
     var_dump($a);
   }else {
     echo "条件为假";
   }
    if($a = 5 && $b > $a && $a <= 10)
    {
      var_dump($a);
    }else {
      echo "条件为假";
    }
   echo "<hr>";

   if($b >$a && ($a = 10))
   {
     echo "条件为真时输出".$a;
   }else {
     echo "条件为假时输出".$a;
   }

   echo "<hr>";

   //或者关系 || or

   $c = 'hello';
   $d = '20';


   echo "<hr>";
   //非关系 去反 !

   $a = 10;
   var_dump(!$a);
   if (!$a = 5) {
   		echo "111111111111";
   		var_dump($a);
   }else  {
   		echo "222222222222";
   		var_dump($a);
   }



   echo "<hr>";
   //异或关系
   //xor
   //true xor true     假
   //flase xor true     真
   //true xor flase     真
   //false xor flase     假


   if (true xor false) {
   		echo "11111";
   }else{
   		echo "22222";
   }

   $a = 6;
   $b = 5;
   $c = $a++ + ++$b;
   $d = --$c + $b--;
   $e = $d++ + ++$c;
   echo "<br>";
   echo $e;//29

   echo "<br>";
   $x = 5;
   $y = ($x++);
   // $y = ++$x;
   echo $y;



   echo "<hr>";




   //类型转换-临时转换
   var_dump(intval($str = '123'));
   var_dump(intval($float = 123.45));


   var_dump(strval($float));
   var_dump(strval($int = 666));

   var_dump(floatval($int));
   var_dump(floatval($str));

   var_dump(boolval($int));
   var_dump(boolval($str));

   unset($int);
   unset($str);



   var_dump((array)$float);
   var_dump((array)$int = 2);

   var_dump((object)$int);
   var_dump((object)$float);


   //永久转换
   $str = '1235';

	var_dump($str);

	echo gettype($str).'<hr>';

	settype($str, 'integer');

	var_dump($str);
	echo gettype($str).'<hr>';


	settype($str, 'float');

	var_dump($str);
	echo gettype($str).'<hr>';

	settype($str, 'bool');

	var_dump($str);
	echo gettype($str).'<hr>';

	settype($str, 'array');

	var_dump($str);
	echo gettype($str).'<hr>';

	settype($str, 'object');

	var_dump($str);//object(stdClass)[6]public 0 => boolean true
	echo gettype($str).'<hr>';

	settype($str, 'null');

	var_dump($str);
	echo gettype($str).'<hr>';


	$str2 = '1234';

	settype($str2, 'integer');
	var_dump($str2);

	$str3 = strval($str2);
	var_dump($str3);

	$str = '1235';

	var_dump($str);

	echo gettype($str).'<hr>';

	settype($str, 'integer');

	var_dump($str);
	echo gettype($str).'<hr>';


	settype($str, 'float');

	var_dump($str);
	echo gettype($str).'<hr>';

	settype($str, 'bool');

	var_dump($str);
	echo gettype($str).'<hr>';

	settype($str, 'array');

	var_dump($str);
	echo gettype($str).'<hr>';

	settype($str, 'object');

	var_dump($str);//object(stdClass)[6]public 0 => boolean true
	echo gettype($str).'<hr>';

	settype($str, 'null');

	var_dump($str);
	echo gettype($str).'<hr>';


	$str2 = '1234';

	settype($str2, 'integer');
	var_dump($str2);

	$str3 = strval($str2);
	var_dump($str3);


	echo "<hr>";

	//数据类型检查
	$int = 123;
	$str = 'abc';
	$float = 46.78;
	$bool = true;
	$null = '';
	$array = array(1,2,3,4,5);
	

	var_dump(is_int($int));
	var_dump(is_int($str));


	var_dump(is_float($int));
	var_dump(is_float($float));

	var_dump(is_bool($int));
	var_dump(is_bool($bool));

	var_dump(is_string($int));
	var_dump(is_string($str));

	var_dump(is_null($int));
	var_dump(is_null($null));

	var_dump(is_array($int));
	var_dump(is_array($array));


	var_dump(is_resource($int));
	var_dump(is_resource($array));

	var_dump(is_object($int));
	var_dump(is_object($array));

	var_dump(is_scalar($int));
	var_dump(is_scalar($array));

	var_dump(is_numeric($int));
	var_dump(is_numeric($array));


	//算术运算符
	$a = 10;
	$b = 20;

	var_dump($a + $b);
	var_dump($a + $b);

	var_dump($a - $b);
	var_dump($a - $b);

	var_dump($a * $b);
	var_dump($a * $b);


	var_dump($a / $b);
	var_dump($a / $b);


	var_dump($a % $b);
	var_dump($a % $b);


	//字符串运算符

	$c = 'abc';
	$d = 'fff';

	$a = 'hello';
	$b = 'word';
	$c = 1;
	$d = 5;
	echo $a.$b.'<br>';
	$a .= $b;
	echo $a.'<br>';
	$c += $d;
	echo $c.'<br>';//6
	$c *= $d;
	echo $c.'<br>';//30
	$c /= $d;
	echo $c.'<br>';//6
	$c %= $d;
	echo $c.'<br>';


	$c = 1;
	$d = 5;

	$c *= $c /= $c += $d %= $c;//1
	echo $c;

	$a = 10;
	$b = '10';

	var_dump($a ===$b);

	if ($a = 15)
	{
		echo '成立';
	}else
	{
		echo '不成立';
	}

	var_dump(true !== 1);//true



	$a = 10;
	$b = '10';

	var_dump($a === $b);

	if($a = 1)
	{
		echo '这个条件成立!';
	}else{
		echo '条件不成立';
	}

	var_dump(true !== 1 );

	var_dump('0' == 0);

	echo "<hr>";

	$a = null;
	$b = 0;
	var_dump($a == $b);//true
	var_dump($a === $b);//false

	$a = null;
	$b = '0';
	var_dump($a == $b);//false
	var_dump($a === $b);//false

	$a = null;
	$b = '';
	var_dump($a == $b);//true
	var_dump($a === $b);//false

	echo "<hr>";

	var_dump(null == 0);//true
	var_dump('' == 0);//true
	var_dump('' == null);//true
	var_dump('0' == 0);//true
	var_dump(null === 0);//false
	var_dump('0' === 0);//false
	var_dump(null == '0');//false
	var_dump(null == '1');//false
	var_dump(null == false);//true
	var_dump(false == '0');//true
	var_dump(false == 0);//true
	var_dump('a' == 'b');//false
	var_dump('');//string '' (length=0)
	var_dump(0);//int 0
	var_dump('0');//string '0' (length=1)
	var_dump(null);//null


	echo "<hr>";



	//逻辑运算符

	//与 关系
	// true && true 真

  $a = 10;
  $b = 20;
   if(($a = 5) && $b > $a && $a <= 10)
   {
     var_dump($a);
   }else {
     echo "条件为假";
   }
    if($a = 5 && $b > $a && $a <= 10)
    {
      var_dump($a);
    }else {
      echo "条件为假";
    }
   echo "<hr>";

   if($b >$a && ($a = 10))
   {
     echo "条件为真时输出".$a;
   }else {
     echo "条件为假时输出".$a;
   }

   echo "<hr>";

   //或者关系 || or

   $c = 'hello';
   $d = '20';


   echo "<hr>";
   //非关系 去反 !

   $a = 10;
   var_dump(!$a);
   if (!$a = 5) {
   		echo "111111111111";
   		var_dump($a);
   }else  {
   		echo "222222222222";
   		var_dump($a);
   }



   echo "<hr>";
   //异或关系
   //xor
   //true xor true     假
   //flase xor true     真
   //true xor flase     真
   //false xor flase     假


   if (true xor false) {
   		echo "11111";
   }else{
   		echo "22222";
   }

   $a = 6;
   $b = 5;
   $c = $a++ + ++$b;
   $d = --$c + $b--;
   $e = $d++ + ++$c;
   echo "<br>";
   echo $e;//29

   echo "<br>";
   $x = 5;
   $y = ($x++);
   // $y = ++$x;
   echo $y;















	echo "<hr>";
	//---------------------------------------------------------------------------------------------------

	//进制转换
	echo "十进制转二进制decbin()函数<br>";
	echo decbin(12);//1100
	echo "<br>";
	$int = 100;
	echo decbin($int).'<br>';



	echo "十进制转八进制<br>";
	echo decoct(15).'<br>';//17
	echo decoct(264); //410 
	var_dump(decoct(15));//string '17' (length=2)


	echo "十进制转十六进制<br>"; 

	echo dechex(10).'<br>'; //输出 a 
	echo dechex(47).'<br>'; //输出 2f 



	echo "二进制转十六进制<br>"; 

	$binary = "11111001"; 
	$aaa = dechex(bindec($binary)); 
	echo $aaa;//输出f9 


	echo "二进制转十进制 <br>"; 

	echo bindec('110011'); //输出 51 
	echo bindec('000110011'); //输出 51 
	echo bindec('111'); //输出 7 


	echo "八进制转十进制 <br>"; 

	echo octdec('77'); //输出 63 
	echo octdec(decoct(45)); //输出 45 



	echo "十六进制转十进制 <br>"; 

	var_dump(hexdec("See")); 
	var_dump(hexdec("ee")); 
	// both print "int(238)" 
	
	var_dump(hexdec("that")); // print "int(10)" 
	var_dump(hexdec("a0")); // print "int(160)" 



	echo "任意进制转换 <br>"; 

	$hexadecimal = 'A37334'; 
	echo base_convert($hexadecimal, 16, 2);//输出 101000110111001100110100 
	// base_convert 
	echo "<br>说明 
	string base_convert ( string number, int frombase, int tobase ) 
	返回一字符串，包含 number 以 tobase 进制的表示。number 本身的进制由 frombase 指定。frombase 和 tobase 都只能在 2 和 36 之间（包括 2 和 36）。高于十进制的数字用字母 a-z 表示，例如 a 表示 10，b 表示 11 以及 z 表示 35。<br>";

	echo "number	必需。原始值。
	frombase	必需。数字原来的进制。
	tobase	必需。要转换的进制。<br>";




	echo "<hr>";
	//-------------------------------------------------------------------------------
	//位运算符


	$a = 22;
	$b = 33;

	//& And（按位与） 将把 $a 和 $b 中都为 1 的位设为 1
	$a & $b;

	var_dump($a & $b);
























?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div style="width:500px;height:500px">

    </div>
  </body>
</html>
