<!-- footer -->
	<div class="footer">
		<div class="foot-content">
			<a href="#">关于我们</a>　|　
			<a href="#">联系我们</a>　|　
			<a href="#">版权声明</a>　|　
			<a href="#">友情链接</a>
			<span><a href="mailto:martinzzfx@gmail.com">Email : martinzzfx@gmail.com</a>　　&copy;Martin Zeng</span>
		</div>
	</div>
	<!-- footer end -->
	<!-- to top -->
	<div id="to-top" style="display:none">Top</div>
	<!-- to top end -->
	<script type="text/javascript">
		Qfast.add('widgets', { path: "js/terminator2.2.min.js", type: "js", requires: ['fx'] });  
		Qfast(false, 'widgets', function () {
			K.tabs({
				id: 'fsD1',   //焦点图包裹id  
				conId: "D1pic1",  //** 大图域包裹id  
				tabId:"D1fBt",  
				tabTn:"a",
				conCn: '.fcon', //** 大图域配置class       
				auto: 1,   //自动播放 1或0
				effect: 'fade',   //效果配置
				eType: 'click', //** 鼠标事件
				pageBt:true,//是否有按钮切换页码
				bns: ['.prev', '.next'],//** 前后按钮配置class                          
				interval: 3000  //** 停顿时间  
			}) 
		})  
	</script>
	<script type="text/javascript" src="js/menu.js"></script>
</body>
</html>