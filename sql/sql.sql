-- 双中划线+空格: 注释(单行注释),也可以用#号

-- 创建数据库
create database mydatabase charset utf8;

-- 查看所有数据库
show databases;

-- 查看指定部分数据库
show databases like 'pattern' -- pattern 是匹配模式
-- %:表是匹配多个字符
-- _:表示匹配单个字符



-- 创建数据库
create database informationtest charset utf8;

-- 查看以information_开始的数据库
show databases like 'information_%';
show databases like 'information\_%';-- 相当于information%

-- 查看数据库的创建语句
show create database mydatabase;
-- show create database `mydatabase`;










-- 更新数据库
-- 数据库的修改仅限库选项:字符集和校对集(校对集依赖字符集)
Alter database 数据库名字 [库选项]
Charset/character[=]字符集
Collate 校对集

-- 修改数据库informatiotest的字符集
alter database informationtest charset GBK;








-- 删除数据库
drop database informationtest;













-- 表操作
-- 表与字段密不可分
-- 任何表的设计都必须指定数据库


-- 新增数据表
Create table [if not exists] 表名(
字段名字 数据类型,
字段名字 数据类型  --最后一行不需要逗号
)[表选项];

if not exists : 如果表名不存在那么就创建,否则不执行创建代码;检查功能

表选项: 控制表的表现
    字符集:charset/character set 具体字符集;-- 保证表中的数据存储的字符集
    校对集:collat 具体校对集
    存储引擎:engine 具体的存储引擎(innodb和myisam)
create table if not exists student(
name varchar(10),
gender varchar(10),
number varchar(10),
age int
)Charset utf8;-- 无法创建,没有选定数据库

方案一: 显示的指定表所属的数据库
Create table 数据库名.表名(); -- 将当前数据表创建到指定的数据库下

create table if not exists mydatabase.student(-- 显示的将student表放到mydatabase下
name varchar(10),
gender varchar(10),
number varchar(10),
age int
)Charset utf8;


方案二: 隐试的指定表所属的数据库:先进入到某个数据库环境,然后这样创建的表会自动归属到某个指定的数据库

进入数据库环境:use 数据库名字; -- 可以没有分好

-- 创建数据表
-- 进入数据库
use mydatabase;

-- 创建表
create table class(
name varchar(10),
room varchar(10),
number varchar(10)
)Charset utf8;

-- 当创建数据表的SQL指令执行之后到底发生了什么?

1. 指定数据库下已经存在相应的表
2. 在数据库对应的文件夹下,会产生对应表的结构文件(跟存储引擎有关系)


查看数据表






















