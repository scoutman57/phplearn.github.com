<?php
include './public/header.php';
//var_dump($_GET);
//die;
$sql = "update article set click_count = click_count+1";
DB($sql);
$sql = "select * from article where aid ={$_GET['aid']}";
$cList = DB($sql);
$articleCid = $cList[0]['cid'];
$sql = "select * from cate WHERE cid = {$articleCid}";
$cateName = DB($sql)[0]['cate_name'];
$catePid = DB($sql)[0]['pid'];
if ($catePid != 0)
{
  $sql = "select * from cate WHERE cid = {$catePid}";
  $pList = DB($sql);
  $catePName = $pList[0]['cate_name'];
  echo "
  <div class=\"banner shadow two-nav\">
		首页 > <a href='list.php?cid={$pList[0]['cid']}'>{$catePName}</a> > {$cateName}
	</div>
  ";
}
else
{
  echo "
  <div class=\"banner shadow two-nav\">
		首页  > {$cateName}
	</div>
  ";
}
//var_dump($cateName , $articleCid , $catePid);
?>
	<!-- banner -->
<!--	<div class="banner shadow two-nav">-->
<!--		首页 > <a href="list.html">神技能</a> > PHP是最火的语言吗?-->
<!--	</div>-->
	<!-- banner end -->
	<!-- content -->
	<div class="content clear">
		<!-- content left -->
		<div class="list-right clear">
			<div class="right shadow f-right no-bor">
				<p class="title">
					<span>热门文章/Article</span>
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

			<?php include_once './public/tags.php'; ?>

		</div>
		

		<!-- content left end -->
		<!-- content center -->

		<div class="center shadow list-center">
			
			<div class="cont-box">
			  <?php
//			  var_dump($cList);
			  $articleText = htmlspecialchars_decode(file_get_contents("./admin/article/articles/uploads/{$cList[0]['article_content']}"));
			  $tag2 = '';
			  $sql = "select * from article_tags where aid = {$cList[0]['aid']}";
			  $atArray = DB($sql);
			  for ($j = 0 ; $j < count($atArray) ; $j++)
			  {
				$sql = "select * from tags where tid = {$atArray[$j]['tid']}";
				$tag2 .= DB($sql)[0]['tagname'].'　';
			  }
			  echo "
			  <p class=\"show-title\">
					<a href=\"#\">{$cList[0]['article_name']}</a>
				</p>
				<p class=\"show-state\">
					更新时间 : {$cList[0]['last_time']} 作者 : {$cList[0]['article_author']} 分类 : {$tag2} 浏览 : {$cList[0]['click_count']}
				</p>
				<p class=\"show-content\">
					{$articleText}
				</p>
			  ";
			  ?>
					
<!--				<p class="show-title">-->
<!--					<a href="#">PHP是最火的语言吗?</a>-->
<!--				</p>-->
<!--				<p class="show-state">-->
<!--					更新时间 : 2016-05-11 作者 : Alan 分类 : PHP 浏览 : 5000-->
<!--				</p>-->
<!--				<p class="show-content">-->
<!--					PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?-->
<!--				</p>-->
<!--			  $articleCid-->
				<div class="show-page">
				  <?php
//
//				  var_dump($articleCid , $_GET['aid']);
				  $sql = "select max(aid) from article where cid={$articleCid} && aid < {$_GET['aid']}";
				  $prevArticleAid = DB($sql)[0]['max(aid)'];
				  $sql = "select min(aid) from article where cid={$articleCid} && aid > {$_GET['aid']}";
				  $nextArticleAid = DB($sql)[0]['min(aid)'];
//				  var_dump($prevArticleAid , $nextArticleAid);
				  if ($prevArticleAid != null)
				  {
				    $sql = "select * from article where aid = {$prevArticleAid}";
					$prevArticle = DB($sql);
					echo "
					<p>
						上一篇 : <a href='show.php?aid={$prevArticle[0]['aid']}'>{$prevArticle[0]['article_name']}</a>
					</p>
					";
				  }
				  else
				  {
				    echo "<p>上一篇 : 没有了</p>";
				  }
				  if ($nextArticleAid != null)
				  {
					$sql = "select * from article where aid = {$nextArticleAid}";
					$nextArticle = DB($sql);
					echo "
					<p>
						上一篇 : <a href='show.php?aid={$nextArticle[0]['aid']}'>{$nextArticle[0]['article_name']}</a>
					</p>
					";
				  }
				  else
				  {
					echo "<p>下一篇 : 没有了</p>";
				  }
				  ?>
<!--					<p>上一篇 : 没有了</p>-->
<!--					<p>-->
<!--						下一篇 : <a href="#">对方不想跟你说话,并向你推荐了世界上最好的语言 --- PHP</a>-->
<!--					</p>-->
				</div>	
			</div>
		</div>
		<!-- content center end -->
		
	</div>	
	<!-- content end -->
<?php include_once './public/footer.php'; ?>