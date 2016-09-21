<?php

header('Content-type:text/html;charset=utf-8');


session_start();

$con = mysqli_connect('localhost' , 'root' , '' , 'homework');

if(mysqli_connect_errno($con))  //链接产生错误时,返回的错误码
    die('错误信息:'.mysqli_connect_error($con)); //返回上一条错误的错误信息

mysqli_query($con , 'set names utf8');

date_default_timezone_set('PRC'); //设置时区

//帮助我们处理增删改查语句
function DB($sql = '' , $type = MYSQLI_ASSOC){
    global $con;
    if($sql == '')
        return false;
    $res = mysqli_query($con , $sql);

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
        return mysqli_insert_id($con); //返回上一条 insert 语句的自增ID
    }else{
        $affected = mysqli_affected_rows($con); //如果SQL执行失败会返回 -1,所以处理一下
        return $affected >= 0 ? $affected : '0'; //返回影响行数
    }
}


