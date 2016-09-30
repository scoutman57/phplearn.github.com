<?php
header("Content-Type:text/html;charset=utf-8");

include 'db.php';
?>
<?php
//公用函数文件



//------------------跳转页面------------------------------------------------------------
 


function redirect($url = '')
{
  header('Location:'.$url);
  exit;
}



//------------------分页---------------------------------------------------------------------------------------



function getPageList($sql = '', $query = array())
{
  // 1.总条数 count(总数据)
  // 2.每页条数 ,建议定义常量配置
  // 3.页数 ceil(总条数 / 每页条数)
  // 4.url  parse_url($_SERVER['REQUEST_URI']); 路径 , 参数
  // 5.当前页数 $_GET
  
  $count = count(DB($sql)); //获取总条数
//  var_dump($count);
  // PAGE_NUM
  $totalNum = ceil($count / PAGE_NUM); //获取总页数,进一法取整
  
  $request_url = parse_url($_SERVER['REQUEST_URI']);  //获取当前URL的数组 path 路径, query 参数
  $path = $request_url['path']; //获取path 路径部分
  
  $page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : 1; //获取当前页
  
  $limit = ' LIMIT '.($page - 1) * PAGE_NUM.','.PAGE_NUM;  //组装limit 语句
  
  // limit 起始位置,取条数
  $datas = DB($sql . $limit); //执行SQL语句,获取数据数组
//  var_dump($datas);
  $html = ''; //获取表格
  
  $geturl = !empty($query) ? http_build_query($query).'&' : '';
  
//  if($count < PAGE_NUM)
//	return $html;
  
  $start = ($page - PAGE_OFFSET) > 0 ? $page - PAGE_OFFSET : 1; //获取左侧位置偏移
  $end = ($page + PAGE_OFFSET) < $totalNum ? $page + PAGE_OFFSET : $totalNum; //获取右侧位置偏移
  
  $html .= '<div class="page">';
  if($page > 1) //如果当前页大于1的时候,才显示上一页和首页
  {
	$html .= '<a href="'.$path.'?'.$geturl.'page='.($page - 1).'">上一页</a>';
	$html .= '<a href="'.$path.'?'.$geturl.'page=1">首页</a>';
  }
  
  for($i = $start ; $i <= $end ; $i++) //循环偏移量范围内的页数
  {
	$class = ($i == $page) ? 'class="on"' : ''; //如果是当前页,追加 on 样式
	$html .= '<a href="'.$path.'?'.$geturl.'page='.$i.'" '.$class.'>'.$i.'</a>';
  }
  if($page < $totalNum) //如果当前页小于总页数的时候,才显示下一页和尾页
  {
	$html .= '<a href="'.$path.'?'.$geturl.'page='.$totalNum.'">尾页</a>';
	$html .= '<a href="'.$path.'?'.$geturl.'page='.($page + 1).'">下一页</a>';
  }
  $html .= ' 共 '.$totalNum.' 页';
  $html .= '</div>';
  
  return array('data' => $datas , 'page' => $html);
}





//------------------上传文件-------------------------------------------------------------



