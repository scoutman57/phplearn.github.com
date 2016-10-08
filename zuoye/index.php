<?php
echo 1;
?>
<script src="../jquery3.1.0.js"></script>
<script type="text/javascript">
	$(function(){
		$.ajax({
			url:'data.php',
			data:{},
			method:'post',
			dataType:'json',
			success:function(data)
			{
				$.each(data,function(i,v)
				{
                       $('table').append("<tr>"+"<td><input type='checkbox'/></td>"+"<td>"+v.id+"</td>"+"<td>"+v.l_name+"</td>"+"<td>"+v.l_order+"</td>"+"<td>"+v.l_order+"</td>"+"</tr>");
				});



	$('tr td').dblclick(function()
	{
	var text=$(this).html();
	$(this).html('<input type="text" value='+"'"+text+"'"+"/>");
      $('tr td input').blur(function(){
      	       if(confirm('确认修改了'))
      	       	{
      	       		//这里还要往数据库中修改一下，这里传递的参数
      	      var modifyid=$(this).parent().prev().html();
      	       //把这个id传到后台，然后进行sql语句的修改
               //拿到这一行的值，
               var p=$(this).parent().siblings();
                 var allinputs=[];
               p.each(function()
               {
               	    //这里的是获取的是td的html()
               		allinputs.push($(this).html());

               })
               //当前元素是input，获取值必须使用val
             allinputs.push($(this).val());
             //删除checkbox
             allinputs.shift();
             //传递过去的时候使用关联数组
      	       		//在前台展示
      	       		var val=$(this).val();
	                $(this).parent().html(val);
      	       	}

		})

	});


			}
		})


$('button').click(function(){
	var arr=[];
	if($(':checked').length==0)
	{
         alert('请先选中然后再删除');
         return false;
	}
	//获取所有选中
 $(':checked').each(function()
	{
        arr.push($(this).parent().next().html());

	});
var items=arr.join(',');

$.ajax({
	url:'delete.php',
	method:'post',
	data:{"items":items},
	success:function(data){

      if(data==arr.length)
      {
         alert('删除成功');
         // 只是在页面上移除了显示情况
	   $(':checked').parent().parent().remove();
      }
      else
      {
          alert('删除失败');
      }
	}

})



	                        })





		//$(function()结尾)
	})



</script>



<table border="1"  cellspacing="0" style="width:400px;height:400px;">
    <tr>
    <th>全选</th>
    <th>序号</th>
    <th>名称</th><th>标题</th><th>地址</th>
    <th><button>删除</button></th>
    </tr>



</table>