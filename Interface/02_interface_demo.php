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
	<title>接口 继承</title>
</head>
<body>
<?php
//	播放器
interface Player
{
	function play();
	function stop();
	function next();
	function prev();
}

//	USB 设备
interface USBset
{
	//	USB 接口的宽度 , 单位毫米
	const USBWidth = 12;
	//	USB 接口的高度 , 单位毫米
	const USBHeight = 5;
	//	数据输入
	function dataIn();
	//	数据输出
	function dataOut();
}

//	mp3 播放器类 , 他同时具有播放器的功能 , 也具有 usb 设备的特征和功能
//	则 , 这里就可以从这两个接口获取其 "特征信息" , 并在其中实现它
//	implements	这个单词翻译过来就是 "实现"
//	这里称为 : MP3Player 实现了接口 Player 和接口 USBset
class MP3Player implements Player , USBset
{
	//	实现该方法
	function play(){
		echo 'play';
	}
	//	实现该方法
	function stop(){}
	//	实现该方法
	function next(){}
	//	实现该方法
	function prev(){}
	
	//	实现该方法	数据输入
	function dataIn(){}
	//	实现该方法	数据输出
	function dataOut(){}
}

//	接口和接口之间也可以继承 , 跟类之间的继承一样
?>
</body>
</html>