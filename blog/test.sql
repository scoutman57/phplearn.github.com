
//创建管理员表-------------------------------------------------------------------------------------------------------------
CREATE TABLE admin_user(
uid int(10) PRIMARY KEY auto_increment,
username VARCHAR (20) NOT NULL DEFAULT '',
password VARCHAR (50) NOT NULL DEFAULT '',
last_time VARCHAR (50) NOT NULL DEFAULT '',
status INT (10) NOT NULL DEFAULT 0
)DEFAULT charset=utf8;

INSERT INTO admin_user VALUES (NULL , 'martinzzfx' , 'e10adc3949ba59abbe56e057f20f883e' , '2016-09-21' , 1);
//创建管理员表-------------------------------------------------------------------------------------------------------------


//创建标签表-------------------------------------------------------------------------------------------------------------

CREATE TABLE tags(
tid INT (10) PRIMARY KEY auto_increment,
tagname VARCHAR (20) NOT NULL DEFAULT '',
ord INT (10) NOT NULL DEFAULT 0,
clickcount INT (10) NOT NULL DEFAULT 0,
status INT (10) NOT NULL DEFAULT 0
)DEFAULT charset=utf8;

INSERT INTO tags VALUES (NULL , 'PHP' , '100' , '0' , 1);
INSERT INTO tags VALUES (NULL , 'HTML' , '100' , '0' , 1);
INSERT INTO tags VALUES (NULL , 'MYSQL' , '100' , '0' , 1);
INSERT INTO tags VALUES (NULL , 'Java' , '100' , '0' , 1);
INSERT INTO tags VALUES (NULL , 'Javascript' , '100' , '0' , 1);
INSERT INTO tags VALUES (NULL , 'jQuery' , '100' , '0' , 1);

UPDATE tags SET ord = 99 WHERE tid = 2;
//创建标签表-------------------------------------------------------------------------------------------------------------



//创建栏目表-------------------------------------------------------------------------------------------------------------

CREATE TABLE cate(
cid INT (10) PRIMARY KEY auto_increment,
cate_name VARCHAR (50) NOT  NULL DEFAULT '',
pid INT (10) NOT NULL DEFAULT 0,
pic VARCHAR (200) NOT NULL DEFAULT '',
ord INT (10) NOT NULL DEFAULT 0,
status INT (10) NOT NULL DEFAULT 1
)DEFAULT charset=utf8;

INSERT INTO cate VALUES (NULL , '后端语言' , 0 , '' , 1 , 1);
INSERT INTO cate VALUES (NULL , '前端语言' , 0 , '' , 1 , 1);
INSERT INTO cate VALUES (NULL , '网页设计' , 0 , '' , 1 , 1);
INSERT INTO cate VALUES (NULL , 'PHP' , 1 , '' , 1 , 1);
INSERT INTO cate VALUES (NULL , 'Java' , 1 , '' , 1 , 1);
INSERT INTO cate VALUES (NULL , 'C' , 1 , '' , 1 , 1);
INSERT INTO cate VALUES (NULL , 'swift' , 2 , '' , 1 , 1);
INSERT INTO cate VALUES (NULL , 'android' , 2 , '' , 1 , 1);
INSERT INTO cate VALUES (NULL , 'Javascript' , 3 , '' , 1 , 1);
INSERT INTO cate VALUES (NULL , 'HTML' , 3 , '' , 1 , 1);
INSERT INTO cate VALUES (NULL , 'CSS' , 3 , '' , 1 , 1);
INSERT INTO cate VALUES (NULL , 'PHP函数' , 4 , '' , 1 , 1);
INSERT INTO cate VALUES (NULL , 'PHP语法' , 4 , '' , 1 , 1);
INSERT INTO cate VALUES (NULL , 'ThinkPHP' , 4 , '' , 1 , 1);
//创建栏目表-------------------------------------------------------------------------------------------------------------






//创建文章表-------------------------------------------------------------------------------------------------------------

CREATE TABLE article(
aid int(10) PRIMARY KEY auto_increment,
cid INT (10) NOT NULL DEFAULT 0,
article_name VARCHAR (500) NOT NULL DEFAULT '',
article_describe VARCHAR (1000) NOT NULL DEFAULT '',
article_content text NOT NULL,
article_author VARCHAR (100) NOT NULL DEFAULT '',
click_count INT (10) NOT NULL DEFAULT 0,
ord INT (10) NOT NULL DEFAULT 0,
essence INT (10) NOT NULL DEFAULT 0,
top INT (10) NOT NULL DEFAULT 0,
status INT (10) NOT NULL DEFAULT 0,
last_time VARCHAR (50) NOT NULL DEFAULT ''
)DEFAULT charset=utf8;


