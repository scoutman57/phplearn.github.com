<?php
header("Content-Type:text/html;charset=utf-8");

//帮助我们处理增删改查语句
//MYSQL_NUM 以索引数组返回
//MYSQL_ASSOC 以关联数组返回
function DB($sql = '' , $type = MYSQLI_ASSOC)
{
    if ($sql == '')
        return false;

    //mysqli_connect($host , $user , $password [, $db_name]);
    //- 连接成功返回MySQL连接标识符，失败时返回false
    $con = mysqli_connect('localhost', 'root', '', 'db_hw20160826');


    //mysqli_connect_errno($connect)
    //- 取得上一个MySQL操作中的错误信息的数字编码
    //mysqli_connect_error($connect)
    //- 取得MySQL操作产生的文本错误信息
    if (mysqli_connect_errno($con))
        die('错误信息:' . mysqli_connect_error($con));

    mysqli_query($con, 'set names utf8');

    //mysqli_query($connect, $sql);
    //注意：
    //- 对于SELECT、DESC、SHOW的关键字的查询，执行成功返回结果集，执行失
    //败返回假；
    //- 对于其它操作（添加、修改、删除等），执行成功返回TRUE,失败返回FALSE
    $res = mysqli_query($con, $sql);

    $sql = strtolower($sql);

    //mysqli_fetch_array($result , $type)
    //- 取得结果集中一条记录作为关联和索引数组返回
    if (substr_count($sql , 'select'))
    {
        $rows = array();
        while ($row = mysqli_fetch_array($res, $type))
        {
            $rows[] = $row;
        }
        return $rows;
    }

    //mysqli_insert_id($connect)
    //- 返回上一步INSERT操作产生的自增的值
    elseif (substr_count($sql , 'insert'))
        return mysqli_insert_id($con);

    //mysqli_affected_rows($connect)
    //- 返回上一步更新、删除操作影响行数
    else
        return mysqli_affected_rows($con);
}
$sql = 'select u.id,u.username,u.phone,u.gender,u.pass_time,s.chinese,s.math,s.english from users u,score s WHERE u.id=s.uid';
var_dump($sql);
var_dump(DB($sql));
//$sql = 'delete from classes where id BETWEEN 3 AND 9';

//for ($i = 1 ; $i <= 10 ; $i++)
//{
//    $sql = 'insert into classes VALUES (NULL , "班级'.$i.'" , "描述'.$i.'")';
//    var_dump(DB($sql));
//}


//$sql = 'delete from classes where id NOT BETWEEN 14 AND 17';
//var_dump(DB($sql));

//id = 14 || 15 || 16;
//$sql = 'delete from classes where id IN (14 , 15 , 16)';
//var_dump(DB($sql));

//$sql = 'delete from classes where id NOT IN (24 , 25)';
//var_dump(DB($sql));


//$sql = 'delete from classes where id NOT IN (24 , 25)';
//var_dump(DB($sql));

//$sql = 'select * from classes where id BETWEEN 1 AND 20 && title LIKE "%PHP%"';
//var_dump(DB($sql));

//$sql = 'select * from classes WHERE title like "%班级%" LIMIT 5 , 3';
//var_dump(DB($sql));

//统计数据总数
//$sql = 'select COUNT(*) as count FROM classes';

//$arr = array();
//for ($i = 1 ; $i <= 20 ; $i++)
//{
//    $arr[] = '(NULL , '.$i.','.(rand(600,1500)/10).','.(rand(600,1500)/10).','.(rand(600,1500)/10).')';
//}
//$sql = 'insert into score VALUES '.implode(',' , $arr);

//统计平均数,总和,最小值,最大值
//$sql = 'select avg(chinese) as avg_chinese from score';
//$sql = 'select sum(chinese) as sum_chinese from score';
//$sql = 'select min(chinese) as min_chinese from score';
//$sql = 'select max(chinese) as max_chinese from score';
//var_dump(DB($sql));

//$arr = array();
//for ($i = 1 ; $i <= 1 ; $i++)
//{
//    $math = DB('select math from score WHERE id='.$i);
//    $chinese = DB('select chinese from score WHERE id='.$i);
//    $english = DB('select english from score WHERE id='.$i);
//    $math = array_sum($math);
//    var_dump(DB($english));
//    $sum = $math + $chinese + $english;
//    var_dump($math);
//    $arr[$i] = $sum;
//}
//var_dump($arr);
//
//$max = array_search(max($arr) , $arr);
//$min = array_search(min($arr) , $arr);
//$sql = "select uid from score where id={$max}";
//$res = DB($sql);
//echo "三科成绩总和最高的同学的uid为:{}"

//最小值
//$sql = 'select (chinese + math + english) as sc,uid from score ORDER BY sc ASC limit 1';
//var_dump(DB($sql));
//
//最大值
//$sql = 'select (chinese + math + english) as sc,uid from score ORDER BY sc DESC limit 1';
//var_dump(DB($sql));


//新增users表里的数据
//$arr = array();
//$hobbyArr = array('篮球','足球','羽毛球','乒乓球');
//for ($i = 1 ; $i <= 20 ; $i++)
//{
//    $arr[] = '(NULL , 1 , "学员'.$i.'","1356666'.rand(1000 , 9999).'",'.rand(0,1).',"'.$hobbyArr[rand(0,3)].'",'.time().')';
//}
//$sql = 'insert into users VALUES '.implode(',' , $arr);


//$sql = 'select count(*) as nums,hobby from users GROUP BY hobby HAVING hobby="篮球"';

?>





















