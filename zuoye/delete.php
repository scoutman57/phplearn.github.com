<?php
   include './config.php';
   include './db.php';
   $item=$_POST['items'];
   $sql="delete from lunbo where id in ($item)";
   $res=db($sql);
   echo $res;