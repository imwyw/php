<?php
/**
 * Created by PhpStorm.
 * User: now_w
 * Date: 2019/6/18
 * Time: 10:17
 */

$shmid = shmop_open(1, "c", 755, 1024);

$size = shmop_size($shmid);

echo "共享内存大小：" . $size . "<hr>";

$res = shmop_read($shmid, 0, $size);

$res = str_replace($res, ' ', 'b');
echo "长度 为：" . strlen($res);

echo "替换后：" . $res . "<hr>";

var_dump(empty($res));

echo "内容长度" . strlen(trim($res)) . "<hr>";

echo "读取内容：";

echo $res;