function getUpload($file = 'pic' , $uploadAddr = 'uploads' , $type = array())
{
  set_time_limit(0); //设置响应时间为永久
  
  if($_FILES && isset($_FILES[$file]))
  {
	$fileTmp = $_FILES[$file];
	//判断上传文件时是否有错误
	$error = '';
	if($fileTmp['error'] > 0)
	{
	  switch ($fileTmp['error']) {
		case '1':
		  $error = '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值';
		  break;
		case '2':
		  $error = '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值';
		  break;
		case '3':
		  $error = '文件只有部分被上传';
		  break;
		case '4':
		  $error = '没有文件被上传';
		  break;
		case '6':
		  $error = '找不到临时文件夹';
		  break;
		case '7':
		  $error = '文件写入失败';
		  break;
	  }
	}
	if($error != '')
	  return array('status' => '0' , 'data' => $error);
	
	//获取文件后缀名
	
	$extArr = explode('.', $fileTmp['name']);
	$ext = strtolower(end($extArr));
	
	//判断是否是我们自定义的类型,如果用户不设置,则使用默认
	if(empty($type))
	  $type = array('jpg' , 'gif' , 'png' , 'jpeg');
	
	if(!in_array($ext, $type))
	  return array('status' => '0' , 'data' => '类型非法');
	
	//检测上传的目标文件夹是否存在,如果不存在,则创建
	// C:/wamp/www/
//	var_dump($_SERVER['DOCUMENT_ROOT']);
//	die;
	if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/images/'.$uploadAddr))
	  mkdir($_SERVER['DOCUMENT_ROOT'].'/images/'.$uploadAddr);
	if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/images/'.$uploadAddr.'/uploads'))
	  mkdir($_SERVER['DOCUMENT_ROOT'].'/images/'.$uploadAddr.'/uploads');
	
//	if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/images/'.$uploadAddr.'/'.date('Ym')))
//	  mkdir($_SERVER['DOCUMENT_ROOT'].'/images/'.$uploadAddr.'/'.date('Ym'));
	
	//并设置随机文件名
	$fileName = $uploadAddr.'/uploads'.'/'.md5(microtime(true).rand(10000 , 99999)).'.'.$ext;
	// upload/201608/laksjdfl;kjas;ldfkja;slkdjfsad.jpg
	
	//移动文件,移动成功返回上传以后的文件路径
	return move_uploaded_file($fileTmp['tmp_name'] , $_SERVER['DOCUMENT_ROOT'].'/images/'.$fileName) ? array('status' => '1' , 'data' => $fileName) : array('status' => '0' , 'data' => '文件移动失败');
  }else{
	return array('status' => '0' , 'data' => '文件传入失败');
  }
  
}








//------------------上传文章-------------------------------------------------------------



function getUploadArticle($html = '')
{
  set_time_limit(0);
	if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/admin/article/articles/uploads'))
	  mkdir($_SERVER['DOCUMENT_ROOT'].'/admin/article/articles/uploads');
	
  //并设置随机文件名
  $fileName = md5(microtime(true).rand(10000 , 99999)).'.txt';
  file_put_contents($_SERVER['DOCUMENT_ROOT'].'/admin/article/articles/uploads'.'/'.$fileName , $html , FILE_APPEND);
	//移动文件,移动成功返回上传以后的文件路径
  return $fileName;
//	return move_uploaded_file($html , $_SERVER['DOCUMENT_ROOT'].'/admin/article/articles/'.$fileName) ? array('status' => '1' , 'data' => $fileName) : array('status' => '0' , 'data' => '文件移动失败');
 
  
}









//--------------------------云标签-----------------------------------------------------------------------------------
function showTagsAriticleNum()
{
  $sql = "select * from tags where status = 1 ORDER BY ord DESC , clickcount DESC";
  $tagsList = DB($sql);
  $strtemp = '';
  $countTagsList = count($tagsList);
  for ($i = 0 ; $i < $countTagsList ; $i++)
  {
	$strtemp .= $tagsList[$i]['tid'].',';
  }
  $strtemp = rtrim($strtemp , ',');
  $sql = "Select count(aid) as count , tid from article_tags where tid in({$strtemp}) group by tid";
  $article_tagsList = DB($sql);
  for ($i = 0 ; $i < $countTagsList ; $i++)
  {
	for ($j = 0 ; $j < count($article_tagsList) ; $j++)
	{
	  if ($article_tagsList[$j]['tid'] == $tagsList[$i]['tid'])
	  {
		echo "<a href=\"list.php?tid={$tagsList[$i]['tid']}\">{$tagsList[$i]['tagname']}　{$article_tagsList[$j]['count']}</a>";
		continue(2);
	  }
	}
	echo "<a href=\"list.php?tid={$tagsList[$i]['tid']}\">{$tagsList[$i]['tagname']}</a>";
  }
}


















//------------------Ajax分页---------------------------------------------------------------------------------------