INSERT INTO article VALUES (NULL , 4 , '文章一' , '文章一的描述' , '文章一的内容' , '文章一的作者' , 0 , 0 ,0 , 0 , 1 , '2016-09-23 10:39:01');
INSERT INTO article VALUES (NULL , 4 , '文章二' , '文章一的描述' , '文章一的内容' , '文章一的作者' , 0 , 0 ,0 , 0 , 1 , '2016-09-23 10:39:01');
INSERT INTO article VALUES (NULL , 4 , '文章三' , '文章一的描述' , '文章一的内容' , '文章一的作者' , 0 , 0 ,0 , 0 , 1 , '2016-09-23 10:39:01');
INSERT INTO article VALUES (NULL , 4 , '文章四' , '文章一的描述' , '文章一的内容' , '文章一的作者' , 0 , 0 ,0 , 0 , 1 , '2016-09-23 10:39:01');
INSERT INTO article VALUES (NULL , 4 , '文章五' , '文章一的描述' , '文章一的内容' , '文章一的作者' , 0 , 0 ,0 , 0 , 1 , '2016-09-23 10:39:01');
INSERT INTO article VALUES (NULL , 4 , '文章六' , '文章一的描述' , '文章一的内容' , '文章一的作者' , 0 , 0 ,0 , 0 , 1 , '2016-09-23 10:39:01');
INSERT INTO article VALUES (NULL , 4 , '文章七' , '文章一的描述' , '文章一的内容' , '文章一的作者' , 0 , 0 ,0 , 0 , 1 , '2016-09-23 10:39:01');
INSERT INTO article VALUES (NULL , 4 , '文章八' , '文章一的描述' , '文章一的内容' , '文章一的作者' , 0 , 0 ,0 , 0 , 1 , '2016-09-23 10:39:01');
INSERT INTO article VALUES (NULL , 4 , '文章九' , '文章一的描述' , '文章一的内容' , '文章一的作者' , 0 , 0 ,0 , 0 , 1 , '2016-09-23 10:39:01');

select a.aid,a.cid,a.article_name,a.article_describe,a.article_content,a.article_author,a.click_count,a.ord,a.essence,a.top,a.status,a.last_time,c.cate_name from cate c , article a where a.cid = c.cid;


select a.aid,a.cid,a.article_name,a.article_describe,a.article_content,a.article_author,a.click_count,a.ord,a.essence,a.top,a.status,a.last_time,c.cate_name from cate c , article a where a.cid = c.cid && a.aid = 5;
//创建文章表-------------------------------------------------------------------------------------------------------------







//创建文章与标签的关系表-------------------------------------------------------------------------------------------------------------

CREATE TABLE article_tags(
atid int(10) PRIMARY KEY auto_increment,
aid int(10) NOT NULL DEFAULT 0,
tid int(10) NOT NULL DEFAULT 0
)DEFAULT charset=utf8;

insert into article_tags (atid, aid, tid) values (NULL , 1 , 1);
insert into article_tags (atid, aid, tid) values (NULL , 1 , 2);
insert into article_tags (atid, aid, tid) values (NULL , 1 , 3);
insert into article_tags (atid, aid, tid) values (NULL , 2 , 2);
insert into article_tags (atid, aid, tid) values (NULL , 3 , 3);
insert into article_tags (atid, aid, tid) values (NULL , 4 , 4);
insert into article_tags (atid, aid, tid) values (NULL , 5 , 5);
insert into article_tags (atid, aid, tid) values (NULL , 6 , 6);
insert into article_tags (atid, aid, tid) values (NULL , 7 , 7);
insert into article_tags (atid, aid, tid) values (NULL , 8 , 8);
insert into article_tags (atid, aid, tid) values (NULL , 9 , 9);
//创建文章与标签的关系表-------------------------------------------------------------------------------------------------------------









//创建轮播图片表-------------------------------------------------------------------------------------------------------------

CREATE TABLE `player`(
playerid INT (10) PRIMARY KEY auto_increment,
pid INT (10) NOT NULL DEFAULT 0,
player_name VARCHAR (50) NOT NULL DEFAULT '',
local_route VARCHAR (200) NOT NULL DEFAULT '',
link VARCHAR (200) NOT NULL DEFAULT '',
ord INT (10) NOT NULL DEFAULT 0,
status INT (10) NOT NULL DEFAULT 0
)charset=utf8;

//创建轮播图片表-------------------------------------------------------------------------------------------------------------























