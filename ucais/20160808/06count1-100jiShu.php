<?php
	header("Content-Type:text/html;charset=utf-8");


	$j = 0;
	echo '1-100奇数的合计';
	for ($i = 1; $i <= 100; $i++)
	{
		if($i % 2 != 0)
		{
			$j += $i;
		}		
	}	
?>