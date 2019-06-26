<?php
/**
 * Created by PhpStorm.
 * User: now_w
 * Date: 2019/6/23
 * Time: 22:37
 */

$servername = "localhost";
$username = "root";
$password = "1234561";

// 创建连接
$conn = mysqli_connect($servername, $username, $password);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

echo "连接成功";

