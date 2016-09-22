<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog管理后台</title>
	<link rel="stylesheet" href="../css/reset.css">
	<link rel="stylesheet" href="../css/admin/init.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/admin_menu.js"></script>
</head>
<body>
	<ul class="menu">
		<li class="p">标签管理</li>
		<ul class="menu-list">
			<li><a href="tags/tagList.php" target="right">标签列表</a></li>
			<li><a href="tags/tagAdd.php" target="right">添加标签</a></li>
		</ul>
		<li class="p">内容管理</li>
		<ul class="menu-list">
			<li><a href="tags.php?action=list" target="right">内容列表</a></li>
			<li><a href="tags.php?action=add" target="right">添加内容</a></li>
		</ul>
		<li class="p">栏目管理</li>
		<ul class="menu-list">
			<li><a href="tags.php?action=list" target="right">栏目列表</a></li>
			<li><a href="tags.php?action=add" target="right">添加栏目</a></li>
		</ul>
		<li class="p">系统管理</li>
		<ul class="menu-list">
			<li><a href="tags.php?action=list" target="right">系统管理</a></li>
		</ul>
	</ul>

</body>
</html>