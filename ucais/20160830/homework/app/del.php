<?php
	include 'db.php';
	if(isset($_GET['id']) && isset($_GET['act']))
	{

		if($_GET['act'] == 'delClass')
		{

			$isset = DB('SELECT id FROM users WHERE cid = '.$_GET['id'].' LIMIT 1');

			if($isset)
				redirect('classesList.php?mess=该班级下存在学员,请删除该班级的学员,在执行删除操作');

			$res = DB('DELETE FROM classes WHERE id = '.$_GET['id']);
			if($res)
			{
				redirect('classesList.php?mess=删除成功');
			}else{
				redirect('classesList.php?mess=删除失败');
			}
		}elseif($_GET['act'] == 'delUser'){
			$user = DB('DELETE FROM users WHERE id = '.$_GET['id']);
			$score = DB('DELETE FROM score WHERE uid = '.$_GET['id']);
			if($user && $score)
			{
				redirect('userList.php?mess=删除成功');
			}else{
				redirect('userList.php?mess=删除失败');
			}
		}


	}

?>