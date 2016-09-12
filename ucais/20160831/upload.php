<?php
header("Content-Type:text/html;charset=utf-8");

var_dump($_FILES);
//array (size=1)
//  'pic' =>
//    array (size=5)
//      'name' => string '15.jpg' (length=6)
//      'type' => string 'image/jpeg' (length=10)
//      'tmp_name' => string 'C:\wamp\tmp\php6D96.tmp' (length=23)
//      'error' => int 0
//      'size' => int 32005

//move_uploaded_file($_FILES['pic']['tmp_name'] , './upload/1.png');


//getUpload(空间名称 , 上传地址 , 允许类型);
function getUpload($file = 'pic', $type = array() , $uploadAddr = 'upload')
{
    if ($_FILES && isset($_FILES[$file]))
    {
        //判断是不是我们自定义类型,入过用户不设置,则使用默认
        if (empty($type))
            $type = array('image/jpeg' , 'image/gif' , 'image/png' , 'image/jpg');

        $fileTmp = $_FILES[$file];

        if (!in_array($fileTmp['type'] , $type))
            return array('status' => '0' , 'data' => '类型非法');

        //判断上传文件是是否有错误
        $error = '';
        if ($fileTmp['error'] > 0)
        {
            switch ($fileTmp['error'])
            {
                case '1':
                    $error = '传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。 ';
                    break;
                case '2':
                    $error = '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。 ';
                    break;
                case '3':
                    $error = '文件只有部分被上传。 ';
                    break;
                case '4':
                    $error = '没有文件被上传。 ';
                    break;
                case '6':
                    $error = '找不到临时文件夹。 ';
                    break;
                case '7':
                    $error = '文件写入失败。';
                    break;
            }
        }
        if ($error != '')
            return array('status' => '0' , 'data' => $error);
        //检测上传的目标文件夹是否存在,入过不存在,则创建
        if (!file_exists($uploadAddr))
            mkdir($uploadAddr);
        if (!file_exists($uploadAddr.'/'.date('Ym')))
            mkdir($uploadAddr.'/'.date('Ym'));

        //获取文件名,并设置随机文件名
        $extArr = explode('.' , $fileTmp['name']);
        $ext = strtolower(end($extArr));
        $fileName = $uploadAddr.'/'.date('Ym').'/'.md5(microtime(true).rand(10000 , 99999)).'.'.$ext;

        //移动文件,移动成功泽返回上传文件路径
        return move_uploaded_file($fileTmp['tmp_name'] , $fileName) ? array('status' => '0' , 'data' => $fileName) : array('status' => '0' , 'date' => '文件移动失败');

    }
    else
    {
        return array('status' => '0' , 'data' => '文件传入失败');
    }
}

var_dump(getUpload('pic'));

?>

<?php
//
//var_dump($_FILES);
//// move_uploaded_file($_FILES['pic']['tmp_name'] , 'upload/1.png');
////
//// array (size=1)
////   'pic' =>
////     array (size=5)
////       'name' => string '2016-08-05_173025.png' (length=21)
////       'type' => string 'image/png' (length=9)
////       'tmp_name' => string 'C:\wamp\tmp\phpF4A4.tmp' (length=23)
////       'error' => int 0
////       'size' => int 714
//
////getUpload(控件名称 , 上传地址 , 允许类型);
//function getUpload($file = 'pic' ,$type = array(), $uploadAddr = 'uploads')
//{
//
//    if($_FILES && isset($_FILES[$file]))
//    {
//        $fileTmp = $_FILES[$file];
//        //判断上传文件时是否有错误
//        $error = '';
//        if($fileTmp['error'] > 0)
//        {
//            switch ($fileTmp['error']) {
//                case '1':
//                    $error = '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值';
//                    break;
//                case '2':
//                    $error = '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值';
//                    break;
//                case '3':
//                    $error = '文件只有部分被上传';
//                    break;
//                case '4':
//                    $error = '没有文件被上传';
//                    break;
//                case '6':
//                    $error = '找不到临时文件夹';
//                    break;
//                case '7':
//                    $error = '文件写入失败';
//                    break;
//            }
//        }
//        if($error != '')
//            return array('status' => '0' , 'data' => $error);
//
//        //获取文件后缀名
//
//        $extArr = explode('.', $fileTmp['name']);
//        $ext = strtolower(end($extArr));
//
//        //判断是否是我们自定义的类型,如果用户不设置,则使用默认
//        if(empty($type))
//            $type = array('jpg' , 'gif' , 'png' , 'jpeg');
//
//        if(!in_array($ext, $type))
//            return array('status' => '0' , 'data' => '类型非法');
//
//        //检测上传的目标文件夹是否存在,如果不存在,则创建
//        if(!file_exists($uploadAddr))
//            mkdir($uploadAddr);
//
//        if(!file_exists($uploadAddr.'/'.date('Ym')))
//            mkdir($uploadAddr.'/'.date('Ym'));
//
//        //并设置随机文件名
//        $fileName = $uploadAddr.'/'.date('Ym').'/'.md5(microtime(true).rand(10000 , 99999)).'.'.$ext;
//        // upload/201608/laksjdfl;kjas;ldfkja;slkdjfsad.jpg
//
//        //移动文件,移动成功返回上传以后的文件路径
//        return move_uploaded_file($fileTmp['tmp_name'] , $fileName) ? array('status' => 1 , 'data' => $fileName) : array('status' => '0' , 'data' => '文件移动失败');
//    }else{
//        return array('status' => '0' , 'data' => '文件传入失败');
//    }
//
//}
//
//var_dump(getUpload('pic' ));
//
//
//?>





