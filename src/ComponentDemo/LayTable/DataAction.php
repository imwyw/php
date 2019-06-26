<?php


/*
 * 使用mysql的方式
$connId = mysql_connect("localhost", "root", "");
if ($connId) {
    mysql_select_db("hr_db");
} else {
    die ("连接出错，退出当前程序！" . mysql_error());
}

$sql = "SELECT NO,NAME,AGE,DEPTNO FROM T_EMP";
$result = mysql_query($sql);

$jsonRes = '{"code":0,"msg":"","count":100,"data":[';

while ($row = mysql_fetch_row($result)) {
    //echo '{"NO":"'.$row[0].'","NAME":"'.$row[1].'","AGE":"'.$row[2].'","DEPTNO":"'.$row[3].'"},';
    $jsonRes .= '{"NO":"' . $row[0] . '","NAME":"' . $row[1] . '","AGE":"' . $row[2] . '","DEPTNO":"' . $row[3] . '"},';

}
$jsonRes = substr($jsonRes, 0, -1);
$jsonRes .= ']}';
echo $jsonRes;
mysql_free_result($result);
*/

//使用mysqli方式
$host = "localhost";
$uid = "root";
$pwd = "";
$database = "hr_db";

//建立连接
$mysqli = new mysqli($host, $uid, $pwd);
$mysqli->select_db($database);

//判断是否连接正常
if ($mysqli->connect_errno) {
    printf("connect failed:%s\n", $mysqli->connect_error);
    exit();
}

//查询
$sql = "SELECT NO,NAME,AGE,DEPTNO FROM T_EMP";

$cnt = 0;
$jsonData = '';
$resCode = 0;

if ($result = $mysqli->query($sql)) {
    $cnt = $result->num_rows;
    while ($row = $result->fetch_row()) {
        $jsonData .= '{"NO":"' . $row[0] . '","NAME":"' . $row[1] . '","AGE":"' . $row[2] . '","DEPTNO":"' . $row[3] . '"},';
    }
    $jsonData = substr($jsonData, 0, -1);

    $result->close();
}

//拼装json格式
$jsonRes = '{"code":' . $resCode . ',"msg":"","count":' . $cnt . ',"data":[';
$jsonRes .= $jsonData;
$jsonRes .= ']}';

echo $jsonRes;

