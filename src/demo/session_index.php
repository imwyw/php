<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>主页</title>
</head>
<body>
<?php
session_start();
$curUser = $_SESSION["user"];
if (!isset($curUser)) {
    header("location:session_login.php");
}
?>

<h1>模拟主页，未登录看不到此页</h1>
<h3>
    当前用户是：
    <?php echo $_SESSION["user"]; ?>
</h3>
<form action="session_destory.php" method="post">
    <input type="submit" value="注销">
</form>
</body>
</html>