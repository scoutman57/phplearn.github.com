<?php


$url = $_SERVER['HTTP_HOST'];
if($url == 'martinzzfx.hk09.iis800.com')
{
    $row = scandir('./');
    $count = count($row);
    for ($i = 2; $i < $count ; $i++)
    {
        if (is_dir($row[$i]))
        {
            echo '<a href=' . $row[$i] . '>' . $row[$i] . '</a><br>';
        }
    }

}
elseif($url == 'martinzzfx.zicp.io')
{
    header('Location: ./weixin');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>项目目录</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        a{
            text-decoration: none;
            font-size: 40px;
            color: black;
            margin-left: 30px;
        }
        a:visited{
            color: black;
        }
        a:hover{
            font-size: 45px;
        }
    </style>
</head>
<body>

</body>
</html>
