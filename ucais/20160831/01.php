<?php
header("Content-Type:text/html;charset=utf-8");

//文件上传
//1.方法必须是post, 表单必须添加  enctype="multipart/form-data"
//2.空间必须有浏览框
//3.$_FILES 来接受资源
//4.判断上传文件的类型,是否是咋们定义的类型
//5.了解一下文件上传所需要的相关的php.ini中的配置
//6.移动资源缓存临时文件到实际目录

//move_uploaded_file();




?>


<form action="upload.php" method="post" enctype="multipart/form-data">
<!--    <input type="hidden" name="MAX_FILE_SIZE" value="300000000">-->
    上传头像: <input type="file" name="pic">
    <input type="submit" value="提交">
</form>