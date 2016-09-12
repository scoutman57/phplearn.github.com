<?php
header("Content-Type:text/html;charset=utf-8");


veryGood();


function veryGood()
{
	echo str_repeat('*', 20).'<br>'.str_repeat('&nbsp', 4).'Very'.'&nbsp'.'Good!'.'<br>'.str_repeat('*', 20);	
}


echo '<hr>';
$array = range('a', 'z');
$array2 = range('A', 'Z');
$array = array_merge($array , $array2);

$array2 = range('e', 'z');
$array3 = range('e', 'Z');
$array4 = array('a', 'b', 'c', 'd');
$array5 = array('A', 'B', 'C', 'D');
$array2 = array_merge($array2 , $array4 , $array3 , $array5);

var_dump($array , $array2);

echo str_replace($array, $array2, 'China');
?>