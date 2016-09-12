<?php
header("Content-Type:text/html;charset=utf-8");
$get = $_GET;
if (count($get) != null)
{

    $clupdate = $get["clupdate"];

    $con = mysqli_connect('localhost', 'root', '', 'db_hw20160826');

    if (mysqli_connect_errno($con))
        die('错误信息:' . mysqli_connect_error($con));

    mysqli_query($con, 'set names utf8');


    $sql = "select * from classes WHERE id='$clupdate'";
    $res = mysqli_query($con , $sql);
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);




}

?>
<div id="clinsert">
    <form action="main.php" method="post">
        <label>班级名称: <input type="text" name="intitle"></label>
        <label>班级描述: <input type="text" name="indescr"></label>
        <label><input type="submit" value="新增"></label>
    </form>
</div>
<div id="clupdate"  style="display: none">
    <form action="main.php" method="post">
        <label><input type="hidden" name="id" value="<?php echo "$get[clupdate]"; ?>"></label>
        <label>班级名称: <input type="text" name="uptitle" value="<?php echo "$row[title]"; ?>"></label>
        <label>班级描述: <input type="text" name="updescr" value="<?php echo "$row[descr]"; ?>"></label>
        <label><input type="submit" value="修改"></label>
    </form>
</div>
<?php
if (count($get) != 0)
{

    $clupdate = $get["clupdate"];


    echo "
    <script>
        
        if ($clupdate != '')
        {
            document.getElementById('clinsert').style.display='none';
            document.getElementById('clupdate').style.display='block';            
        }
       
        
    </script>
    ";
}
?>