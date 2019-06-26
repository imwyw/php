<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>get传值-接收并显示</title>
</head>
<body>
<?php
$name = $_GET["name"];
echo "<h1>" . $name . "</h1>";

setcookie("username", "张三", time() + 3600);

if (isset($_COOKIE["username"])) {
    echo "cookie:" . $_COOKIE["username"];
} else {
    echo "unset";
}
?>
</body>
</html>