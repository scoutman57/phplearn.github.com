<?php


//var_dump($_POST);
if(!preg_match('/^[\x{4e00}-\x{9fa5}]{2,6}$/u' ,$_POST['username']))
    header('location:user/addUser.php?mess=学员名字非法');
if(!preg_match('/^1[3|5|8][0-9]{9}$/u' ,$_POST['phone']))
    header('location:user/addUser.php?mess=请输入11位手机号码');
if(!preg_match('/^[1-9]{0,1}[0-9]{0,1}[\.5]{0,2}$|^(1[0-4]{0,1}[0-9]{0,1}[\.5]{0,2})$|^0$|^150$/u' ,$_POST['chinese']))
    header('location:user/addUser.php?mess=请输入正确的chinese分数');
if(!preg_match('/^[1-9]{0,1}[0-9]{0,1}[\.5]{0,2}$|^(1[0-4]{0,1}[0-9]{0,1}[\.5]{0,2})$|^0$|^150$/u' ,$_POST['math']))
    header('location:user/addUser.php?mess=请输入正确的math分数');
if(!preg_match('/^[1-9]{0,1}[0-9]{0,1}[\.5]{0,2}$|^(1[0-4]{0,1}[0-9]{0,1}[\.5]{0,2})$|^0$|^150$/u' ,$_POST['english']))
    header('location:user/addUser.php?mess=请输入正确的english分数');

//die;


date_default_timezone_set('Asia/Shanghai');
function getUpload($file = 'pic', $type = array() , $uploadAddr = 'user/userimage')
{
    set_time_limit(0);
    if (empty($type))
        $type = array('image/jpeg', 'image/gif', 'image/png');

    $arrTmp = $_FILES['pic'];
    if (!in_array($arrTmp['type'], $type))
    {
        echo $arrTmp['name'] . '类型非法<br>';
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

    $con = mysqli_connect('localhost' , 'root' , '' , 'db_php');

    if(mysqli_connect_errno($con))  //链接产生错误时,返回的错误码
        die('错误信息:'.mysqli_connect_error($con)); //返回上一条错误的错误信息

    mysqli_query($con , 'set names utf8');

    $sql = "select max(id) from users ";
    $res = mysqli_query($con , $sql);
    if(substr_count($sql , 'select'))
    {
        $rows = array();
        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
        {
            $rows[] = $row;
        }
    }
    $userID = $rows[0]['max(id)'];
    $picname = $userID.'-'.date('Y-m-d_H-i-s').'.'.$ext;
    $picname = $uploadAddr.'/'.$picname;
    $res = move_uploaded_file($arrTmp['tmp_name'], $picname);
    $picname = substr($picname , 5);
    $sql2 = "update users set pic = '$picname' where id = $userID";
    mysqli_query($con , $sql2);
    if ($res)
    {
        echo $arrTmp['name'].'上传头像成功<br>';
    }
    else
    {
        echo $arrTmp['name'].'上传头像失败<br>';
    }
}





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
            echo getUpload('pic');
			redirect('user/addUser.php?mess='.$mess);
		}

	}





?>