<?php

session_start();
$name = $_REQUEST["userName"];
$pwd = $_REQUEST["userPassword"];

if ($name == "admin" && $pwd == "123") {
    $_SESSION["user"] = $name;
    //登录成功，跳转主页
    header("location:session_index.php");
} else {
    //登录失败，返回登录页
    header("location:session_login.php");
}

