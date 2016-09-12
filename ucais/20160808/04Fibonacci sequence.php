<?php
	header("Content-Type:text/html;charset=utf-8");
	
	echo '斐波那契数列:';
	$arrF =  range (2 , 1000 ,1 );
	$arrF2 = array(0,1,1);
	foreach ($arrF as $k => $v)
	{
		$a = count($arrF2);
		if ($v == ($arrF2[$a-1] + $arrF2[$a-2])) $arrF2[] = $v;	
	}
	foreach ($arrF2 as $key => $value) {
		echo $value.' ';	
	}



	echo '<hr>';
	$c = 1;
	for($b = 0;$b < 1000;  )
	{
	    echo $b.' ';
	    $b = $b + $c;
	    $c = $b - $c;
	}


?>