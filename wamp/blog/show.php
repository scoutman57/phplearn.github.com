<?php
include './public/header.php';


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
<input type='hidden' name='aid' value='{$_GET['aid']}'>
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
					<span>相关文章/Article</span>
				</p>
				<div class="cont-box">
					<ul>
					  <?php
					  
					  $sql = "select * from article WHERE cid = {$articleCid} ORDER BY top desc";
					  $topLIst = DB($sql);
					  $aid1 = $topLIst[0]['aid'];
					  $articleName = substr($topLIst[0]['article_name'] , 0 , 36);
					  echo "<li>
							<span class ='top'>top</span>
							<a href='show.php?aid={$topLIst[0]['aid']}'>{$articleName}</a>
						</li>";
					  
					  $sql = "select * from article WHERE cid = {$articleCid} ORDER BY click_count desc";
					  $hotLIst = DB($sql);
					  $aid2 = $hotLIst[0]['aid'];
					  $articleName = substr($hotLIst[0]['article_name'] , 0 , 36);
					  echo "<li>
							<span class ='hot'>hot</span>
							<a href='show.php?aid={$hotLIst[0]['aid']}'>{$articleName}</a>
						</li>";
					  
					  $sql = "select * from article WHERE cid = {$articleCid} ORDER BY last_time desc";
					  $newLIst = DB($sql);
					  $aid3 = $newLIst[0]['aid'];
					  $articleName = substr($topLIst[0]['article_name'] , 0 , 36);
					  echo "<li>
							<span class ='new'>new</span>
							<a href='show.php?aid={$newLIst[0]['aid']}'>{$articleName}</a>
						</li>";
					  
					  $sql = "select * from article where aid != {$aid1} && aid != {$aid2} && aid != {$aid3} && cid = {$articleCid} ";
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
				  $sql2 = "select tid from article_tags where aid = {$_GET['aid']}";
				  $bottomTagsArray = DB($sql2);
				  echo '标签:　';
				  for ($i = 0 ; $i < count($bottomTagsArray) ; $i++)
				  {
				    $sql3 = "select * from tags where tid = {$bottomTagsArray[$i]['tid']}";
					$tagArray = DB($sql3)[0];
					echo "<a href='./list.php?tid={$tagArray['tid']}'>{$tagArray['tagname']}</a> 　　";
				  }
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
  <div class="banner shadow two-nav">
  发表评论:
  </div>
  <div class="content clear">
	<!-- content left -->
	<div class="list-right clear">
	
	</div>
	
	<div class="center shadow list-center">
	  
	  <div class="cont-box">
		
		<div class="show-page">
		  <form action="commentAjax.php" id="comment_form">
			<input type="hidden" value="<?php echo $_GET['aid']; ?>" id="commentaid">
			<label for=""><span class="newCommentUsername">用户名: </span><input type="text" name="username" value="游客" class="commentext"></label><br><br>
			<textarea name="comment_content" id="" cols="80" rows="10"></textarea><br><br>
			<input type="button" id="btncomment" value="评　论">
		  </form>
		</div>
	  </div>
	</div>
	<!-- content center end -->
  
  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  <div class="banner shadow two-nav">
	查看评论:
  </div>
  <div class="content clear">
	<!-- content left -->
	<div class="list-right clear">
	
	</div>
	
	<div class="center shadow list-center">
	  <span class="commentTitle">最热评论:</span><br><br>
	  <div class="cont-box" id="hotCommentList">
<!--						<p class="show-title">-->
<!--							<a href="#">PHP是最火的语言吗?</a>-->
<!--						</p>-->
<!--						<p class="show-state">-->
<!--							更新时间 : 2016-05-11 作者 : Alan 分类 : PHP 浏览 : 5000-->
<!--						</p>-->
		<!--				<p class="show-content">-->
		<!--					PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?-->
		<!--				</p>-->
		<!--			  $articleCid-->
<!--		<div class="show-page">-->
<!--		  -->
<!--		</div>-->
	  </div>
	</div>
	<div class="center shadow list-center">
	  <span class="commentTitle">最新评论:</span><br><br>
	  <div class="cont-box" id="newCommentList">
		<!--						<p class="show-title">-->
		<!--							<a href="#">PHP是最火的语言吗?</a>-->
		<!--						</p>-->
		<!--						<p class="show-state">-->
		<!--							更新时间 : 2016-05-11 作者 : Alan 分类 : PHP 浏览 : 5000-->
		<!--						</p>-->
		<!--				<p class="show-content">-->
		<!--					PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?PHP是最火的语言吗?-->
		<!--				</p>-->
		<!--			  $articleCid-->
		<!--		<div class="show-page">-->
		<!--		  -->
		<!--		</div>-->
	  </div>
	</div>
	<!-- content center end -->
  
  </div>









  
  <script src="./js/jquery3.1.0.js"></script>
