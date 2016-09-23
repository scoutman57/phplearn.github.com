CREATE TABLE admin_user(
uid int(10) PRIMARY KEY auto_increment,
username VARCHAR (20) NOT NULL DEFAULT '',
password VARCHAR (50) NOT NULL DEFAULT '',
last_time VARCHAR (50) NOT NULL DEFAULT '',
status INT (10) NOT NULL DEFAULT 0
)DEFAULT charset=utf8;

INSERT INTO admin_user VALUES (NULL , 'martinzzfx' , 'e10adc3949ba59abbe56e057f20f883e' , '2016-09-21' , 1);



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




























