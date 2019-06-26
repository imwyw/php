<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>upload</title>
</head>
<body>

<form action="upload_action.php" method="post" enctype="multipart/form-data">
    <!--    此处name的值需要和后台 $_FILES[]key值保持一致-->
    <input type="file" name="file1">
    <input type="submit" value="上传">
</form>
</body>
</html>