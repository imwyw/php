<?php
/**
 * Created by PhpStorm.
 * User: now_w
 * Date: 2019/6/18
 * Time: 15:42
 */


$ids = array("a", "b", "c");
// 数组 添加元素
array_push($ids, "e");
print_r($ids);

echo "<hr>";

unset($ids[2]);
print_r($ids);

echo "<hr>";
$stu = array("jack" => array("jack", 12, "男"), "lucy" => array("lucy", 22, "女"));
// 按value值寻找，存在则返回key值，否则返回false
$res = array_search(array("jack", 12, "男"), $stu);
var_dump($res);//string(4) "jack"


$emp1 = array(
    "empNo" => 1001,
    "empName" => "张三",
    "empAge" => 20,
    "empDept" => "开发部"
);
$emp2 = array(
    "empNo" => 1002,
    "empName" => "李四",
    "empAge" => 21,
    "empDept" => "测试部"
);
$emp3 = array(
    "empNo" => 1003,
    "empName" => "王五",
    "empAge" => 22,
    "empDept" => "销售部"
);
$emps = array(
    "1001" => $emp1,
    "1002" => $emp2,
    "1003" => $emp3
);

echo "<hr>";

// 返回key值所在索引位置
$index = array_search("1002", array_keys($emps));
echo $index."<br>";

unset($emps["1002"]);

//array_splice($emps, $index, 1);
print_r($emps);


//$shmid = shmop_open(864, 'c', 0755, 1024);
//$size = shmop_size($shmid);
//$res = shmop_read($shmid, 0, $size);
//
//if (empty ($res)) {
//    echo "空的";
//} else {
//    echo "有值";
//}
//
//$a = "1";
//if (empty ($a)) {
//    echo "empty";
//} else {
//    echo "has value";
//}







