<br>
<a href="main.php" style="display: block;position: relative;left: 75%">主页</a>
<br>
<form action="main.php" method="post" style="display: block;position: relative;left: 75%">
    <input type="text" placeholder="搜索" name="search">
    <input type="submit" value="搜索" style="border-radius: 5px">
</form>
<br><br>
<?php
header("Content-Type:text/html;charset=utf-8");

$get = $_GET;
if (count($get) != 0)
{
    if (in_array('iddelete' , array_flip($get)))
        db_delete($get);
    else
        db_cldelete($get);
}


$post = $_POST;
$trans = array_flip($post);
if (in_array('pass_time' , $trans))
{
    db_insert($post);
}
elseif (in_array('pass_time2' , $trans))
{
    db_update($post);
}
elseif (in_array('intitle' , $trans))
{
    db_clinsert($post);
}
elseif (in_array('uptitle' , $trans))
{
    db_clupdate($post);
}

function db_insert($post)
{
    $con = mysqli_connect('localhost', 'root', '', 'db_hw20160826');

    if (mysqli_connect_errno($con))
        die('错误信息:' . mysqli_connect_error($con));

    mysqli_query($con, 'set names utf8');
    if ($post['gender'] == 'man')
        $sex = '男';
    else
        $sex = '女';

    $sql = "insert into users values(null , '$post[cid]' , '$post[username]' , '$post[phone]' , '$sex' , '$post[pass_time]')";

    $res = mysqli_query($con, $sql);
    $se = 'select max(id) as max from users';
    $res = mysqli_query($con, $se);
    $rows = array();
    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
    {
        $rows[] = $row;
    }

    $uid = $rows[0]['max'];
    $sql2 = "insert into score values(null , '$uid' , '$post[chinese]' , '$post[math]' , '$post[english]')";
    mysqli_query($con, $sql2);
    return;
}

function db_clinsert($post)
{
    $con = mysqli_connect('localhost', 'root', '', 'db_hw20160826');

    if (mysqli_connect_errno($con))
        die('错误信息:' . mysqli_connect_error($con));

    mysqli_query($con, 'set names utf8');

    $sql = "insert into classes values(null , '$post[intitle]' , '$post[indescr]')";

    mysqli_query($con, $sql);
    return;
}

function db_update($post)
{
    $con = mysqli_connect('localhost', 'root', '', 'db_hw20160826');

    if (mysqli_connect_errno($con))
        die('错误信息:' . mysqli_connect_error($con));

    mysqli_query($con, 'set names utf8');
    if ($post['gender2'] == 'man')
        $sex = '男';
    else
        $sex = '女';
    $sql = "update users set cid = '$post[cid2]' , username = '$post[username2]',phone = '$post[phone2]',gender = '$post[gender2]',pass_time = '$post[pass_time2]' where id = '$post[id2]'";
    mysqli_query($con, $sql);

    $sql = "update score set chinese = '$post[chinese2]' ,  math = '$post[math2]' ,  english = '$post[english2]' where uid = '$post[id2]'";
    mysqli_query($con, $sql);

}

function db_clupdate($post)
{
    $con = mysqli_connect('localhost', 'root', '', 'db_hw20160826');

    if (mysqli_connect_errno($con))
        die('错误信息:' . mysqli_connect_error($con));

    mysqli_query($con, 'set names utf8');
    $sql = "update classes set title = '$post[uptitle]',descr = '$post[updescr]' where id = '$post[id]'";
    mysqli_query($con, $sql);

}

function db_delete($get)
{
    $con = mysqli_connect('localhost', 'root', '', 'db_hw20160826');

    if (mysqli_connect_errno($con))
        die('错误信息:' . mysqli_connect_error($con));

    mysqli_query($con, 'set names utf8');
    $sql = "delete from users where id = '$get[iddelete]'";
    $sql2 = "delete from score where uid = '$get[iddelete]'";

    mysqli_query($con, $sql);
    mysqli_query($con, $sql2);

}

function db_cldelete($get)
{
    $con = mysqli_connect('localhost', 'root', '', 'db_hw20160826');

    if (mysqli_connect_errno($con))
        die('错误信息:' . mysqli_connect_error($con));

    mysqli_query($con, 'set names utf8');
    $sql = "delete from classes where id = '$get[iddeclasses]'";

    mysqli_query($con, $sql);

}

