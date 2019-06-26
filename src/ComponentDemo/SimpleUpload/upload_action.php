<?php
/**
 * Created by PhpStorm.
 * User: now_w
 * Date: 2019/6/25
 * Time: 10:00
 */


var_dump($_FILES["file1"]);

echo "<hr>";

echo "错误数：" . $_FILES["file1"]["error"] . "<br>";

echo "文件名：" . $_FILES["file1"]["name"] . "<br>";
echo "文件大小：" . ($_FILES["file1"]["size"] / 1024) . "kB<br>";
echo "文件临时保存位置：" . $_FILES["file1"]["tmp_name"] . "<br>";

// 将UTF-8编码的文件名转换为gb2312编码，否则另存为文件名称会乱码，代码编码和系统编码保持统一
$newName = iconv("utf-8", "gb2312", $_FILES["file1"]["name"]);

$desFileName = "../upload/" . $newName;
// 目录不存在则创建
if (!file_exists("../upload")) {
    mkdir("../upload");
}
// 文件已存在则提示冲突
if (file_exists($desFileName)) {
    echo $desFileName . "文件已经存在";
}
// 另存为文件
move_uploaded_file($_FILES["file1"]["tmp_name"], $desFileName);
echo "文件存储在: " . $desFileName;





