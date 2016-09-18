<?php 
 include 'db.php';
$username=$_POST['username'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$sql="insert into users values(null,'$username','$password','$phone')";
$res=DB($sql);

if($res!=0)
{
  echo 1;
}
else
{
  echo 0;
}


 ?>