function getAjaxPageList($sql = '', $query = array())
{
//  return $_GET['page'];
  // 1.总条数 count(总数据)
  // 2.每页条数 ,建议定义常量配置
  // 3.页数 ceil(总条数 / 每页条数)
  // 4.url  parse_url($_SERVER['REQUEST_URI']); 路径 , 参数
  // 5.当前页数 $_GET
  
  $count = count(DB($sql)); //获取总条数
//  var_dump($count);
  // PAGE_NUM
  $totalNum = ceil($count / PAGE_NUM); //获取总页数,进一法取整
  
  $request_url = parse_url($_SERVER['REQUEST_URI']);  //获取当前URL的数组 path 路径, query 参数
  $path = $request_url['path']; //获取path 路径部分
  
  $page = (isset($_POST['page']) && $_POST['page'] != '') ? $_POST['page'] : 1; //获取当前页
  
  $limit = ' LIMIT '.($page - 1) * PAGE_NUM.','.PAGE_NUM;  //组装limit 语句
  
  // limit 起始位置,取条数
  $datas = DB($sql . $limit); //执行SQL语句,获取数据数组
//  var_dump($datas);
  $html = ''; //获取表格
  
  $geturl = !empty($query) ? http_build_query($query).'&' : '';

//  if($count < PAGE_NUM)
//	return $html;
  
  $start = ($page - PAGE_OFFSET) > 0 ? $page - PAGE_OFFSET : 1; //获取左侧位置偏移
  $end = ($page + PAGE_OFFSET) < $totalNum ? $page + PAGE_OFFSET : $totalNum; //获取右侧位置偏移
  
  $html .= '<div class="page">';
  if($page > 1) //如果当前页大于1的时候,才显示上一页和首页
  {
	$html .= '<a href="'.$path.'?'.$geturl.'page='.($page - 1).'" onclick=\'return pageClick(this)\'>上一页</a>';
	$html .= '<a href="'.$path.'?'.$geturl.'page=1" onclick=\'return pageClick(this)\'>首页</a>';
  }
  
  for($i = $start ; $i <= $end ; $i++) //循环偏移量范围内的页数
  {
	$class = ($i == $page) ? 'class="on"' : ''; //如果是当前页,追加 on 样式
	$html .= '<a href="'.$path.'?'.$geturl.'page='.$i.'" '.$class.' onclick=\'return pageClick(this)\'>'.$i.'</a>';
  }
  if($page < $totalNum) //如果当前页小于总页数的时候,才显示下一页和尾页
  {
	$html .= '<a href="'.$path.'?'.$geturl.'page='.$totalNum.'"  onclick=\'return pageClick(this)\'>尾页</a>';
	$html .= '<a href="'.$path.'?'.$geturl.'page='.($page + 1).'"  onclick=\'return pageClick(this)\'>下一页</a>';
  }
  $html .= ' 共 '.$totalNum.' 页';
  $html .= '</div>';
  
  return array('data' => $datas , 'page' => $html);
}









//------------------hotCommentList---------------------------------------------------------------------------------------

