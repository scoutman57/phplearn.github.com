<?php
header("Content-Type:text/html;charset=utf-8");


?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
	#comment{
	  width: 800px;
	  margin: 0 auto;
	}
	#editor{
	  border: 1px solid #cccccc;
	  width: 800px;
	  height: 150px;
	  overflow: hidden;
	}
	#img{
	  width: 400px;
	  height: auto;
	  border:solid 1px blue;
	  position: relative;
	}
	#imgs ul li {
	  float: left;
	  border:solid 1px white;
	  margin: 8px;
	  cursor: pointer;
	  list-style-type: none;
	}
	#imgs .close{
	  position: absolute;
	  top:2px;
	  right: 5px;
	  border: solid black 1px;
	  border-radius: 20px;
	  cursor: pointer;
	  width: 20px;
	  height: 20px;
	  line-height: 20px;
	  text-align: center;
	}
	
  </style>
  <title>Document</title>
</head>
<body>
<div id="comment">
  <div id="editor" contenteditable="true"></div>
  <div id="imgs">
	<ul>
	  <div class="close">&times;</div>
	  <div style="clear: both"></div>
	</ul>
  </div>
</div>
</body>
<script src="./js/jquery3.1.0.js"></script>
<script>
  $(function () {
    var li = '';
	for (var i = 1 ; i <= 16 ; i++)
	{
	  li += "<li><img src=\"smiley/"+i+".gif\" alt=''></li>"
	}
	$("#imgs ul .close").after(li);
	
	$("#imgs ul li").click(function () {
	  var editor = $("#editor").get(0);
	  var urlSrc = $(this).children("img").attr("src");
	  InsertImage(urlSrc , editor);
	}).hover(function () {
	  $(this).css('border','solid aqua 1px');
	} , function () {
	  $(this).css('border','solid white 1px');
	});
	
	$('#imgs ul li img').click(function () {
	  $(this).parents("#imgs").hide();
	});
  });
</script>
</html>