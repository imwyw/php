<?php
//后台处理删除文件，根据获取到的文件相对路径进行删除
$filePath = $_POST["filePath"];

//删除文件
$res = unlink($filePath);

//构造数组，用于jason格式字符串
$value = array("status" => $res, "msg" => $res ? "删除成功" : "删除失败");

//返回json格式字符串
echo json_encode($value);
?>