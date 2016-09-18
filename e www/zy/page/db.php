<?php 
function DB($sql='')
 {
       if($sql=='')
       {
        return false;
       }
         //建立链接,从小到大的闭区间
        $con=mysqli_connect('localhost','root','','hw20160915');
        //判断是查询语句
        if(mysqli_connect_errno($con))
        {
           die('错误信息'.mysqli_connect_error($con));
        }
        
        $res=mysqli_query($con,$sql);
        $sql=strtolower($sql);
        //如果是查询语句
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