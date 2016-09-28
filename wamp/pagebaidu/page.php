<?php

/**
 * 数据分页
 * @param $url 跳转地址
 * @param $currPage 当前页
 * @param $totalData 总数据条数
 * @param string $parame 传入的参数
 * @param string $p 获取分页的名称
 * @param int $pageData 每页显示的条数
 * @param int $PaeShow  偏移量数据
 * @return string 返回的分页数
 */
function getPage($url,$currPage,$totalData,$parame='',$p='p',$pageData=10,$PaeShow=10){

    $currentPage = $currPage ? $currPage : 1;          //当前第几页

    $totalData = $totalData;                           //总数据数
    $pageData = $pageData;		                      //每页显示多少条数据
    $PaeShow = $PaeShow;			                 //一页正常显示多少页面数
    $start = '';                                     //开始的起始页数
    $end = '';                                      //结束页数
    $url = $url.'?'.$p.'=';
    $parame = $parame;

    $pageNum = ceil($totalData/$pageData); //获取数据的总页数
    $rollPage = floor($PaeShow/2); //计算临时变量

    $str = '';
    $str .= '<ul>';
    $str .= '<li><a  href="'.$url.'1'.$parame.'">首页</a></li>';

//当前页减去每页要显示天数的一半小于1时；
    if($currentPage-$rollPage <=1){
        $start =1;
        $end = $PaeShow;
    }

//当前页减去每页要显示天数的一半大于1时；
    if($currentPage-$rollPage >=1)
    {
        $start =$currentPage-$rollPage;
        $end = $currentPage+$rollPage;
    }


//当前页加上每页要显示天数的一半大于总页数时候；
    if($currentPage+$rollPage>$pageNum)
    {
        //总页数减去
        $sPage = $rollPage-($pageNum-$currentPage);
        $start = $currentPage-$rollPage-$sPage;
        $end = $pageNum;
    }

    for($i=$start; $i<=$end; $i++)
    {
        if($i == $currentPage){
            $str .= '<li style="border: none; font-size: 14px;font-weight: bold;">'.$i.'</li>';
        }else{
            $str .= '<li><a  href="'.$url.$i.$parame.'">'.$i.'</a></li>';
        }

    }

    $str .= '<li><a  href="'.$url.$pageNum.$parame.'">尾页</a></li>';
    $str .= '</ul>';
    return $str;

}


?>

<!doctype html>
<html lang="en">
<style>
   *{
       margin: 0;
       padding: 0;
       list-style: none;
       text-decoration: none;
   }
   ul{
       width: 600px;
       margin: 0 auto;
   }
   
    #page{
        padding-top: 20px;
        width: 800px;
        height: 80px;
        border:solid blue 1px;
        margin: 0 auto;
        margin-top: 40px;
        line-height: 30px;
    }
    #page ul li{
        height: 30px;
        width: auto;
        padding:0 10px;
        border: solid grey 1px;
        float: left;
        margin: 0 4px;
    }
   #page ul li a{
       font-size: 12px;
   }
</style>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
  <div id="page">
      <?php

      $page = @$_GET['p'];
      echo getPage('page.php',$page,600,'&name=demo&age=22');?>
  </div>
</body>
</html>






