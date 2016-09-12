<?php

	include '../../func.php'; 
	if($_SESSION['user']['allow_user'] != '1')
		exit('您没有权限');
?>
<html>
	<head>
		<title>网站后台管理</title>
	</head>
	
	<body>
		<h2>用户列表 
			<span style="float:right">
				<form action="" method="get">
					<select name="sType">
						<option value="username" <?php if(isset($_GET['sType']) && $_GET['sType'] == 'username'): ?> selected="selected" <?php endif; ?>>用户名</option>
						<option value="phone" <?php if(isset($_GET['sType']) && $_GET['sType'] == 'phone'): ?> selected="selected" <?php endif; ?>>手机号</option>
					</select>
					<input type="text" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>">
					<input type="submit" name="sub" value="搜索">
				</form>
			</span>
		</h2>
		<?php

			$where = '';
			if(isset($_GET['sType']) && isset($_GET['search']) && !empty($_GET['search']))
			{
				$field = ($_GET['sType'] == 'username') ? 'username' : 'phone';
				$where = '&& '.$field.' like "%'.$_GET['search'].'%"';
			}

			$sql = 'SELECT u.id,c.title,u.username,u.phone,u.gender,u.pass_time,s.chinese,s.math,s.english FROM users u,classes c,score s WHERE u.cid = c.id && u.id = s.uid '.$where.' ORDER BY u.id DESC';
			$data = DB($sql);
			$countUser = DB('SELECT COUNT(*) as count FROM users');
			$avg = DB('SELECT AVG(chinese) chinese,AVG(math) math,AVG(english) english FROM score');
		?>
		<?php if(isset($_GET['mess'])): ?>
			<p><?php echo $_GET['mess'] ?></p>
		<?php endif; ?>
		<table width="100%" cellspacing="0" cellpadding="10" border="1">
			<tr>
				<th>ID</th>
				<th>班级</th>
				<th>用户名</th>
				<th>手机号</th>
				<th>性别</th>
				<th>语文</th>
				<th>数学</th>
				<th>英语</th>
				<th>总分</th>
				<th>添加时间</th>
				<th>操作</th>
			</tr>
			<?php foreach($data as $v): ?>
				<tr>
					<td><?php echo $v['id'] ?></td>
					<td><?php echo $v['title'] ?></td>
					<td><?php echo $v['username'] ?></td>
					<td><?php echo $v['phone'] ?></td>
					<td><?php echo $v['gender'] == '1' ? '男' : '女' ?></td>
					<td><?php echo $v['chinese'] ?></td>
					<td><?php echo $v['math'] ?></td>
					<td><?php echo $v['english'] ?></td>
					<td><?php echo $v['english'] + $v['chinese'] + $v['math'] ?></td>
					<td><?php echo date('Y-m-d H:i:s',$v['pass_time']) ?></td>
					<td><a href="modUser.php?id=<?php echo $v['id'] ?>">修改</a> | <a href="del.php?id=<?php echo $v['id'] ?>&act=delUser">删除</a></td>
				</tr>
			<?php endforeach; ?>
			<?php if(!isset($_GET['search'])): ?>
				<tr>
					<td colspan="11">总人数:<?php echo $countUser[0]['count'] ?>　
					语文平均分:<?php echo round($avg[0]['chinese']) ?>　
					数学平均分:<?php echo round($avg[0]['math']) ?>　
					英语平均分:<?php echo round($avg[0]['english']) ?></td>

				</tr>
			<?php endif; ?>

		</table>

		<!-- // 1.总条数 count(总数据)
		// 2.每页条数 ,建议定义常量配置
		// 3.页数 ceil(总条数 / 每页条数)
		// 4.url  parse_url($_SERVER['REQUEST_URI']); 路径 , 参数
		// 5.当前页数 $_GET -->
	</body>
</html>