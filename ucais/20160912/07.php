<?php
header("Content-Type:text/html;charset=utf-8");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
</head>
<body>

<!--
  1.window.scroll事件
  2.判断是否到了页面底部
    document.body.scrollHeight  整个网页的高度
    
  3.将元素追加到最后,createElement('img') appendChild; innerHTML
-->

<div>
  <img src="http://news.xinhuanet.com/photo/2016-09/09/129274853_14733784043001n.jpg" alt="">
</div>
<div>
  <img src="http://www.js.xinhuanet.com/2016-09/03/1119506173_14728985626541n.jpg" alt="">
</div>
<div>
  <img src="http://news.xinhuanet.com/photo/2016-09/09/129274853_14733784043001n.jpg" alt="">
</div>
<div>
  <img src="http://news.xinhuanet.com/photo/2016-09/09/129274853_14733784042371n.jpg" alt="">
</div>
<div>
  <img src="http://news.xinhuanet.com/photo/2016-09/09/129274853_14733784043621n.jpg" alt="">
</div>

</body>

<script>
  window.onscroll = function() {
    console.log(document.body.scrollHeight);
    console.log(document.body.scrollTop);
    console.log(window.innerHeight);
    if (document.body.scrollHeight < document.body.scrollTop + window.innerHeight + 10)
    {
      document.body.innerHTML += '<div><img src="http://img.cnmo-img.com.cn/393/392279.jpg"><\/div>';
    }
  }
</script>

</html>
