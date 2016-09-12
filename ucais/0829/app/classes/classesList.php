<?php
	include '../../func.php';
	if($_SESSION['user']['allow_class'] != '1')
			exit('您没有权限');
?>
<html>
	<head>
		<title>网站后台管理</title>
	</head>
	
	<body>
		<h2>班级列表</h2>
		<?php
			$sql = 'SElECT * FROM classes ORDER BY ord DESC,id DESC';
			$data = DB($sql);
		?>
		<?php if(isset($_GET['mess'])): ?>
			<p><?php echo $_GET['mess'] ?></p>
		<?php endif; ?>
		<table width="100%" cellspacing="0" cellpadding="10" border="1">
			<tr>
				<th>ID</th>
				<th>排序</th>
				<th>班级名称</th>
				<th>班级描述</th>
				<th>操作</th>
			</tr>
			<?php foreach($data as $class): ?>
				<tr>
					<td><?php echo $class['id'] ?></td>
					<td><?php echo $class['ord'] ?></td>
					<td><?php echo $class['title'] ?></td>
					<td><?php echo $class['description'] ?></td>
					<td><a href="modClasses.php?id=<?php echo $class['id'] ?>">修改</a> | <a href="del.php?id=<?php echo $class['id'] ?>&act=delClass">删除</a></td>
				</tr>
			<?php endforeach; ?>
		</table>


	</body>
</html>