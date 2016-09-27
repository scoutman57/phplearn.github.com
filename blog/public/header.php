<?php
include_once 'func.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>博客首页</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<script type="text/javascript" src="js/Jquery.min.js"></script>
	<script type="text/javascript" src="js/koala.min.1.5.js"></script>
</head>
<body>
	<!--header-->
	<div class="header">
		<div class="head-content">
			<div class="logo">Alan Shang Blog</div>
			<div class="search">
				<form action="" method="post">
					<input type="text" name="search" placeholder="PHP"><input type="button" value="搜 索">
				</form>
			</div>
		</div>
	</div>
	<!-- header end -->
	<!-- nav -->
	<div class="nav">
		<div class="nav-content">
			<ul class="menu">
				<li><a href="index.php">首　页</a></li>
			  		<?php
						$sql = "select * from cate where cate_name = '文章分类'";
						$cid = DB($sql)[0]['cid'];
						function tree($pid = 0)
						{
						  $arr = array();
						  $data = DB('select cid , cate_name from cate where pid = ' . $pid . '&& status=1 Order by ord desc , cid desc
');
						  foreach ($data as $cate)
						  {
							$cate['son'] = tree($cate['cid']);
							$arr[] = $cate;
						  }
						  return $arr;
						}
				  	
						//echo '<pre>';
						$array = tree($cid);
						$count = count($array);
						for ($i = 0 ; $i < $count ; $i++)
						{
						  echo '<li>';
						  echo "<a href=''>{$array[$i]['cate_name']}</a>";
						  if (!empty($array[$i]['son']))
						  {
							$arraySon = $array[$i]['son'];
							$countSon = count($arraySon);
							echo "<ul class='nav-menu'>";
							for ($j = 0 ; $j < $countSon ; $j++)
							{
							  echo "<li><a href='#'>{$arraySon[$j]['cate_name']}</a></li>";
							}
							echo "</ul>";
						  }
						  
						  echo '</li>';
						}
					?>
<!--				<li>-->
<!--					<a href="javascript:;">HTML</a>-->
<!--					<ul class="nav-menu">-->
<!--						<li><a href="#">HTML简介</a></li>-->
<!--						<li><a href="#">XHTML</a></li>-->
<!--						<li><a href="#">HTML5</a></li>-->
<!---->
<!--					</ul>-->
<!--				</li>-->
<!--				-->
<!--				<li>-->
<!--					<a href="javascript:;">CSS</a>-->
<!--					<ul class="nav-menu">-->
<!--						<li><a href="#">CSS</a></li>-->
<!--						<li><a href="#">JSJS</a></li>-->
<!--						<li><a href="#">CSS</a></li>-->
<!--						<li><a href="#">CSS</a></li>-->
<!--						<li><a href="#">CSS</a></li>-->
<!--					</ul>-->
<!--				</li>-->
<!--				-->
<!--				<li>-->
<!--					<a href="javascript:;">JavaScript</a>-->
<!--					<ul class="nav-menu">-->
<!--						<li><a href="#">焦点图</a></li>-->
<!--						<li><a href="#">全屏广告</a></li>-->
<!--						<li><a href="#">对联广告</a></li>-->
<!--						<li><a href="#">相册代码</a></li>-->
<!--						<li><a href="#">菜单导航</a></li>-->
<!--						<li><a href="#">焦点图</a></li>-->
<!--						<li><a href="#">全屏广告</a></li>-->
<!--						<li><a href="#">对联广告</a></li>-->
<!--						<li><a href="#">相册代码</a></li>-->
<!--						<li><a href="#">菜单导航</a></li>-->
<!--						<li><a href="#">焦点图</a></li>-->
<!--						<li><a href="#">全屏广告</a></li>-->
<!--						<li><a href="#">对联广告</a></li>-->
<!--						<li><a href="#">相册代码</a></li>-->
<!--						<li><a href="#">菜单导航</a></li>-->
<!--					</ul>-->
<!--				</li>-->
<!--				<li><a href="javascript:;">MySQL</a></li>-->
<!--				<li><a href="javascript:;">Linux</a></li>-->
			</ul>
		</div>
	</div>
	<!-- nav end -->