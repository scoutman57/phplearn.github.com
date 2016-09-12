<?php
header("Content-Type:text/html;charset=utf-8");


?>



<html>
<head>
    <title>媒体查询</title>
    <link rel="stylesheet" type="text/css" media="screen and (max-width:700px)" href="phone.css" />
    <link rel="stylesheet" type="text/css" media="screen and (min-width:701px)" href="style.css" />
    <link rel="stylesheet" type="text/css" media="screen and (min-width:800px)" href="phone.css" />
</head>
<body>
<div class="div1">
    1
</div>
</body>
</html>



响应式设计详解
1.viewport 标签
基本语法:
<meta name = "viewport" content="width=device-width,initial-scale=1">
上面这行代码的意思是,面积的100%.网页宽度默认等于屏幕宽度(width=device-width),原始缩放比例(initial-scale=1)为1.0,即网页初始大小占屏幕


2.媒体查询
"只适应网页设计"的核心,就是css3引入的media query
自动探测屏幕宽度,然后加载相应的css文件.
<link rel="stylesheet" type="text/css" media="screen and (max-width:767px)" href="phone.css" />
上面代码的意思是,如果屏幕宽度小于767像素(max-width:767px),就加载phone.css文件.

<link rel="stylesheet" type="text/css" media="screen and (min-width:768px)" href="style.css" />
如果屏幕宽度大于768像素(min-width:768px),就加载style.css文件.


3.不使用绝对宽度
由于网页会根据屏幕宽度调整布局,所以不能使用绝对宽度,也不能使用具有绝对宽度的元素.这一条非常重要.

具体说,css代码不能指定像素宽度:
如:width:xxx px;
只能指定百分比宽度:
如:width:xxx %;


4.相对大小的字体

字体也不能使用绝对大小(px),二应该使用相对大小(rem).
rem字体大小是相对于根元素<html>字体大小,默认网页根元素字体大小为100%,即16像素,所以1rem=16px;(0.75rem=12px,0.875rem=14px)

在实际项目中,可以使用如下方式设置:
html{font-size:62.5%}即1rem=10px
12px=1.2rem
14px=1.4rem
16px=1.6rem


5.图片自适应(fluid image)
除了布局和文本,"自适应网页设计"还必须实现图片的自动缩放.
img{max-width:100%}
为了保证所有媒体标签自适应也可以设置
object , embed{max-width:100%}






















