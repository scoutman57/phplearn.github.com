<?php
header("Content-Type:text/html;charset=utf-8");

include "public/func.php";
//print_r($_POST);
$searchText = $_POST['searchText'];
$searchIDType = $_POST['searchIDType'];
$searchID = $_POST['searchID'];
if ($searchIDType == 'cid');
{
  $sql = "select * from cate where pid = {$searchID}";
  $sonArray = DB($sql);
  $cate_name = DB("select * from cate where cid = {$searchID}")[0]['cate_name'];
  $strDiv = "{
  <div class=\"banner shadow two-nav\">
		首页 > {$cate_name}
	</div>}
  ";
  $cidStr = '';
  for ($i = 0 ; $i < count($sonArray) ; $i++)
  {
	$cidStr .= $sonArray[$i]['cid'].',';
  }
  $cidStr = $cidStr.$searchID;
  
  $sql = "select * from article where cid IN ({$cidStr}) && article_name LIKE '%{$searchText}%'";
//  print_r($sql);
  $pageArray = getPageList($sql);
  if (!empty($pageArray['data']))
  {
	$listArray = $pageArray['data'];
	$countListArray = count($listArray);
  }
  else
  {
	$pageArray = getPageList($sql);
	$listArray = array();
	$countListArray = count($listArray);
  }
}
$Json_listArray = json_encode($listArray);
print_r($Json_listArray);
//echo 111;
?>

