<?php
header("Content-Type:text/html;charset=utf-8");

include './public/func.php';
if (!empty($_POST))
{
  //--------------------------------添加评论并且刷新最热评论----------------------------------------------------------------
  if (isset($_POST['username']))
  {
    $data = date('Y-m-d H-i-s');
	$sql = "insert into comment VALUES (null , 0 , {$_POST['aid']} , '{$_POST['username']}' , '{$_POST['comment_content']}' , 0 , '{$data}' , 1)";
	if (DB($sql))
	  hotComment($_POST['aid']);
  }
  
  //--------------------------------添加评论后刷新最新评论----------------------------------------------------------------
  elseif (isset($_POST['refresh']) || isset($_POST['new']))//
  {
	newComment($_POST['aid']);
  }

  //--------------------------------添加最热评论----------------------------------------------------------------
  elseif (isset($_POST['refreshhot']) || isset($_POST['hot']))//
  {
//    echo '1';
	hotComment($_POST['aid']);
  }
  elseif (isset($_POST['like_count']))
  {
	$sql = "update comment set like_count = like_count + 1 where commentid = {$_POST['like_count']}";
	DB($sql);
	hotComment($_POST['aid']);
  }
  elseif (isset($_POST['hot']))
  {
	hotComment($_POST['aid']);
  }
  elseif (isset($_POST['Pcommentid']))
  {
	$data = date('Y-m-d H-i-s');
//    print_r($_POST);
	$sql = "insert into comment VALUES (null , {$_POST['Pcommentid']} , '{$_POST['replyAid']}' , '{$_POST['replyUsername']}' , '{$_POST['replyComment']}' , 0 , '{$data}' , 1)";
	if (DB($sql))
	  echo '1';
	else
	  echo '2';
//	echo 'Ajax';
  }
}
?>
