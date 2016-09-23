<?php
header("Content-Type:text/html;charset=utf-8");

include 'db.php';

//公用函数文件







//------------------分页---------------------------------------------------------------------------------------



function getPageList($sql = '', $query = array())
{
  // 1.总条数 count(总数据)
  // 2.每页条数 ,建议定义常量配置
  // 3.页数 ceil(总条数 / 每页条数)
  // 4.url  parse_url($_SERVER['REQUEST_URI']); 路径 , 参数
  // 5.当前页数 $_GET
  
  define('PAGE_NUM' , '5');
  define('PAGE_OFFSET' , '5');
  
//  var_dump(DB($sql));
//  die;
  
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

$sql = 'select * from tags';
$res = getPageList($sql);

var_dump($res);

echo $res['page'];





