<?php
header("Content-Type:text/html;charset=utf-8");


?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="jquery3.1.0.js"></script>
  <script src="ajaxfileupload.js"></script>
  <title>文件异步上传</title>
</head>
<body>
<!--<div data-role="fieldcontain" class="upload-box">-->
<!--  <label for="id_photos"><span class="red">* </span>您的有效证件照：</label>-->
<!--  <input type="file" id="id_photos" name="id_photos" value="上传" style="filter:alpha(opacity=10);-moz-opacity:10;opacity:10;" />-->
<!--  <p style="margin-top:0.5em;color:#999;font-size:11pt;">说明：请上传手持证件的半身照，请确保照片内证件信息清晰可读。</p>-->
<!--</div>-->
<div class="id_photos" >

</div>
<input type="file" id="id_photos" name="id_photos" value="上传">
</body>
<script>
  $(document).bind('pageinit', function(){
    //照片异步上传
    $('#id_photos').change(function(){  //此处用了change事件，当选择好图片打开，关闭窗口时触发此事件
      $.ajaxFileUpload({
        url:'/uploader/',   //处理图片的脚本路径
        type: 'post',       //提交的方式
        secureuri :false,   //是否启用安全提交
        fileElementId :'id_photos',     //file控件ID
        dataType : 'json',  //服务器返回的数据类型
        success : function (data, status){  //提交成功后自动执行的处理函数
          if(1 != data.total) return;　　 //因为此处指允许上传单张图片，所以数量如果不是1，那就是有错误了
          var url = data.files[0].path;
          $('.id_photos').empty();
          //此处效果是：当成功上传后会返回一个json数据，里面有url，取出url赋给img标签，然后追加到.id_photos类里显示出图片
          $('.id_photos').append('<img src="'+url+'" value="'+url+'" style="width:80%" >');
          //$('.upload-box').remove();
        },
        error: function(data, status, e){   //提交失败自动执行的处理函数
          alert(e);
        }
      })
    });
</script>
</html>