<?php
include 'db.php';
 $pageindex=$_POST['pageindex']?$_POST['pageindex']:1;
 $pagesize=6;
 $res=DB("select * from goods");
 $start=($pageindex-1)*$pagesize;
 $pageCount=count($res)%$pagesize?ceil(count($res)/$pagesize):count($res)/$pagesize;	
 $sql="select * from goods limit  $start,$pagesize";
 $result=DB($sql);
 $result[]=array("pageCount"=>$pageCount);
 exit(json_encode($result));