<script>
  var btncomment = document.getElementById('btncomment');
  var aid = document.getElementById('commentaid').value;
  btncomment.onclick = function ()//发表评论提交换刷新最热和最新评论
  {
    var username = document.getElementsByClassName('commentext')[0].value;
	var comment_content = document.getElementsByTagName('textarea')[0].value;
	var info = "aid="+aid+"&username="+username+"&comment_content="+comment_content;//请求字符串
  	if (username == '')
	{
	  alert('用户名不能为空!');
	  return false;
	}
	if (comment_content == '')
	{
	  alert('评论不能为空!');
	  return false;
	}
	//② ajax负责把收集好的信息传递给服务端
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
	  if(xhr.readyState==4){
		document.getElementById('hotCommentList').innerHTML = xhr.responseText;
		document.getElementsByTagName('textarea')[0].value = null;
	  }
	};
	xhr.open('post','./commentAjax.php');
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(info);
  
	refreshAll();
	
  
//	阻止浏览器默认动作
//	document.getElementById('comment_form').preventDefault();//事件对象阻止
	return false;
  };


  function commentLike(self , commentid)//最热文章点赞
  {
	var xhr2 = new XMLHttpRequest();
	var info2 = 'like_count='+commentid;
	xhr2.open('post','./commentAjax.php');
	xhr2.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr2.send(info2);
	var spant = $(self).next();
	var likeCount = spant.text()*1 + 1;
	spant.text(likeCount);
	$(self).css('color','red');
	self.onclick = null;
  }

  function newcommentLike(self , commentid)//最新文章点赞
  {
  var xhr2 = new XMLHttpRequest();
  var info2 = 'like_count='+commentid;
  xhr2.open('post','./commentAjax.php');
  xhr2.setRequestHeader("content-type","application/x-www-form-urlencoded");
  xhr2.send(info2);
  var spant = $(self).next();
  var likeCount = spant.text()*1 + 1;
  spant.text(likeCount);
  $(self).css('color','red');
  self.onclick = null;
}


  function pageClick(self)//点击页码换页
  {
  var myhref = self.href;
  var mystart = myhref.indexOf('?');
  var info3 = myhref.substr(mystart+1);
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function ()
  {
    if (xhr.readyState == 4)
	{
	  if (info3.indexOf('hot') >= 0)
	  {
		document.getElementById('hotCommentList').innerHTML = xhr.responseText;
	  }
	  else
	  {
		document.getElementById('newCommentList').innerHTML = xhr.responseText;
	  }
	}
  };
  xhr.open('post' , './commentAjax.php');
  xhr.setRequestHeader('content-type' , 'application/x-www-form-urlencoded');
  xhr.send(info3);
  return false;
}


  //页面加载完成后加载最热评论和最新评论
  $(function ()
  {
  refreshAll();
});
  
  function refreshAll()//刷新最热评论和最新评论
  {
	var info = "aid="+aid+"&refresh=1";
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function ()
	{
	  if (xhr.readyState == 4)
	  {
		document.getElementById('newCommentList').innerHTML = xhr.responseText;
	  }
	};
	xhr.open('post' , './commentAjax.php');
	xhr.setRequestHeader('content-type' , 'application/x-www-form-urlencoded');
	xhr.send(info);
  
	var info2 = "aid="+aid+"&refreshhot=1";
	var xhr2 = new XMLHttpRequest();
	xhr2.onreadystatechange = function ()
	{
	  if (xhr2.readyState == 4)
	  {
		document.getElementById('hotCommentList').innerHTML = xhr2.responseText;
	  }
	};
	xhr2.open('post' , './commentAjax.php');
	xhr2.setRequestHeader('content-type' , 'application/x-www-form-urlencoded');
	xhr2.send(info2);
  }
  
  
  function showCommentRepeatForm(self)//显示或者隐藏回复表单
  {
	$(self).next().toggleClass('divToNone');
  }
  
  function newreplyComment(self)//回复评论 并且刷新最热和最新评论  利用  FormData  收集表单信息  使用FormDate的时候不能设置setRequestHeader
  {
    var fd = new FormData(self);
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function ()
	{
	  if (xhr.readyState == 4)
	  {
		refreshAll();
	  }
	};
	xhr.open('post' , './commentAjax.php');
	xhr.send(fd);

//    alert(1);
    return false;
  }
  


  

</script>
	<!-- content end -->
<?php include_once './public/footer.php'; ?>