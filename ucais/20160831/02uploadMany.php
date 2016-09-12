<?php
header("Content-Type:text/html;charset=utf-8");


?>

<form action="uploadMany.php" method="post" enctype="multipart/form-data">
    上传文件1: <input type="file" name="pic[]"><br><br>
    上传文件2: <input type="file" name="pic[]"><br><br>
    上传文件3: <input type="file" name="pic[]"><br><br>
    上传文件4: <input type="file" name="pic[]"><br><br>
    上传文件5: <input type="file" name="pic[]"><br><br>
    <input type="submit" value="提交">
</form>