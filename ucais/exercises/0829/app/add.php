<?php
	include '../func.php';

	if(!$_POST)
		redirect('../index.php');

	//定义一个动作,来判断执行什么操作
	$act = $_POST['act'];

	if($act == 'addClasses')
	{
		if($_SESSION['user']['allow_class'] != '1')
			exit('您没有权限');

		$sql = 'INSERT INTO classes (title , description , ord) VALUES ("'.$_POST['title'].'","'.$_POST['description'].'" , '.$_POST['ord'].')';

		if(DB($sql))
		{
			redirect('addClasses.php?mess=添加成功!可以继续添加');
		}else{
			redirect('addClasses.php?mess=添加失败!请重新添加');
		}
	}elseif($act == 'addUser'){
		if($_SESSION['user']['allow_user'] != '1')
			exit('您没有权限');

		$sql = 'INSERT INTO users ( cid , username , phone , gender , pass_time) VALUES ('.$_POST['cid'].',"'.$_POST['username'].'","'.$_POST['phone'].'" , '.$_POST['gender'].','.time().')';
		$uid = DB($sql);
		if($uid)
		{
			$score = 'INSERT INTO score ( uid , chinese , math , english) VALUES ('.$uid.','.$_POST['chinese'].','.$_POST['math'].' , '.$_POST['english'].')';
			$mess = DB($score) ? '添加成功!可以继续添加' : '添加失败!请重新添加';
			redirect('addUser.php?mess='.$mess);
		}

	}

?>