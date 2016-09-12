<?php
	include 'db.php';

	if(!(isset($_SESSION['isLogined']) && $_SESSION['isLogined'] == 1))
	{
		echo '尚未登录,请前去登录';
		echo '<script>setTimeout("location=\'/0829/login.php\'" , 3000)</script>';
		exit;
	}


	function redirect($url = '')
	{
		header('Location:'.$url);
		exit;
	}

	function getClassList($cid = '0')
	{
		$sql = 'SELECT id,title FROM classes';
		$html = '';
		$data = DB($sql);
		if($data)
		{
			$html .= '<select name="cid">';
			foreach($data as $value)
			{
				if($cid == $value['id'])
					$html .= '<option value="'.$value['id'].'" selected = "selected">'.$value['title'].'</option>';
				else
					$html .= '<option value="'.$value['id'].'" >'.$value['title'].'</option>';
			}
			$html .= '</select>';
		}
		return $html;
	}
?>