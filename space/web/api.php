<?php
header("Content-Type:text/html;charset=utf-8");
/**
  * wechat php test
  */

//define your token
define("TOKEN", "weixin");
//实例化微信对象
$wechatObj = new wechatCallbackapiTest();
$wechatObj->valid();
//开启自动回复功能
$wechatObj->responseMsg();
//定义类文件
class wechatCallbackapiTest
{
    //实现void方法验证方法:实现对接微信公众平台
	public function valid()
    {
        //接受随机字符串
        $echoStr = $_GET["echostr"];

        //valid signature , option
        //进行用户数组前面验证
        if($this->checkSignature()){
            //如果成功则返回接收到的随机字符串
        	echo $echoStr;
//        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){

              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                //手机端
                $fromUsername = $postObj->FromUserName;
                //微信的公众平台
                $toUsername = $postObj->ToUserName;
                //接受用户发送的关键词
                $keyword = trim($postObj->Content);
                //接受用户消息类型
                $msgType = $postObj->MsgType;
                //定义$longitude与$latitude接受用户发送的经纬度信息
                $latitude = $postObj->Location_X;//维度
                $longitude = $postObj->Location_Y;//经度

                $imageID = $postObj->media_id;
                //时间戳
                $time = time();

                //文本发送模板
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";

                //音乐发送模板
                $musicTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Music>
                            <Title><![CDATA[%s]]></Title>
                            <Description><![CDATA[%s]]></Description>
                            <MusicUrl><![CDATA[%s]]></MusicUrl>
                            <HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
                            </Music>
                            </xml>";

                //图文发送模板
                $newsTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <ArticleCount>%s</ArticleCount>
                            %s
                            </xml>";

                //图片发送模板
                $imageTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Image>
                            <MediaId><![CDATA[%s]]></MediaId>
                            </Image>
                            </xml>";

                //   回复 text    begin----------------------------------------------
				if ($msgType == 'text')
                {
                    if(!empty( $keyword ))
                    {
                        if ($keyword == '文本')
                        {
                            //设置回复类型为文本类型 'text'
                            $msgType = "text";
                            //设置回复内容
                            $contentStr = "您发送的是文本消息!";
                            //格式化xml模板
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            //返回xml数据到客户端
                            echo $resultStr;
                        }
                        elseif ($keyword == '吴玉林')
                        {
                            //设置回复类型为文本类型 'text'
                            $msgType = "text";
                            //设置回复内容
                            $contentStr = "逗比吴玉林!";
                            //格式化xml模板
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            //返回xml数据到客户端
                            echo $resultStr;
                        }
                        elseif ($keyword == '王翔')
                        {
                            //设置回复类型为文本类型 'text'
                            $msgType = "text";
                            //设置回复内容
                            $contentStr = "逗比王翔!";
                            //格式化xml模板
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            //返回xml数据到客户端
                            echo $resultStr;
                        }
                        elseif ($keyword == '骆同超')
                        {
                            //设置回复类型为文本类型 'text'
                            $msgType = "text";
                            //设置回复内容
                            $contentStr = "逗比骆同超!";
                            //格式化xml模板
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            //返回xml数据到客户端
                            echo $resultStr;
                        }
                        elseif ($keyword == '最帅的人是谁')
                        {
                            //设置回复类型为文本类型 'text'
                            $msgType = "text";
                            //设置回复内容
                            $contentStr = "当然是我啦!!!";
                            //格式化xml模板
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            //返回xml数据到客户端
                            echo $resultStr;
                        }
                        elseif ($keyword == '?' || $keyword == '？')
                        {
                            //设置回复类型为文本类型 'text'
                            $msgType = "text";
                            //设置回复内容
                            $contentStr = "【1】特种服务号码\n【2】通讯服务号码\n【3】银行服务号码\n【4】最帅的人的号码\n【5】【音乐】音乐\n【6】【图文】图文\n您可以通过【】中的编号获取内容哦!\n";
                            //格式化xml模板
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            //返回xml数据到客户端
                            echo $resultStr;
                        }
                        elseif ($keyword == '1')
                        {
                            //设置回复类型为文本类型 'text'
                            $msgType = "text";
                            //设置回复内容
                            $contentStr = "常用特种服务号码:\n匪警:110\n火警:119";
                            //格式化xml模板
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            //返回xml数据到客户端
                            echo $resultStr;
                        }
                        elseif ($keyword == '2')
                        {
                            //设置回复类型为文本类型 'text'
                            $msgType = "text";
                            //设置回复内容
                            $contentStr = "常用通讯服务号码:\n中国移动:10086\n中国电信:10000\n中国联通:10010";
                            //格式化xml模板
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            //返回xml数据到客户端
                            echo $resultStr;
                        }
                        elseif ($keyword == '3')
                        {
                            //设置回复类型为文本类型 'text'
                            $msgType = "text";
                            //设置回复内容
                            $contentStr = "常用银行服务号码:\n工商银行:95588\n建设银行:95533";
                            //格式化xml模板
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            //返回xml数据到客户端
                            echo $resultStr;
                        }
                        elseif ($keyword == '4')
                        {
                            //设置回复类型为文本类型 'text'
                            $msgType = "text";
                            //设置回复内容
                            $contentStr = "不告诉你!!!";
                            //格式化xml模板
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            //返回xml数据到客户端
                            echo $resultStr;
                        }
                        elseif ($keyword == '音乐' || $keyword == '5')
                        {
                            //设置回复类型 'music'
                            $msgType = "music";
                            //定义音乐标题
                            $title = '周杰伦 - 床边故事';
                            //定义音乐描述
                            $desc = '周杰伦原声大碟...';
                            //定义音乐链接
                            $url = 'http://martinzzfx.duapp.com/res/music/bedtimestories.mp3';
                            //定义高清音乐路径
                            $hqurl = 'http://martinzzfx.duapp.com/res/music/bedtimestories.mp3';
                            //格式化字符串
                            $resultStr = sprintf($musicTpl , $fromUsername , $toUsername , $time , $msgType , $title , $desc , $url , $hqurl);
                            //返回xml数据到微信客户端
                            echo $resultStr;
                        }
                        elseif ($keyword == '图文' || $keyword == '6')
                        {
                            //设置回复类型 'news'
                            $msgType = "news";
                            //设置返回图文数量
                            $count = 4;
                            //设置要回复的图文数据
                            $str = '<Articles>';
                            for ($i = 1 ; $i <= $count ; $i++)
                            {
                                $str .= "<item>
                                            <Title><![CDATA[图片{$i}]]></Title> 
                                            <Description><![CDATA[图片的描述{$i}]]></Description>
                                            <PicUrl><![CDATA[http://martinzzfx.duapp.com/res/images/news{$i}.jpg]]></PicUrl>
                                            <Url><![CDATA[http://martinzzfx.duapp.com/res/images/news{$i}.jpg]]></Url>
                                         </item>";
                            }
                            $str .= '</Articles>';
                            //格式化字符串
                            $resultStr = sprintf($newsTpl , $fromUsername , $toUsername , $time , $msgType , $count , $str);
                            //返回xml数据到微信客户端
                            echo $resultStr;
                        }
//                        elseif ($keyword == '7')
//                        {
//                            //设置回复类型 'image'
//                            $msgType = "image";
//                            //设置要回复的图文数据
//                            $str = '<Articles>';
//                            $url = 'http://martinzzfx.duapp.com/res/images/jl.jpg';
//                            //格式化字符串
//                            $resultStr = sprintf($imageTpl , $fromUsername , $toUsername , $time ,$msgType , $imageID);
//                            //返回xml数据到微信客户端
//                            echo $resultStr;
//                        }
//
                        else
                        {
                            //设置回复类型 'text'
                            $msgType = "text";
                            $url = "http://www.tuling123.com/openapi/api?key=65b9f623947946bebbe1148bf1cacb4c&info={$keyword}";

                            //模拟发送http中的发送get请求
                            $str = file_get_contents($url);

                             //格式化json字符串为对象或者数组
                            $json = json_decode($str);
                            //定义回复内容
                            $contentStr = $json->text;
                            //格式化字符串
                            $resultStr = sprintf($textTpl , $fromUsername , $toUsername , $time , $msgType , $contentStr);
                            //返回数据到微信客户端
                            echo $resultStr;
                        }
                    }
                }
                //   回复   text  end-------------------------------------------------------------------







                elseif ($msgType == 'image')
                {
                    $msgType = "text";
                    $contentStr = "您发送的是图片文件!";
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;

                }

                elseif ($msgType == 'voice')
                {
                    $msgType = "text";
                    $contentStr = "您发送的是语音消息!";
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;

                }

                elseif ($msgType == 'video')
                {
                    $msgType = "text";
                    $contentStr = "您发送的是视频消息!";
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;

                }

                elseif ($msgType == 'shortvideo')
                {
                    $msgType = "text";
                    $contentStr = "您发送的是小视频消息!";
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;

                }

                elseif ($msgType == 'location')
                {
                    $msgType = "text";
                    //定义接口请求地址

                    $url = "http://api.map.baidu.com/telematics/v3/reverseGeocoding?location={$longitude},{$latitude}&coord_type=gcj02&ak=5t9nvsyxzl5ADzvng2ZgpIn27nn2IWsE";

                    //模拟http中的get请求
                    $str = file_get_contents($url);
                    $p = xml_parser_create();
                    xml_parse_into_struct($p,$str,$arr1,$arr2);
                    for ($i = 0 ; ; $i++)
                    {
                        foreach ($arr1[$i] as $k => $v)
                        {
                            if ($v == 'DESCRIPTION' || $v == 'description')
                            {
                                $desc = $arr1[$i]['value'];
                                break(2);
                            }
                        }
                    }
                    $contentStr = "您发送的是地理位置消息!\n您的位置是:{$desc}";
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;

                }

                elseif ($msgType == 'link')
                {
                    $msgType = "text";
                    $contentStr = "您发送的是链接消息!";
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;

                }

        }else {
        	echo "";
        	exit;
        }
    }

	private function checkSignature()
	{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );

		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>