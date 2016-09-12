 -- 管理员表

 CREATE TABLE admin_user(
 	id int(10) auto_increment primary key,
 	username varchar(50) not null default '' comment '用户名',
 	password char(32) not null default '' comment '密码',
 	last_time int(10) unsigned not null comment '最后登录时间',
 	allow_class tinyint(1) not null default 0 comment '班级管理权限', 
 	allow_user tinyint(1) not null default 0 comment '学员管理权限'
 )ENGINE=InnoDB DEFAULT CHARSET = utf8;

 -- 默认的管理员用户
 INSERT INTO admin_user (username , password , allow_class , allow_user) VALUES ('admin' , 'e10adc3949ba59abbe56e057f20f883e' , 1 , 1);