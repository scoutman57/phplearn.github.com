 create table users (
  id int(10) PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(20) not NULL DEFAULT '',
  phone VARCHAR(20) NOT NULL DEFAULT '',
  password VARCHAR(20) NOT NULL DEFAULT ''
)charset=utf8;

INSERT INTO users VALUES (null , 'myname' , '18583638609' , 'e10adc3949ba59abbe56e057f20f883e');