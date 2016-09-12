<?php
header("Content-Type:text/html;charset=utf-8");


//inner join
//
//left join
//
//right join

//mysql> insert into site values(null,'baidu','http://www.baidu.com'),(null,'ucai
//','http://www.ucai.cn'),(null,'alibaba','http://www.alibaba.com');
//Query OK, 3 rows affected (0.05 sec)
//Records: 3  Duplicates: 0  Warnings: 0
//
//mysql> select * from site;
//+----+---------+------------------------+
//| id | title   | url                    |
//+----+---------+------------------------+
//|  1 | baidu   | http://www.baidu.com   |
//|  2 | ucai    | http://www.ucai.cn     |
//|  3 | alibaba | http://www.alibaba.com |
//+----+---------+------------------------+
//3 rows in set (0.00 sec)
//
//mysql> insert into site_count values(null,1,500),(null,2,1000);
//Query OK, 2 rows affected (0.30 sec)
//Records: 2  Duplicates: 0  Warnings: 0
//
//mysql> select * from site_count;
//+----+-----+---------+
//| id | sid | s_count |
//+----+-----+---------+
//|  1 |   1 |     500 |
//|  2 |   2 |    1000 |
//+----+-----+---------+
//2 rows in set (0.00 sec)
//
//mysql> select title,url,s_count from site,site_count where site.id = site_count
//    .wid;
//ERROR 1054 (42S22): Unknown column 'site_count.wid' in 'where clause'
//mysql> select title,url,s_count from site,site_count where site.id = site_count
//    .sid;
//+-------+----------------------+---------+
//| title | url                  | s_count |
//+-------+----------------------+---------+
//| baidu | http://www.baidu.com |     500 |
//| ucai  | http://www.ucai.cn   |    1000 |
//+-------+----------------------+---------+
//2 rows in set (0.00 sec)
//
//mysql> select title,url,c_count from site left join site_count on site.id = sit
//e_count.sid;
//ERROR 1054 (42S22): Unknown column 'c_count' in 'field list'
//mysql> select title,url,s_count from site left join site_count on site.id = sit
//e_count.sid;
//+---------+------------------------+---------+
//| title   | url                    | s_count |
//+---------+------------------------+---------+
//| baidu   | http://www.baidu.com   |     500 |
//| ucai    | http://www.ucai.cn     |    1000 |
//| alibaba | http://www.alibaba.com |    NULL |
//+---------+------------------------+---------+
//3 rows in set (0.01 sec)
//
//mysql> select title,url,s_count from site right join site_count on site.id = si
//te_count.sid;
//+-------+----------------------+---------+
//| title | url                  | s_count |
//+-------+----------------------+---------+
//| baidu | http://www.baidu.com |     500 |
//| ucai  | http://www.ucai.cn   |    1000 |
//+-------+----------------------+---------+
//2 rows in set (0.00 sec)
//
//mysql> select title,url,s_count from site left join site_count on site.id = sit
//e_count.sid;
//+---------+------------------------+---------+
//| title   | url                    | s_count |
//+---------+------------------------+---------+
//| baidu   | http://www.baidu.com   |     500 |
//| ucai    | http://www.ucai.cn     |    1000 |
//| alibaba | http://www.alibaba.com |    NULL |
//+---------+------------------------+---------+
//3 rows in set (0.00 sec)
//
//mysql> select title,url,s_count from site left join site_count on site.id = sit
//e_count.sid;
?>
