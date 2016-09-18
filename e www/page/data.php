<?php
header("Content-Type:text/html;charset=utf-8");


//制作传统分页效果，链接数据库，获得数据，分页显示
$con = mysqli_connect('localhost:3306' , 'root' , '' , 'hw20160915');
mysqli_query($con , 'set names utf8');



//实现数据分页
//1.引入分页类
include ('page.class.php');

//2.获得总记录的条数
$sql = 'select * from goods';
$res = mysqli_query($con , $sql);
$total = mysqli_num_rows($res);
$per = 7;

//3.实例化分页对象
$page_obj = new Page($total , $per);

//4.直走sql语句获得每页信息
//$page_obj->limit:分页类会根据当前的页码把limit 偏移量，长度 给制作好
$sql3 = "select * from goods ".$page_obj->limit;
$res3 = mysqli_query($con , $sql3);

//5.获得页码列表
$pageList = $page_obj->fpage(array(3,4,5,6,7,8));

echo <<<eof
  <style>
    table{width:1200px;margin:auto;border:1px solid black;border-collapse:collapse;font-size:1.5rem}
    td{border:1px solid black}
  </style>
  <table>
    <tr><td>ID</td><td>名字</td><td>路径</td></tr>
eof;

 
while ($arr = mysqli_fetch_array($res3))
{
  echo '<tr><td>'. $arr['id'] .'</td><td>'. $arr['goodsname'] .'</td><td>'. $arr['goodsimg'] .'</td></tr>';
}
echo "<tr><td colspan='3'>$pageList</td></tr>";
echo '</table>';
?>

