<?php 

//mm的配置项目，配置此项目需要将session.save_handler = files改为session.save_handler =user
// ini_set('session.save_handler','memcache');
// ini_set('session.save_path','tcp://192.168.0.242:11211');
// include '../Config/config.php';
$con=mysqli_connect(HOST,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DATABASE);
//连接时都有错误直接die
if(mysqli_connect_errno($con))
die('错误信息'.mysqli_connect_error($con));

function DB($sql='')
 {
        global $con;
       if($sql=='')
       return false;
       
       //转换为小写
        $sql=strtolower($sql);

       //如果执行有错误的话返回错误的代码
       if ($errno = mysqli_errno($con))
            return '错误码:'.$errno.',错误信息:'.mysqli_error($con);



        //执行没有错误，将结果存储到$res中
        $res=mysqli_query($con,$sql);
        
        //根据语句的类型，解析返回的数据，
                if(substr_count($sql,'select'))
                {
                     $row=array();
                     $rows=array();
                     while($row=mysqli_fetch_array($res,1))
                     {
                       $rows[]=$row;
                     }
                     return $rows;
                 }
                 elseif(substr_count($sql,'insert'))
                 {
                   return mysqli_insert_id($con);
                 }
                 else
                 {
                    return mysqli_affected_rows($con);
                 }
 }



 ?>