function hotComment($aid)
{
  $sql = "select * from comment where status = 1 && aid = {$aid} && Pcommentid = 0 ORDER by like_count desc ";
  $aid = array('aid' => $aid , 'hot' => 1);
  $hotCommentListTotal = getAjaxPageList($sql , $aid);
  $hotCommentList = $hotCommentListTotal['data'];
  if (!empty($hotCommentList)) {
    
	function myechoFirst($hotCommentList , $i , $aid)
	{
	  echo "
		  	<p class='commentUserName'>
				<a href=\"#\">{$hotCommentList[$i]['username']}{$hotCommentList[$i]['commentid']}</a>
		  	</p>
		  	<p class='commentContent'>
		  		{$hotCommentList[$i]['comment_content']}				
			</p >
			<p class='commentRepeat' onclick='showCommentRepeatForm(this)'>回复</p>
			<div id='divcommentRepeatNew{$i}' class='divToNone'>
			<form action='./show.php' class='commentRepeatForm displaynone' onsubmit='return newreplyComment(this)'>
			
			<label for=\"\"><span class=\"newCommentUsername\">用户名: </span><input class='replyUsernamezzz' type=\"text\" name=\"replyUsername\" value=\"游客\" class=\"commentext\"></label><br><br>
				<input type='hidden' name='Pcommentid' value='{$hotCommentList[$i]['commentid']}'>
				<input type='hidden' name='replyAid' value='{$aid['aid']}'>
				<input class='commentReplyText' type='text' name='replyComment'><input class='commentReplySub' type='submit' value='确　认'>
			</form>
			</div>	  	
			<p class='commentCommentTime'>
				更新时间 : {$hotCommentList[$i]['comment_time']}　<span class='commentLike' onclick='commentLike(this , {$hotCommentList[$i]['commentid']})'>点赞</span> :　<span class='commentLikeCount'>{$hotCommentList[$i]['like_count']}</span>
			</p>
			<hr>";
	}
  
  
  
	function myechoFirst2($hotCommentList , $i , $aid , $pname , $pcommentid , $t , $j)
	{
	  $sj = str_repeat('　　' , $t);
	  echo "
		  	<p class='commentUserName'>
				{$sj}<a href=\"#\">{$hotCommentList[$i]['username']}{$hotCommentList[$i]['commentid']}</a> 回复 {$pname} {$pcommentid};
		  	</p>
		  	<p class='commentContent'>
		  		{$sj}{$hotCommentList[$i]['comment_content']}				
			</p >
			<p class='commentRepeat' onclick='showCommentRepeatForm(this)'>{$sj}回复</p>
			<div id='divcommentRepeatNew{$i}' class='divToNone'>
			<form action='./show.php' class='commentRepeatForm displaynone' onsubmit='return newreplyComment(this)'>
			
			{$sj}<label for=\"\"><span class=\"newCommentUsername\">用户名: </span><input class='replyUsernamezzz' type=\"text\" name=\"replyUsername\" value=\"游客\" class=\"commentext\"></label><br><br>
				<input type='hidden' name='Pcommentid' value='{$hotCommentList[$i]['commentid']}'>
				<input type='hidden' name='replyAid' value='{$aid['aid']}'>
				{$sj}<input class='commentReplyText' type='text' name='replyComment'><input class='commentReplySub' type='submit' value='确　认'>
			</form>
			</div>	  	
			<p class='commentCommentTime'>
				更新时间 : {$hotCommentList[$i]['comment_time']}　<span class='commentLike' onclick='commentLike(this , {$hotCommentList[$i]['commentid']})'>点赞</span> :　<span id='span{$i}{$j}' class='commentLikeCount'>{$hotCommentList[$i]['like_count']}</span>
			</p>
			<hr>
		  ";
	}
  
	
	
	
	
	function replySon($pcommentid , $aid , $pname , $t)
	{
	  $t += 1;
	  $sql = "select * from comment where Pcommentid={$pcommentid}";
	  $son1Array = DB($sql);
	  if (!empty($son1Array))
	  {
		for ($j = 0; $j < count($son1Array); $j++)
		{
		  myechoFirst2($son1Array , $j , $aid , $pname , $pcommentid , $t , $j);
		  replySon($son1Array[$j]['commentid'] , $aid , $son1Array[$j]['username'] , $t);
		}
	  }
	  else {
		return false;
	  }
	}
    
    $t = 0;
	for ($i = 0; $i < count($hotCommentList); $i++)
	{
	  myechoFirst($hotCommentList , $i , $aid);
	  replySon($hotCommentList[$i]['commentid'] , $aid , $hotCommentList[$i]['username'] , $t);
	}//    -----------         for        ----------------------------
	
	echo $hotCommentListTotal['page'];
  }
  else
  {
	return false;
  }
}
//------------------hotCommentList---------------------------------------------------------------------------------------







//------------------newCommentList---------------------------------------------------------------------------------------

