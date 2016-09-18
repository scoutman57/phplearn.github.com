function ajax_post(url,data,callback)
     {
        var xhr=new XMLHttpRequest();
        xhr.onreadystatechange=function()
        {
        	if(xhr.readyState==4 && xhr.status==200)
        	{
               callback(xhr.responseText);
        	}

        }
        xhr.open('POST',url,true);
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.send(data);
     }


// var btn= document.getElementById('btn');
// var msg,timer,i=60,flag=false;
// function getCode()
// {
//      clearInterval(timer);
//      timer=setInterval(function(){
//     	if(i>0)
//     	{
//     	   i--;
//     	   flag=true;
//            msg="剩余"+i+"秒";
//     	}
//     	else
//     	{
//     	   clearInterval(timer);
//            flag=false;
//            i=60;
//            msg="获取验证码";
//     	}
//     	btn.disabled=flag?true:false;
//         btn.value=msg;
//     },1000);

// }
