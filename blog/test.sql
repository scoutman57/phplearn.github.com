CREATE TABLE admin_user(
uid int(10) PRIMARY KEY auto_increment,
username varchar(20) NOT NULL DEFAULT '',
password VARCHAR (20) NOT NULL DEFAULT ''
)DEFAULT charset=utf8;

INSERT INTO admin_user VALUES (NULL , 'martinzzfx' , '123456');