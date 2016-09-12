<?php
	include '../func.php';

	if(!$_POST)
		redirect('../index.php');

	//定义一个动作,来判断执行什么操作
	$act = $_POST['act'];

	if($act == 'modClasses')
	{	
		if($_SESSION['user']['allow_class'] != '1')
			exit('您没有权限');

		$sql = 'UPDATE classes SET title="'.$_POST['title'].'",description="'.$_POST['description'].'",ord="'.$_POST['ord'].'" WHERE id = '.$_POST['id'];

		if(DB($sql))
		{
			redirect('classesList.php');
		}else{
			redirect('modClasses.php?mess=修改失败!请重新添加&id='.$_POST['id']);
		}
	}elseif($act == 'modUser'){
		if($_SESSION['user']['allow_user'] != '1')
			exit('您没有权限');

		$user = 'UPDATE users SET cid='.$_POST['cid'].',username="'.$_POST['username'].'",phone="'.$_POST['phone'].'",gender='.$_POST['gender'].' WHERE id = '.$_POST['id'];

		$score = 'UPDATE score SET chinese='.$_POST['chinese'].',math='.$_POST['math'].',english='.$_POST['english'].' WHERE uid = '.$_POST['id'];

		if(DB($user) || DB($score))
		{
			redirect('userList.php?mess=修改成功!');
		}else{
			redirect('modUser.php?id='.$_POST['id'].'&mess=修改失败,请重新修改');
		}
	}

?>