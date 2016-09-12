<?php

date_default_timezone_set('Asia/Shanghai');
$pic =  getUpload('pic' , $_POST['id']);
if(!preg_match('/^[\x{4e00}-\x{9fa5}]{2,6}$/u' ,$_POST['username']))
    header('location:user/modUser.php?mess=学员名字非法');
if(!preg_match('/^1[3|5|8][0-9]{9}$/u' ,$_POST['phone']))
    header('location:user/modUser.php?mess=请输入11位手机号码');
if(!preg_match('/^[1-9]{0,1}[0-9]{0,1}[\.5]{0,2}$|^(1[0-4]{0,1}[0-9]{0,1}[\.5]{0,2})$|^0$|^150$/u' ,$_POST['chinese']))
    header('location:user/modUser.php?mess=请输入正确的chinese分数');
if(!preg_match('/^[1-9]{0,1}[0-9]{0,1}[\.5]{0,2}$|^(1[0-4]{0,1}[0-9]{0,1}[\.5]{0,2})$|^0$|^150$/u' ,$_POST['math']))
    header('location:user/modUser.php?mess=请输入正确的math分数');
if(!preg_match('/^[1-9]{0,1}[0-9]{0,1}[\.5]{0,2}$|^(1[0-4]{0,1}[0-9]{0,1}[\.5]{0,2})$|^0$|^150$/u' ,$_POST['english']))
    header('location:user/modUser.php?mess=请输入正确的english分数');
//var_dump($_FILES);
//die;

function getUpload($file = 'pic' , $id = '' ,  $type = array() , $uploadAddr = 'user/userimage')
{
    $con = mysqli_connect('localhost' , 'root' , '' , 'db_php');

    if(mysqli_connect_errno($con))  //链接产生错误时,返回的错误码
        die('错误信息:'.mysqli_connect_error($con)); //返回上一条错误的错误信息

    mysqli_query($con , 'set names utf8');
    set_time_limit(0);
    if (empty($type))
        $type = array('image/jpeg', 'image/gif', 'image/png');

    $arrTmp = $_FILES['pic'];
    if (!in_array($arrTmp['type'], $type))
    {
        echo $arrTmp['name'] . '类型非法<br>';
        exit;
    }

    if ($arrTmp['error'] > 0)
    {
        switch ($arrTmp['error'])
        {
            case '1':
                return '传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。 ';
                break;
            case '2':
                return '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。 ';
                break;
            case '3':
                return '文件只有部分被上传。 ';
                break;
            case '4':
                return '没有文件被上传。 ';
                break;
            case '6':
                return '找不到临时文件夹。 ';
                break;
            case '7':
                return '文件写入失败。';
                break;
        }
    }
    if (!file_exists($uploadAddr))
        mkdir($uploadAddr);
    $extArr = explode('.' , $arrTmp['name']);
    $ext = strtolower(end($extArr));

//    $con = mysqli_connect('localhost' , 'root' , '' , 'db_php');
//
//    if(mysqli_connect_errno($con))  //链接产生错误时,返回的错误码
//        die('错误信息:'.mysqli_connect_error($con)); //返回上一条错误的错误信息
//
//    mysqli_query($con , 'set names utf8');

//    $sql = "select max(id) from users ";
//    $res = mysqli_query($con , $sql);
//    if(substr_count($sql , 'select'))
//    {
//        $rows = array();
//        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
//        {
//            $rows[] = $row;
//        }
//    }
//    $userID = $rows[0]['max(id)'];
    $picname = $id.'-'.date('Y-m-d_H-i-s').'.'.$ext;
    $picname = $uploadAddr.'/'.$picname;
//    $sql2 = "update users set pic = '$picname' where id = $id";
//    $res2 = mysqli_query($con , $sql2);
//    var_dump($uploadAddr.'/'.$picname);
    $res = move_uploaded_file($arrTmp['tmp_name'], $picname);
    $picname = substr($picname , 5);
    return $picname;
//    if ($res)
//    {
//        echo $arrTmp['name'].'上传头像成功<br>';
//    }
//    else
//    {
//        echo $arrTmp['name'].'上传头像失败<br>';
//    }
}










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

		$user = 'UPDATE users SET cid='.$_POST['cid'].',username="'.$_POST['username'].'",phone="'.$_POST['phone'].'",gender='.$_POST['gender'].', pic="'.$pic.'" WHERE id = '.$_POST['id'];

		$score = 'UPDATE score SET chinese='.$_POST['chinese'].',math='.$_POST['math'].',english='.$_POST['english'].' WHERE uid = '.$_POST['id'];

		if(DB($user) || DB($score))
		{
			redirect('user/userList.php?mess=修改成功!');

		}else{
			redirect('user/modUser.php?id='.$_POST['id'].'&mess=修改失败,请重新修改');
		}
	}

?>