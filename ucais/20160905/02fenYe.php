<?php
header("Content-Type:text/html;charset=utf-8");

$con = mysqli_connect('localhost', 'root', '') or die('数据库连接失败!');


mysqli_query($con, 'set names utf8');


mysqli_select_db($con, 'db_php');

$sql = 'select * from images0905';

$res = mysqli_query($con , $sql);

$rows = array();
while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
{
    $rows[] = $row;
}
$count = count($rows);//20
//var_dump($count);
$num = round($count / 5 , 0);//4
if ($count > $num * 5)
    $num += 1;
$page = 1;
$get = $_GET;
if (isset($get['page']))
{
    $page = $get['page'];
}

$post = $_POST;
if (isset($post['page']) && $post['page'] != '')
{
    $page = $post['page'];
}

$first = $page*5;
if ($first > $count)
    $first = $count;
$title = 'title';
$pass_time = 'pass_time';
?>

<html>
<head>
    <title>图片</title>
    <link rel="stylesheet" href="html/style.css">
    <style>

        <?php
        if ($page == 1)
        {
            echo '
                .aback{
                    float: left;
                    margin-left: 10px;
                    line-height: 30px;
                    text-decoration: none;
                    border: 1px solid grey;
                    padding: 0 10px;
                    border-radius: 10px;
                    color: grey;
                    margin-bottom: 30px;
                    color: grey;
                    pointer-events: none;
                }

            .anext{
                    float: right;
                    margin-right: 10px;
                    line-height: 30px;
                    text-decoration: none;
                    border: 1px solid #00868B;
                    padding: 0 10px;
                    border-radius: 10px;
                    color: #00868B;
                    -webkit-box-shadow: 3px 3px 5px grey;
                    box-shadow: 3px 3px 5px grey;
                    margin-bottom: 30px;
                }
            ';
        }
        elseif ($page == ceil($count/5))
        {
            echo '
                .anext{
                    float: right;
                    margin-left: 10px;
                    line-height: 30px;
                    text-decoration: none;
                    border: 1px solid grey;
                    padding: 0 10px;
                    border-radius: 10px;
                    color: grey;
                    margin-bottom: 30px;
                    color: grey;
                    pointer-events: none;
                }

            .aback{
                    float: left;
                    margin-right: 10px;
                    line-height: 30px;
                    text-decoration: none;
                    border: 1px solid #00868B;
                    padding: 0 10px;
                    border-radius: 10px;
                    color: #00868B;
                    -webkit-box-shadow: 3px 3px 5px grey;
                    box-shadow: 3px 3px 5px grey;
                    margin-bottom: 30px;
                }
            ';
        }
        else
        {
            echo '

            .divpage a{
                    line-height: 30px;
                    text-decoration: none;
                    border: 1px solid #00868B;
                    padding: 0 10px;
                    border-radius: 10px;
                    color: #00868B;
                    -webkit-box-shadow: 3px 3px 5px grey;
                    box-shadow: 3px 3px 5px grey;
                    margin-bottom: 30px;
                }   
    
            .divpage a:visited{
                    color: #00868B;
                }
    
            .aback{
                    float: left;
                    margin-left: 10px;
                }
    
            .anext{
                    float: right;
                    margin-right: 10px;
                }';
        }
        ?>

    </style>
</head>
<body>
<div class="divmain">

    <?php
    for ($i = $first-5 ; $i < $first ; $i++)
    {
        echo "
                <div class=\"divhead\">
                    <div class=\"divtitle\">
                        <p>".$rows[$i][$title]."</p>
                    </div>
                    <div class=\"divtime\">
                        <p>".$rows[$i][$pass_time]."</p>
                    </div>
                </div>
                <div class=\"divimg\">
                    <img src=\"".$rows[$i]['url']."\">
                </div>
            ";
    }
    //        $page = $first ;
    ?>
    <p>当前页码: <?php echo $page ?> 总页码: <?php echo ceil($count / 5) ?></p>
    <form action="02fenYe.php" method="post">
        <input class="txt" type="number" min="1" max="<?php echo ceil($count / 5) ?>" name="page"
               value="<?php echo $page ?>"><input class="sub" type="submit" value="跳转">
    </form>

    <div class="divpage">
        <a class="aback" href="02fenYe.php?page=<?php echo 1 ?>">第一页</a>
        <a class="aback" href="02fenYe.php?page=<?php echo $page-1 ?>">上一页</a>
        <a class="anext" href="02fenYe.php?page=<?php echo ceil($count / 5) ?>">最后一页</a>
        <a id="a1" class="anext" href="02fenYe.php?page=<?php echo $page+1 ?>">下一页</a>
    </div>



</div>
<div class="divtop">
    <a href="#">︽</a><br><br>
    <a href="#a1">︾</a>
</div>
</body>
</html>
