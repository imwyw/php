<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>start</title>
</head>
<body>


<?php

//共享内存的唯一的key值
$key = 1;
//访问模式
$mode = "c";
//内存段的权限。
$permissions = 755;
//内存段大小
$size = 1024;
//返回一个ID编号，其他函数可使用该 ID 编号操作该共享内存段。
$shmid = shmop_open($key, $mode, $permissions, $size);

shmop_write($shmid, "hello shmop 1111", 0);

?>


</body>
</html>