function table($sql = '' , $type = MYSQLI_ASSOC)
{
    $con = mysqli_connect('localhost', 'root', '', 'db_hw20160826');

    if (mysqli_connect_errno($con))
        die('错误信息:' . mysqli_connect_error($con));

    mysqli_query($con, 'set names utf8');


    $res = mysqli_query($con, $sql);

    $sql = strtolower($sql);
    $rows = array();

    echo '<table border="1" style="width: 80%;text-align: center;margin: auto;border-radius: 10px;background: aqua"><tr style="height: 80px"><th>ID</th><th>CID</th><th>姓名</th><th>手机号</th><th>性别</th><th>语文</th><th>数学</th><th>英语</th><th>总分</th><th>注册时间</th><th>班级</th><th>班级描述</th><th>操作</th></tr>';

    $sum_chinese = 0;
    $sum_math = 0;
    $sum_english = 0;
    while ($row = mysqli_fetch_array($res, $type))
    {
        $sum = $row['chinese']+$row['math']+$row['english'];
        echo "<tr style='height: 30px'><td>$row[id]</td><td>$row[cid]</td><td>$row[username]</td><td>$row[phone]</td><td>$row[gender]</td><td>$row[chinese]</td><td>$row[math]</td><td>$row[english]</td><td>$sum</td><td>$row[pass_time]</td><td>$row[title]</td><td>$row[descr]</td><td><a href='insert.php?id=$row[id]'>修改</a> <a href='main.php?iddelete=$row[id]'>删除</a></td></tr>";
        $rows[] = $row;
        $sum_chinese += $row['chinese'];
        $sum_math += $row['math'];
        $sum_english += $row['english'];
    }
    if (count($rows) == 0)
        return false;

    $count = count($rows);
    $avg_chinese = round($sum_chinese / $count , 1);
    $avg_math = round($sum_math / $count , 1);
    $avg_english = round($sum_english / $count , 1);
    $avg = round(($avg_chinese + $avg_math + $avg_english) / 3 , 1);
    echo "<tr style='height: 30px'><td colspan='2'>总人数:{$count}</td><td colspan='2'>语文平均分:$avg_chinese</td><td colspan='2'>数学平均分:$avg_math</td><td colspan='2'>英语平均分:$avg_english</td><td colspan='2'>总平均分:$avg</td><td colspan='3'><a href='insert.php' '>添加数据</a></td></tr></table>";
    return ;
}

function classes($classes)
{
    $con = mysqli_connect('localhost', 'root', '', 'db_hw20160826');

    if (mysqli_connect_errno($con))
        die('错误信息:' . mysqli_connect_error($con));

    mysqli_query($con, 'set names utf8');


    $res = mysqli_query($con, $classes);


    $rows = array();
    echo '<br><br><br><hr><br><br><br><table border="1" style="width: 80%;text-align: center;margin: auto;border-radius: 10px;background: aqua"><tr style="height: 80px"><th>ID</th><th>班级名称</th><th>班级描述</th><th>操作</th></tr>';

    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
    {
        echo "<tr style='height: 30px'><td>$row[id]</td><td>$row[title]</td><td>$row[descr]</td><td><a href='classeschange.php?clupdate=$row[id]'>修改</a> <a href='main.php?iddeclasses=$row[id]'>删除</a> <a href='classeschange.php?'>新增</a></td></tr>";
        $rows[] = $row;
    }
    echo "</table>";
}



if (in_array('search' , $trans))
{
    $search = $post['search'];
    $sql = "select u.id,u.cid,u.username,u.phone,u.gender,u.pass_time,s.chinese,s.math,s.english,cl.title,cl.descr from users u,score s,classes cl WHERE u.id=s.uid && u.cid=cl.id && (u.phone like '%$search%' || u.username like '%$search%')";
    table($sql);
}else
{
    $sql = 'select u.id,u.cid,u.username,u.phone,u.gender,u.pass_time,s.chinese,s.math,s.english,cl.title,cl.descr from users u,score s,classes cl WHERE u.id=s.uid && u.cid=cl.id';

    table($sql);
}

$classes = "select * from classes ";

classes($classes);
?>























