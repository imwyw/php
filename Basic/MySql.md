<!-- TOC -->

- [MySql](#mysql)
    - [客户端工具](#客户端工具)
        - [Navicat](#navicat)
        - [dbForge](#dbforge)
        - [中文乱码](#中文乱码)
    - [脚本](#脚本)
        - [DDL](#ddl)
        - [DQL](#dql)
        - [DML](#dml)
    - [mysqli](#mysqli)
        - [连接 MySQL](#连接-mysql)
        - [DQL操作](#dql操作)
        - [DML语句](#dml语句)

<!-- /TOC -->

<a id="markdown-mysql" name="mysql"></a>
# MySql

MySQL 是一个关系型数据库管理系统，由瑞典 MySQL AB 公司开发，目前属于 Oracle 旗下产品。MySQL 是最流行的关系型数据库管理系统之一，在 WEB 应用方面，MySQL 是最好的 RDBMS (Relational Database Management System，关系数据库管理系统) 应用软件。

MySQL 是一种关系数据库管理系统，关系数据库将数据保存在不同的表中，而不是将所有数据放在一个大仓库内，这样就增加了速度并提高了灵活性。

MySQL 所使用的 SQL 语言是用于访问数据库的最常用标准化语言。MySQL 软件采用了双授权政策，分为社区版和商业版，由于其体积小、速度快、总体拥有成本低，尤其是开放源码这一特点，一般中小型网站的开发都选择 MySQL 作为网站数据库。

<a id="markdown-客户端工具" name="客户端工具"></a>
## 客户端工具

<a id="markdown-navicat" name="navicat"></a>
### Navicat

<a id="markdown-dbforge" name="dbforge"></a>
### dbForge

<a id="markdown-中文乱码" name="中文乱码"></a>
### 中文乱码
设置PHP文件与数据库编码一致，通常我们都会使用 UTF8编码

打开mysql配置文件【my.ini】以后，在[client]下面加上`default-character-set=utf8`，

在[mysqld]下面加上`character_set_server=utf8`，一般都会有character配置，默认配置为utf8，取消注释即可。

重新启动mysql服务

或者可以在代码中进行如下修改：
```php
mysqli_query($conn,"SET NAMES UTF8");
```


<a id="markdown-脚本" name="脚本"></a>
## 脚本
<a id="markdown-ddl" name="ddl"></a>
### DDL
```SQL
-- 表 视图 索引 同义词 簇
CREATE TABLE/VIEW/INDEX/SYN/CLUSTER
```

<a id="markdown-dql" name="dql"></a>
### DQL
```SQL
SELECT <字段名表>
FROM <表或视图名>
WHERE <查询条件>
```

<a id="markdown-dml" name="dml"></a>
### DML
1. 插入：INSERT
2. 更新：UPDATE
3. 删除：DELETE

<a id="markdown-mysqli" name="mysqli"></a>
## mysqli
PHP 5 及以上版本建议使用以下方式连接 MySQL :

* MySQLi extension ("i" 意为 improved)
* PDO (PHP Data Objects)

<a id="markdown-连接-mysql" name="连接-mysql"></a>
### 连接 MySQL

```php
$host = 'localhost'; //数据库主机名
$dbName = 'zhangsan';    //使用的数据库
$user = 'root';      //数据库连接用户名
$pass = '123456';          //对应的密码

$conn = mysqli_connect($host, $user, $pass);

// 选择指定的数据库
$res = mysqli_select_db($conn, $dbName);
```

<a id="markdown-dql操作" name="dql操作"></a>
### DQL操作
数据查询语言DQL基本结构是由SELECT子句，FROM子句，WHERE子句组成的查询块

```php
// ... 数据库连接创建及选择数据库 ...

// 查询语句
$sql = "SELECT * FROM STUDENT";
// 获取结果集
$result = mysqli_query($conn, $sql);

echo "<hr>";

// 查询语句
$sql = "SELECT * FROM STUDENT";
// 获取结果集
$result = mysqli_query($conn, $sql);

// 读取每行记录
while ($row = mysqli_fetch_array($result)) {
    // 通过索引方式
    echo $row[0] . "\t" . $row[1] . "\t" . $row[2] . "\t" . $row[3] . "<br>";
}

echo "<hr>";

$sql = "SELECT * FROM TEACHER";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    // 通过字段名称方式，区分大小写
    echo $row["TNO"] . "\t" . $row["TNAME"] . "\t" . $row["TSEX"] . "\t" . $row["TBIRTHDAY"] . "\t" . $row["PROF"] . "\t" . $row["DEPART"] . "<br>";
}

// 关闭结果集
mysqli_free_result($result);
// 关闭连接
mysqli_close($conn);
```

<a id="markdown-dml语句" name="dml语句"></a>
### DML语句
数据操纵语言DML主要有三种形式：
1. 插入：INSERT
2. 更新：UPDATE
3. 删除：DELETE

```php
$empNo = $_POST ["empNo"];
$empName = $_POST ["empName"];
$empAge = $_POST ["empAge"];
$empDept = $_POST ["empDept"];

$sql = "INSERT INTO T_EMP (NO,NAME,AGE,DEPTNO) VALUES ('$empNo','$empName','$empAge','$empDept')";
mysql_query($sql);
```

更新、删除的操作同上类似。


















