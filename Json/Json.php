<?php
header("Content-Type:text/html;charset=utf-8");




$arr = array('a' => 'A' , 'b' => 'B');
var_dump($arr);
$json = json_encode($arr);
var_dump($json);
$obj = json_decode($json);
var_dump($obj);
var_dump($obj->a);
$obj = json_decode($json , true);
var_dump($obj);

class person{
  public $name = 'z';
  public $age = '10';
}

$per = new person();
var_dump($per);
$json = json_encode($per);
var_dump($json);
//$json = "{'name':'z','age':'12'}";
$json = '{"name":"z","age":"12"}';
var_dump($json);
$arr = json_decode($json , true);
var_dump($arr);

