<?php
/**
 * Created by PhpStorm.
 * User: now_w
 * Date: 2019/6/21
 * Time: 17:01
 */

$host = 'localhost'; //数据库主机名
$dbName = 'zhangsan';    //使用的数据库
$user = 'root';      //数据库连接用户名
$pass = '123456';          //对应的密码

$conn = mysqli_connect($host, $user, $pass);

// 选择指定的数据库
$res = mysqli_select_db($conn, $dbName);

if ($res) {
    echo "连接成功！";
} else {
    echo "连接失败！";
}
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
