<?php
   include './config.php';
   include './db.php';
   $sql='select * from lunbo';
   $res=db($sql);
   exit(json_encode($res));
