<?php
header("Content-Type:text/html;charset=utf-8");

//var_dump($_FILES);


function getUpload($file = 'pic', $type = array() , $uploadAddr = 'upload')
{
    set_time_limit(0);//设置相应时间为永久
    if (empty($type))
        $type = array('image/jpeg' , 'image/gif' , 'image/png' , 'application/octet-stream');

    $arrTmp = $_FILES[$file];
    $count = count($arrTmp);
    for ($i = 0 ; $i < $count ; $i++)
    {//for start---------------------------------------------------------------------------
        if ($arrTmp['name'][$i] == '')
            continue;
        if (!in_array($arrTmp['type'][$i] , $type))
        {
            echo $arrTmp['name'][$i] . '类型非法<br>';
            continue;
        }

        if ($arrTmp['name'][$i] != '')
        {
            $arr['name'] = $arrTmp['name'][$i];
            $arr['type'] = $arrTmp['type'][$i];
            $arr['tmp_name'] = $arrTmp['tmp_name'][$i];
            $arr['error'] = $arrTmp['error'][$i];
            $arr['size'] = $arrTmp['size'][$i];

            if ($arr['error'] > 0)
            {
                switch ($arr['error'])
                {
                    case '1':
                        echo '传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。 ';
                        break;
                    case '2':
                        echo '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。 ';
                        break;
                    case '3':
                        echo '文件只有部分被上传。 ';
                        break;
                    case '4':
                        echo '没有文件被上传。 ';
                        break;
                    case '6':
                        echo '找不到临时文件夹。 ';
                        break;
                    case '7':
                        echo '文件写入失败。';
                        break;
                }
                continue;
            }
            if (!file_exists($uploadAddr))
                mkdir($uploadAddr);
            if (!file_exists($uploadAddr . '/' . date('Ym')))
                mkdir($uploadAddr . '/' . date('Ym'));
            $extArr = explode('.', $arr['name']);
            $ext = strtolower(end($extArr));
            $fileName = $uploadAddr . '/' . date('Ym') . '/' . md5(microtime(true) . rand(10000, 99999)) . '.' . $ext;
            echo move_uploaded_file($arr['tmp_name'], $fileName) ? $arr['name'].'移动成功<br>' : $arr['name'].'移动失败<br>';
//            $res = move_uploaded_file($arr['tmp_name'], $fileName);
//            if ($res)
//            {
//                echo $arr['name'].'移动成功<br>';
//            }
//            else
//            {
//                echo $arr['name'].'移动失败<br>';
//            }

        }
    }// for end------------------------------------------------------------

}

getUpload('pic');


?>
