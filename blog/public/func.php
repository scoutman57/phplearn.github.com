<?php
header("Content-Type:text/html;charset=utf-8");

include 'db.php';

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
  // PAGE_NUM
  $totalNum = ceil($count / PAGE_NUM); //获取总页数,进一法取整
  
  $request_url = parse_url($_SERVER['REQUEST_URI']);  //获取当前URL的数组 path 路径, query 参数
  $path = $request_url['path']; //获取path 路径部分
  
  $page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : 1; //获取当前页
  
  $limit = ' LIMIT '.($page - 1) * PAGE_NUM.','.PAGE_NUM;  //组装limit 语句
  
  // limit 起始位置,取条数
  $datas = DB($sql . $limit); //执行SQL语句,获取数据数组
  
  $html = ''; //获取表格
  
  $geturl = !empty($query) ? http_build_query($query).'&' : '';
  
  if($count < PAGE_NUM)
	return $html;
  
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



function getUpload($file = 'pic' ,$type = array(), $uploadAddr = 'uploads')
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
	
	if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/admin/'.$uploadAddr))
	  mkdir($_SERVER['DOCUMENT_ROOT'].'/admin/'.$uploadAddr);
	
	if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/admin/'.$uploadAddr.'/'.date('Ym')))
	  mkdir($_SERVER['DOCUMENT_ROOT'].'/admin/'.$uploadAddr.'/'.date('Ym'));
	
	//并设置随机文件名
	$fileName = $uploadAddr.'/'.date('Ym').'/'.md5(microtime(true).rand(10000 , 99999)).'.'.$ext;
	// upload/201608/laksjdfl;kjas;ldfkja;slkdjfsad.jpg
	
	//移动文件,移动成功返回上传以后的文件路径
	return move_uploaded_file($fileTmp['tmp_name'] , $_SERVER['DOCUMENT_ROOT'].'/admin/'.$fileName) ? array('status' => '1' , 'data' => $fileName) : array('status' => '0' , 'data' => '文件移动失败');
  }else{
	return array('status' => '0' , 'data' => '文件传入失败');
  }
  
}
?>

