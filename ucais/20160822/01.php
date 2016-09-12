<?php
header("Content-Type:text/html;charset=utf-8");



//移动文件
$path = 'C:/wamp/www';
$ext = 'php';
$savePath = 'C:/resouse';
//read_dir($path , $ext , $savePath);
function read_dir($path , $ext , $savePath)
{
    $handle = opendir($path);
    if ($handle)
    {
        while (($file = readdir($handle)) !== false)
        {
            if ($file != '.' && $file != '..')
            {
                $p = $path.'/'.$file;
                if (is_dir($p))
                    read_dir($p , $ext , $savePath);
                else
                {
                    $extArr = explode('.' , $file);
                    if (end($extArr) == $ext)
                    {
                        $save = $savePath.'/'.$ext;
                        if (!file_exists($savePath))
                            mkdir($savePath);
                        if (!file_exists($save))
                            mkdir($save);
                        $fileName = date('YmdHis').rand(100000 , 999999).'---'.$file;
                        copy($p , $save.'/'.$fileName);
                        $log = date('Y-m-d H-i-s').' '.$p.' 移动到 '.$save.'/'.$fileName."\r\n";
                        file_put_contents($savePath.'/'.'copy.log' , $log , FILE_APPEND);
                    }
                }
            }
        }
        closedir($handle);
    }
}







?>
