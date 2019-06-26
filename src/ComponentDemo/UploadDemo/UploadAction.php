<?php

if (isset($_FILES["file"])) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Error: " . $_FILES["file"]["error"] . "<br />";
        if ($_FILES["file"]["error"] == 1) {
            echo "Error：文件过大，请在php.ini中修改【upload_max_filesize】值";
        }
    } else {
        echo "Upload: " . $_FILES["file"]["name"] . "<br />";
        echo "Type: " . $_FILES["file"]["type"] . "<br />";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

        // 如果目录不存在则创建
        $dir_path = "./UPLOAD_FILES/";
        if (!is_dir($dir_path)) {
            mkdir($dir_path, 0777);//创建目录并分配权限
        }

        if (file_exists("./UPLOAD_FILES/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " 已经存在。";
        } else {
            //文件另存为到某路径
            move_uploaded_file($_FILES["file"]["tmp_name"], $dir_path . $_FILES["file"]["name"]);
            echo "已经保存到目录： " . $dir_path . $_FILES["file"]["name"];
            header("location:Upload.php");
        }
    }
} else {
    //todo 增加对异常情况的处理。。。
}


?>