function newComment($aid)
{
  $sql = "select * from comment where status = 1 && aid = {$aid} && Pcommentid = 0 ORDER by comment_time desc ";
  $aid = array('aid' => $aid , 'new' => 1);
  $newCommentListTotal = getAjaxPageList($sql , $aid);
  $newCommentList = $newCommentListTotal['data'];
  if (!empty($newCommentList)) {
    
    
    function newEchoFirst($newCommentList , $i , $aid)
	{
	  echo "
		  	<p class='commentUserName'>
				<a href=\"#\">{$newCommentList[$i]['username']}{$newCommentList[$i]['commentid']}</a>
		  	</p>
		  	<p class='commentContent'>
		  		{$newCommentList[$i]['comment_content']}				
			</p >
			<p class='commentRepeat' onclick='showCommentRepeatForm(this)'>回复</p>
			<div id='divcommentRepeatNew{$i}' class='divToNone'>
			<form action='./show.php' class='commentRepeatForm displaynone' onsubmit='return newreplyComment(this)'>
			
			<label for=\"\"><span class=\"newCommentUsername\">用户名: </span><input class='replyUsernamezzz'  type=\"text\" name=\"replyUsername\" value=\"游客\" class=\"commentext\"></label><br><br>
				<input type='hidden' name='Pcommentid' value='{$newCommentList[$i]['commentid']}'>
				<input type='hidden' name='replyAid' value='{$aid['aid']}'>
				<input class='commentReplyText' type='text' name='replyComment'><input class='commentReplySub' type='submit' value='确　认'>
			</form>
			</div>
			<p class='commentCommentTime'>
				更新时间 : {$newCommentList[$i]['comment_time']}　<span class='newcommentLike' onclick='newcommentLike(this , {$newCommentList[$i]['commentid']})'>点赞</span> :　<span class='newcommentLikeCount'>{$newCommentList[$i]['like_count']}</span>
			</p>
			<hr>
		  ";
	}
  
	function newEchoFirst2($newCommentList , $i , $aid , $pname , $pcommentid , $t , $j)
	{
	  $sj = str_repeat('　　' , $t);
	  echo "
		  	<p class='commentUserName'>
				{$sj}<a href=\"#\">{$newCommentList[$i]['username']}{$newCommentList[$i]['commentid']}</a> 回复 {$pname} {$pcommentid}
		  	</p>
		  	<p class='commentContent'>
		  		{$sj}{$newCommentList[$i]['comment_content']}				
			</p >
			<p class='commentRepeat' onclick='showCommentRepeatForm(this)'>{$sj}回复</p>
			<div id='divcommentRepeatNew{$i}' class='divToNone'>
			<form action='./show.php' class='commentRepeatForm displaynone' onsubmit='return newreplyComment(this)'>
			
			{$sj}<label for=\"\"><span class=\"newCommentUsername\">用户名: </span><input class='replyUsernamezzz'  type=\"text\" name=\"replyUsername\" value=\"游客\" class=\"commentext\"></label><br><br>
				<input type='hidden' name='Pcommentid' value='{$newCommentList[$i]['commentid']}'>
				<input type='hidden' name='replyAid' value='{$aid['aid']}'>
				{$sj}<input class='commentReplyText' type='text' name='replyComment'><input class='commentReplySub' type='submit' value='确　认'>
			</form>
			</div>
			<p class='commentCommentTime'>
				更新时间 : {$newCommentList[$i]['comment_time']}　<span class='newcommentLike' onclick='newcommentLike(this , {$newCommentList[$i]['commentid']})'>点赞</span> :　<span class='newcommentLikeCount'>{$newCommentList[$i]['like_count']}</span>
			</p>
			<hr>
		  ";
	}
  
  
  
	function newreplySon($pcommentid , $aid , $pname , $t)
	{
	  $t += 1;
	  $sql = "select * from comment where Pcommentid={$pcommentid}";
	  $son1Array = DB($sql);
	  if (!empty($son1Array))
	  {
		for ($j = 0; $j < count($son1Array); $j++)
		{
		  newEchoFirst2($son1Array , $j , $aid , $pname , $pcommentid , $t , $j);
		  newreplySon($son1Array[$j]['commentid'] , $aid , $son1Array[$j]['username'] , $t);
		}
	  }
	  else {
		return false;
	  }
	}
  
  
	$t = 0;
	for ($i = 0; $i < count($newCommentList); $i++) {
	  newEchoFirst($newCommentList , $i , $aid);
	  newreplySon($newCommentList[$i]['commentid'] , $aid , $newCommentList[$i]['username'] , $t);
	}
	echo $newCommentListTotal['page'];
  }
  else
  {
	return false;
  }
}
//------------------newCommentList---------------------------------------------------------------------------------------









?>

