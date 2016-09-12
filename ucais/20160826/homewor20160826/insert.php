<?php
header("Content-Type:text/html;charset=utf-8");

$get = $_GET;
if (count($get) != 0)
{

    $id = $get["id"];

    $con = mysqli_connect('localhost', 'root', '', 'db_hw20160826');

    if (mysqli_connect_errno($con))
        die('错误信息:' . mysqli_connect_error($con));

    mysqli_query($con, 'set names utf8');


    $sql = "select u.id,u.cid,u.username,u.phone,u.gender,u.pass_time,s.chinese,s.math,s.english from users u,score s WHERE u.id=s.uid && u.id='$id'";
    $res = mysqli_query($con , $sql);
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);


}


?>
<title>新增/修改</title>
<div id="insert" >
    <form action="main.php" method="post">
        <label>姓名: <input type="text" name="username"></label>
        <label>手机号: <input type="text" name="phone"></label>
        <label>
            性别:
            <select name="gender" id="">
                <option value="man">男</option>
                <option value="woman" >女</option>
            </select>
        </label><br><br><br>
        <label>语文: <input type="text" name="chinese"></label>
        <label>数学: <input type="text" name="math"></label>
        <label>英语: <input type="text" name="english"></label>
        <label>注册时间: <input type="date" name="pass_time"></label>
        <label>班级ID: <input type="text" name="cid"></label>

        <br><br>
        <input type="submit" value="新增">
    </form>
</div>

<div id="update"  style="display: none">
    <form action="main.php" method="post">
        <label><input type="hidden" name="id2" value="<?php echo "$get[id]"; ?>"></label>
        <label>姓名: <input type="text" name="username2" value="<?php echo "$row[username]"; ?>"></label>
        <label>手机号: <input type="text" name="phone2" value="<?php echo "$row[phone]"; ?>"></label>
        <label>性别: <input type="text" name="gender2" value="<?php echo "$row[gender]"; ?>">
        </label><br><br><br>
        <label>语文: <input type="text" name="chinese2" value="<?php echo "$row[chinese]"; ?>"></label>
        <label>数学: <input type="text" name="math2" value="<?php echo "$row[math]"; ?>"></label>
        <label>英语: <input type="text" name="english2" value="<?php echo "$row[english]"; ?>"></label>
        <label>注册时间: <input type="date" name="pass_time2" value="<?php echo "$row[pass_time]"; ?>"></label>
        <label>班级ID: <input type="text" name="cid2" value="<?php echo "$row[cid]"; ?>"></label>
        <br><br>
        <input type="submit" value="修改">
    </form>
</div>
<?php
if (count($get) != 0)
{

    $id = $get["id"];



    echo "
    <script>
        
        if ($id != '')
        {
            document.getElementById('insert').style.display='none';
            document.getElementById('update').style.display='block';            
        }
       
        
    </script>
    ";
}