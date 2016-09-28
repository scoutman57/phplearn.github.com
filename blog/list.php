<?php

include 'public/header.php';
//var_dump($_GET);
//die;
if (!empty($_GET))
{
  //------------------------模糊查询开始-----------------------------------------------------------------------------------------
  if (isset($_GET['searchValue']) && !isset($_GET['page']))
  {
    if ($_GET['hiddenName'] == 'all')
	{
	  $_SESSION = array();
	  $_SESSION['hiddenName'] = $_GET['hiddenName'];
	  $_SESSION['searchValue'] = $_GET['searchValue'];
	  $_SESSION['hiddenValue'] = $_GET['hiddenValue'];
	  $sql = "select * from article where article_name LIKE '%{$_GET['searchValue']}%'";
	  $pageArray = getPageList($sql);
	  echo "
  <div class=\"banner shadow two-nav\">
		首页 > 文章
	</div>
  ";
	  if (!empty($pageArray['data']))
	  {
		$listArray = $pageArray['data'];
		$countListArray = count($listArray);
	  }
	  else
	  {
		$listArray = array();
		$countListArray = count($listArray);
	  }
	}
	elseif ($_GET['hiddenName'] == 'tid')
	{
	  $_SESSION = array();
	  $_SESSION['hiddenName'] = $_GET['hiddenName'];
	  $_SESSION['searchValue'] = $_GET['searchValue'];
	  $_SESSION['hiddenValue'] = $_GET['hiddenValue'];
	  $sql = "select * from tags where tid = {$_GET['hiddenValue']}";
//	  $_SESSION['tid'] = $_GET['tid'];
	  $tagArray = DB($sql)[0];
	  echo "
  <div class=\"banner shadow two-nav\">
		首页 > {$tagArray['tagname']}
	</div>
  ";
	  $sql = "select * from article_tags where tid={$_GET['hiddenValue']}";
	  $aidArray = DB($sql);
	  if (!empty($aidArray))
	  {
		$strtemp = '';
		$countAidArray = count($aidArray);
		for ($i = 0; $i < $countAidArray; $i++) {
		  $strtemp .= $aidArray[$i]['aid'] . ',';
		}
		$strtemp = rtrim($strtemp, ',');
		$sql = "Select * from article where aid in({$strtemp}) && article_name LIKE '%{$_GET['searchValue']}%' ORDER BY top DESC , last_time DESC ";
		$pageArray = getPageList($sql);
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
	elseif ($_GET['hiddenName'] == 'cid')
	{
	  $_SESSION = array();
	  $_SESSION['hiddenName'] = $_GET['hiddenName'];
	  $_SESSION['searchValue'] = $_GET['searchValue'];
	  $_SESSION['hiddenValue'] = $_GET['hiddenValue'];
	  $sql = "select * from cate where pid = {$_GET['hiddenValue']}";
	  $sonArray = DB($sql);
	  $cate_name = DB("select * from cate where cid = {$_GET['hiddenValue']}")[0]['cate_name'];
//	  var_dump(DB("select * from cate where cid = {$_GET['hiddenValue']}"));
//	  die;
	  echo "
  <div class=\"banner shadow two-nav\">
		首页 > {$cate_name}
	</div>
  ";
	  $cidStr = '';
	  for ($i = 0 ; $i < count($sonArray) ; $i++)
	  {
		$cidStr .= $sonArray[$i]['cid'].',';
	  }
	  $cidStr = $cidStr.$_GET['hiddenValue'];
	  
	  $sql = "select * from article where cid IN ({$cidStr}) && article_name LIKE '%{$_GET['searchValue']}%'";
	  $pageArray = getPageList($sql);
	  if (!empty($pageArray['data']))
	  {
		$listArray = $pageArray['data'];
		$countListArray = count($listArray);
	  }
	  else
	  {
		$listArray = array();
		$countListArray = count($listArray);
	  }
	}
	elseif ($_GET['hiddenName'] == 'cid2')
	{
	  $_SESSION = array();
	  $_SESSION['hiddenName'] = $_GET['hiddenName'];
	  $_SESSION['searchValue'] = $_GET['searchValue'];
	  $_SESSION['hiddenValue'] = $_GET['hiddenValue'];
	  $sql = "select * from cate where cid = {$_GET['hiddenValue']}";
	  $pidCateName = DB($sql)[0]['cate_name'];
	  $sql = "select * from cate where cid = {$_GET['hiddenValue']}";
	  $cateName = DB($sql)[0]['cate_name'];
	  echo "
  <div class=\"banner shadow two-nav\">
		首页 > {$pidCateName} > {$cateName}
	</div>
  ";
	  $sql = "select * from article where cid = {$_GET['hiddenValue']} && article_name LIKE '%{$_GET['searchValue']}%'";
	  $pageArray = getPageList($sql);
	  if (!empty($pageArray['data']))
	  {
		$listArray = $pageArray['data'];
		$countListArray = count($listArray);
	  }
	  else
	  {
		$listArray = array();
		$countListArray = count($listArray);
	  }
	}
  }//----------------------------------------------------------------
  elseif(isset($_SESSION['searchValue']) && isset($_GET['page']))
  {
	if ($_SESSION['hiddenName'] == 'tid')
	{
	  echo "<input type='hidden' id='myhidden' name='tid' value='{$_SESSION['hiddenValue']}'>";
	  $sql = "select * from tags where tid = {$_SESSION['hiddenValue']}";
	  $tagArray = DB($sql)[0];
	  echo "
  <div class=\"banner shadow two-nav\">
		首页 > {$tagArray['tagname']}
	</div>
  ";
	  $sql = "Select * from article where article_name LIKE '%{$_SESSION['searchValue']}%' ORDER BY top DESC , last_time DESC ";
	  $pageArray = getPageList($sql);
	  $listArray = $pageArray['data'];
	  $countListArray = count($listArray);
	}
	elseif ($_SESSION['hiddenName'] == 'cid')
	{
	  echo "<input type='hidden' id='myhidden' name='cid' value='{$_SESSION['hiddenValue']}'>";
	  $sql = "select * from cate where cid = {$_SESSION['hiddenValue']}";
	  $cateName = DB($sql)[0]['cate_name'];
	  $sql = "select pid from cate where cate_name = '{$cateName}'";
	  $pidCateName = DB($sql)[0]['pid'];
	  $sql = "select cate_name from cate where cid = {$pidCateName}";
	  $pidCateName = DB($sql)[0]['cate_name'];
	  echo "
  <div class=\"banner shadow two-nav\">
		首页 > {$pidCateName} > {$cateName}
	</div>
  ";
	  $sql = "select * from article where cid = {$_SESSION['hiddenValue']} && article_name LIKE '%{$_SESSION['searchValue']}%'";
	  $pageArray = getPageList($sql);
	  if (!empty($pageArray['data']))
	  {
		$listArray = $pageArray['data'];
		$countListArray = count($listArray);
	  }
	  else
	  {
		$listArray = array();
		$countListArray = count($listArray);
	  }
	}
	elseif ($_SESSION['hiddenName'] == 'all')
	{
	  echo "<input type='hidden' id='myhidden' name='all' value='{$_SESSION['hiddenValue']}'>";
	  $sql = "select * from article where article_name LIKE '%{$_SESSION['searchValue']}%'";
	  $pageArray = getPageList($sql);
	  echo "
  <div class=\"banner shadow two-nav\">
		首页 > 文章
	</div>
  ";
	  if (!empty($pageArray['data']))
	  {
		$listArray = $pageArray['data'];
		$countListArray = count($listArray);
	  }
	  else
	  {
		$listArray = array();
		$countListArray = count($listArray);
	  }
	}
	elseif ($_SESSION['hiddenName'] == 'cid2')
	{
	  echo "<input type='hidden' id='myhidden' name='cid2' value='{$_SESSION['hiddenValue']}'>";
	  $sql = "select * from cate where cid = {$_SESSION['hiddenValue']}";
	  $pidCateName = DB($sql)[0]['cate_name'];
	  $sql = "select * from cate where cid = {$_SESSION['hiddenValue']}";
	  $cateName = DB($sql)[0]['cate_name'];
	  echo "
  <div class=\"banner shadow two-nav\">
		首页 > {$pidCateName} > {$cateName}
	</div>
  ";
	  $sql = "select * from article where cid = {$_SESSION['hiddenValue']} && article_name LIKE '%{$_SESSION['searchValue']}%'";
	  $pageArray = getPageList($sql);
	  if (!empty($pageArray['data']))
	  {
		$listArray = $pageArray['data'];
		$countListArray = count($listArray);
	  }
	  else
	  {
		$listArray = array();
		$countListArray = count($listArray);
	  }
	}
  }
  
  //------------------------模糊查询结束-----------------------------------------------------------------------------------------

  else
  {
	if (!isset($_GET['page']))
	{
	  if (isset($_GET['cid']))
	  {
		echo "<input type='hidden' id='myhidden' name='cid' value='{$_GET['cid']}'>";
		$_SESSION = array();
		$_SESSION['cid'] = $_GET['cid'];
		$sql = "select * from cate where pid = {$_GET['cid']}";
		$sonArray = DB($sql);
		$cate_name = DB("select * from cate where cid = {$_GET['cid']}")[0]['cate_name'];
		echo "
  <div class=\"banner shadow two-nav\">
		首页 > {$cate_name}
	</div>
  ";
		$cidStr = '';
		for ($i = 0 ; $i < count($sonArray) ; $i++)
		{
		  $cidStr .= $sonArray[$i]['cid'].',';
		}
		$cidStr = $cidStr.$_GET['cid'];
	  
		$sql = "select * from article where cid IN ({$cidStr})";
		$pageArray = getPageList($sql);
		if (!empty($pageArray['data']))
		{
		  $listArray = $pageArray['data'];
		  $countListArray = count($listArray);
		}
		else
		{
//		  $pageArray = getPageList($sql);
		  $listArray = array();
		  $countListArray = count($listArray);
		}
	  }
	  elseif (isset($_GET['cid2']))
	  {
		echo "<input type='hidden' id='myhidden' name='cid2' value='{$_GET['cid2']}'>";
		$_SESSION = array();
		$_SESSION['cid'] = $_GET['pid'];
		$_SESSION['cid2'] = $_GET['cid2'];
		$sql = "select * from cate where cid = {$_GET['pid']}";
		$pidCateName = DB($sql)[0]['cate_name'];
		$sql = "select * from cate where cid = {$_GET['cid2']}";
		$cateName = DB($sql)[0]['cate_name'];
//	  var_dump($pidCateName , $cateName);
//	  die;
		echo "
  <div class=\"banner shadow two-nav\">
		首页 > {$pidCateName} > {$cateName}
	</div>
  ";
		$sql = "select * from article where cid = {$_GET['cid2']}";
		$pageArray = getPageList($sql);
		if (!empty($pageArray['data']))
		{
		  $listArray = $pageArray['data'];
		  $countListArray = count($listArray);
		}
		else
		{
//		  $pageArray = getPageList($sql);
		  $listArray = array();
		  $countListArray = count($listArray);
		}
	  }
	  elseif (isset($_GET['articleSearchValue']))//详情页搜索框
	  {
		echo "<input type='hidden' id='myhidden' name='all' value='{$_GET['articleSearchValue']}'>";
		$_SESSION = array();
		$_SESSION['articleSearchValue'] = $_GET['articleSearchValue'];
		echo "
  <div class=\"banner shadow two-nav\">
		首页 > 文章
	</div>
  ";
		$sql = "select * from article where article_name like '%{$_GET['articleSearchValue']}%'";
		$pageArray = getPageList($sql);
		if (!empty($pageArray['data']))
		{
		  $listArray = $pageArray['data'];
		  $countListArray = count($listArray);
		}
		else
		{
		  $listArray = array();
		  $countListArray = count($listArray);
		}
	  }
	  else
	  {
		echo "<input type='hidden' id='myhidden' name='tid' value='{$_GET['tid']}'>";
		$_SESSION = array();
		$sql = "select * from tags where tid = {$_GET['tid']}";
		$_SESSION['tid'] = $_GET['tid'];
		$tagArray = DB($sql)[0];
		echo "
  <div class=\"banner shadow two-nav\">
		首页 > {$tagArray['tagname']}
	</div>
  ";
		$sql = "select * from article_tags where tid={$_GET['tid']}";
		$aidArray = DB($sql);
		if (!empty($aidArray))
		{
		  $strtemp = '';
		  $countAidArray = count($aidArray);
		  for ($i = 0; $i < $countAidArray; $i++) {
			$strtemp .= $aidArray[$i]['aid'] . ',';
		  }
		  $strtemp = rtrim($strtemp, ',');
		  $sql = "Select * from article where aid in({$strtemp}) ORDER BY top DESC , last_time DESC ";
		  $pageArray = getPageList($sql);
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
	
	}
	else
	{
	  if (isset($_SESSION['tid']))
	  {
		echo "<input type='hidden' id='myhidden' name='tid' value='{$_SESSION['tid']}'>";
		$sql = "select * from tags where tid = {$_SESSION['tid']}";
		$tagArray = DB($sql)[0];
		echo "
  <div class=\"banner shadow two-nav\">
		首页 > {$tagArray['tagname']}
	</div>
  ";
		$sql = "Select * from article  ORDER BY top DESC , last_time DESC ";
		$pageArray = getPageList($sql);
		$listArray = $pageArray['data'];
		$countListArray = count($listArray);
	  }
	  elseif (isset($_SESSION['cid2']))
	  {
		echo "<input type='hidden' id='myhidden' name='cid2' value='{$_SESSION['cid2']}'>";
		$sql = "select * from cate where cid = {$_SESSION['pid']}";
		$pidCateName = DB($sql)[0]['cate_name'];
		$sql = "select * from cate where cid = {$_SESSION['cid2']}";
		$cateName = DB($sql)[0]['cate_name'];
//	  var_dump($pidCateName , $cateName);
//	  die;
		echo "
  <div class=\"banner shadow two-nav\">
		首页 > {$pidCateName} > {$cateName}
	</div>
  ";
		$sql = "select * from article where cid = {$_SESSION['cid2']}";
		$pageArray = getPageList($sql);
		if (!empty($pageArray['data']))
		{
		  $listArray = $pageArray['data'];
		  $countListArray = count($listArray);
		}
		else
		{
//		  $pageArray = getPageList($sql);
		  $listArray = array();
		  $countListArray = count($listArray);
		}
	  }
	  elseif (isset($_SESSION['articleSearchValue']))
	  {
		echo "
  <div class=\"banner shadow two-nav\">
		首页 > 文章
	</div>
  ";
		echo "<input type='hidden' id='myhidden' name='all' value='{$_SESSION['articleSearchValue']}'>";
		$sql = "select * from article where article_name LIKE '%{$_SESSION['articleSearchValue']}%'";
		$pageArray = getPageList($sql);
		if (!empty($pageArray['data']))
		{
		  $listArray = $pageArray['data'];
		  $countListArray = count($listArray);
		}
		else
		{
		  $listArray = array();
		  $countListArray = count($listArray);
		}
	  }
	  elseif(isset($_SESSION['cid']))
	  {
		echo "<input type='hidden' id='myhidden' name='cid' value='{$_SESSION['cid']}'>";
		$sql = "select * from cate where pid = {$_SESSION['cid']}";
		$sonArray = DB($sql);
		$cate_name = DB("select * from cate where cid = {$_SESSION['cid']}")[0]['cate_name'];
		echo "
  <div class=\"banner shadow two-nav\">
		首页 > {$cate_name}
	</div>
  ";
		$cidStr = '';
		for ($i = 0 ; $i < count($sonArray) ; $i++)
		{
		  $cidStr .= $sonArray[$i]['cid'].',';
		}
		$cidStr = $cidStr.$_SESSION['cid'];
	  
		$sql = "select * from article where cid IN ({$cidStr})";
		$pageArray = getPageList($sql);
		if (!empty($pageArray['data']))
		{
		  $listArray = $pageArray['data'];
		  $countListArray = count($listArray);
		}
		else
		{
//		  $pageArray = getPageList($sql);
		  $listArray = array();
		  $countListArray = count($listArray);
		}
	  }
	  else
	  {
		  echo "<input type='hidden' id='myhidden' name='all' value='all'>";
		  echo "
  <div class=\"banner shadow two-nav\">
		首页 > 文章
	</div>
  ";
		  $sql = "Select * from article  ORDER BY top DESC , last_time DESC ";
		  $pageArray = getPageList($sql);
		  $listArray = $pageArray['data'];
		  $countListArray = count($listArray);
	  }
	}
  }
  
}
else
{
  $_SESSION = array();
  echo "<input type='hidden' id='myhidden' name='all' value='all'>";
  echo "
  <div class=\"banner shadow two-nav\">
		首页 > 文章
	</div>
  ";
  $sql = "Select * from article  ORDER BY top DESC , last_time DESC ";
  $pageArray = getPageList($sql);
  $listArray = $pageArray['data'];
  $countListArray = count($listArray);
}
?>
	<!-- banner -->
<!--	<div class="banner shadow two-nav">-->
<!--		首页 > 神技能-->
<!--	</div>-->
	<!-- banner end -->
	<!-- content -->
	<div class="content clear">
		<!-- content left -->
		<div class="list-right clear">
			<div class="right shadow f-right no-bor">
				<p class="title">
					<span>热门文章/Hot</span>
				</p>
				<div class="cont-box">
					<ul>
					  <?php
					  
					  $sql = "select * from article ORDER BY top desc";
					  $topLIst = DB($sql);
					  $aid1 = $topLIst[0]['aid'];
					  $articleName = substr($topLIst[0]['article_name'] , 0 , 36);
					  echo "<li>
							<span class ='top'>top</span>
							<a href='show.php?aid={$topLIst[0]['aid']}'>{$articleName}</a>
						</li>";
					  
					  $sql = "select * from article ORDER BY click_count desc";
					  $hotLIst = DB($sql);
					  $aid2 = $hotLIst[0]['aid'];
					  $articleName = substr($hotLIst[0]['article_name'] , 0 , 36);
					  echo "<li>
							<span class ='hot'>hot</span>
							<a href='show.php?aid={$hotLIst[0]['aid']}'>{$articleName}</a>
						</li>";
					  
					  $sql = "select * from article ORDER BY last_time desc";
					  $newLIst = DB($sql);
					  $aid3 = $newLIst[0]['aid'];
					  $articleName = substr($topLIst[0]['article_name'] , 0 , 36);
					  echo "<li>
							<span class ='new'>new</span>
							<a href='show.php?aid={$newLIst[0]['aid']}'>{$articleName}</a>
						</li>";
					  
					  $sql = "select * from article where aid != {$aid1} && aid != {$aid2} && aid != {$aid3}";
					  $otherArticleList = DB($sql);
					  $countOtherArticleList = count($otherArticleList) > 7 ? 7 : count($otherArticleList);
					  for ($i = 0 ; $i < $countOtherArticleList ; $i++)
					  {
						$articleName = substr($otherArticleList[$i]['article_name'] , 0 , 36);
						echo "<li>
						<a href='show.php?aid={$otherArticleList[$i]['aid']}'>{$articleName}</a>
						</li>";
					  }
					  ?>
<!--						<li>-->
<!--							<span class ="top">top</span>-->
<!--							<a href="#">DIV + CSS布局的技巧分享</a>-->
<!--						</li>-->
<!--						<li>-->
<!--							<span class ="hot">hot</span>-->
<!--							<a href="#">DIV + CSS布局的技巧分享</a>-->
<!--						</li>-->
<!--						<li>-->
<!--							<span class ="new">new</span>-->
<!--							<a href="#">DIV + CSS布局的技巧分享</a>-->
<!--						</li>-->
<!--						<li><a href="#">DIV + CSS布局的技巧分享</a></li>-->
<!--						<li><a href="#">DIV + CSS布局的技巧分享</a></li>-->
<!--						<li><a href="#">DIV + CSS布局的技巧分享</a></li>-->
<!--						<li><a href="#">DIV + CSS布局的技巧分享</a></li>-->
<!--						<li><a href="#">DIV + CSS布局的技巧分享</a></li>-->
<!--						<li><a href="#">DIV + CSS布局的技巧分享</a></li>-->
						
					</ul>
				</div>
			</div>

			<?php include './public/tags.php'; ?>

		</div>
		

		<!-- content left end -->
		<!-- content center -->

		<div class="center shadow list-center">
			
			<div class="cont-box">
				<ul>
				  <?php
				  for ($i = 0 ; $i < $countListArray ; $i++)
				  {
					$tag2 = '';
				    $sql = "select * from article_tags where aid = {$listArray[$i]['aid']}";
					$atArray = DB($sql);
					for ($j = 0 ; $j < count($atArray) ; $j++)
					{
					  $sql = "select * from tags where tid = {$atArray[$j]['tid']}";
					  $tag2 .= DB($sql)[0]['tagname'].'　';
					}
				    echo "
				    <li>
						<p class=\"list-title\">
							<a href=\"show.php?aid={$listArray[$i]['aid']}\">{$listArray[$i]['article_name']}</a>
						</p>
						<p class=\"list-state\">
							更新时间 : {$listArray[$i]['last_time']} 作者 : {$listArray[$i]['article_author']} 分类 : {$tag2} 浏览 : {$listArray[$i]['click_count']}
						</p>
						<p class=\"list-desc\">
							{$listArray[$i]['article_describe']}
						</p>
					</li>
				    ";
				  }
				  
				  ?>
<!--					<li>-->
<!--						<p class="list-title">-->
<!--							<a href="show.php">PHP是最火的语言吗?</a>-->
<!--						</p>-->
<!--						<p class="list-state">-->
<!--							更新时间 : 2016-05-11 作者 : Alan 分类 : PHP 浏览 : 5000-->
<!--						</p>-->
<!--						<p class="list-desc">-->
<!--							PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?-->
<!--						</p>-->
<!--					</li>-->
<!--					<li>-->
<!--						<p class="list-title">-->
<!--							<a href="#">PHP是最火的语言吗?</a>-->
<!--						</p>-->
<!--						<p class="list-state">-->
<!--							更新时间 : 2016-05-11 作者 : Alan 分类 : PHP 浏览 : 5000-->
<!--						</p>-->
<!--						<p class="list-desc">-->
<!--							PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?-->
<!--						</p>-->
<!--					</li>-->
<!--					<li>-->
<!--						<p class="list-title">-->
<!--							<a href="#">PHP是最火的语言吗?</a>-->
<!--						</p>-->
<!--						<p class="list-state">-->
<!--							更新时间 : 2016-05-11 作者 : Alan 分类 : PHP 浏览 : 5000-->
<!--						</p>-->
<!--						<p class="list-desc">-->
<!--							PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?-->
<!--						</p>-->
<!--					</li>-->
<!--					<li>-->
<!--						<p class="list-title">-->
<!--							<a href="#">PHP是最火的语言吗?</a>-->
<!--						</p>-->
<!--						<p class="list-state">-->
<!--							更新时间 : 2016-05-11 作者 : Alan 分类 : PHP 浏览 : 5000-->
<!--						</p>-->
<!--						<p class="list-desc">-->
<!--							PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?-->
<!--						</p>-->
<!--					</li>-->
<!--					<li>-->
<!--						<p class="list-title">-->
<!--							<a href="#">PHP是最火的语言吗?</a>-->
<!--						</p>-->
<!--						<p class="list-state">-->
<!--							更新时间 : 2016-05-11 作者 : Alan 分类 : PHP 浏览 : 5000-->
<!--						</p>-->
<!--						<p class="list-desc">-->
<!--							PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?-->
<!--						</p>-->
<!--					</li>-->
<!--					<li>-->
<!--						<p class="list-title">-->
<!--							<a href="#">PHP是最火的语言吗?</a>-->
<!--						</p>-->
<!--						<p class="list-state">-->
<!--							更新时间 : 2016-05-11 作者 : Alan 分类 : PHP 浏览 : 5000-->
<!--						</p>-->
<!--						<p class="list-desc">-->
<!--							PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?-->
<!--						</p>-->
<!--					</li>-->
<!--					<li>-->
<!--						<p class="list-title">-->
<!--							<a href="#">PHP是最火的语言吗?</a>-->
<!--						</p>-->
<!--						<p class="list-state">-->
<!--							更新时间 : 2016-05-11 作者 : Alan 分类 : PHP 浏览 : 5000-->
<!--						</p>-->
<!--						<p class="list-desc">-->
<!--							PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?-->
<!--						</p>-->
<!--					</li>-->
<!--					<li>-->
<!--						<p class="list-title">-->
<!--							<a href="#">PHP是最火的语言吗?</a>-->
<!--						</p>-->
<!--						<p class="list-state">-->
<!--							更新时间 : 2016-05-11 作者 : Alan 分类 : PHP 浏览 : 5000-->
<!--						</p>-->
<!--						<p class="list-desc">-->
<!--							PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?-->
<!--						</p>-->
<!--					</li>-->
<!--					<li>-->
<!--						<p class="list-title">-->
<!--							<a href="#">PHP是最火的语言吗?</a>-->
<!--						</p>-->
<!--						<p class="list-state">-->
<!--							更新时间 : 2016-05-11 作者 : Alan 分类 : PHP 浏览 : 5000-->
<!--						</p>-->
<!--						<p class="list-desc">-->
<!--							PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?-->
<!--						</p>-->
<!--					</li>-->
<!--					<li>-->
<!--						<p class="list-title">-->
<!--							<a href="#">PHP是最火的语言吗?</a>-->
<!--						</p>-->
<!--						<p class="list-state">-->
<!--							更新时间 : 2016-05-11 作者 : Alan 分类 : PHP 浏览 : 5000-->
<!--						</p>-->
<!--						<p class="list-desc">-->
<!--							PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?-->
<!--						</p>-->
<!--					</li>-->
<!--					<li>-->
<!--						<p class="list-title">-->
<!--							<a href="#">PHP是最火的语言吗?</a>-->
<!--						</p>-->
<!--						<p class="list-state">-->
<!--							更新时间 : 2016-05-11 作者 : Alan 分类 : PHP 浏览 : 5000-->
<!--						</p>-->
<!--						<p class="list-desc">-->
<!--							PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?-->
<!--						</p>-->
<!--					</li>-->
					
				</ul>
			  
			  <?php
			  echo "{$pageArray['page']}";
			  ?>
<!--				<div class="page">-->
<!--					<a href="#">上一页</a>-->
<!--					<a href="#">首页</a>-->
<!--					<a href="#">1</a>-->
<!--					<a href="#">2</a>-->
<!--					<a href="#" class="on">3</a>-->
<!--					<a href="#">4</a>-->
<!--					<a href="#">5</a>-->
<!--					<a href="#">尾页</a>-->
<!--					<a href="#">下一页</a>-->
<!--					共 800 条-->
<!--				</div>-->
			</div>
		</div>
		<!-- content center end -->
		
	</div>	
	<!-- content end -->
<?php include './public/footer.php'; ?>