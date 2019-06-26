<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>文件上传测试</title>
    <style type="text/css">
        img {
            width: 100px;
            height: 80px;
        }

        input {
            margin: 0 3px;
        }
    </style>
</head>
<body>

<!--上传文件表单-->
<form method="post" action="./UploadAction.php" enctype="multipart/form-data">
    <label for="file">Filename:</label>
    <input type="file" name="file" id="file"/>
    <br/>
    <input type="submit" name="submit" value="上传"/>
</form>
<hr/>

<?php

// 【./UPLOAD_FILES/】为当前路径的UPLOAD_FILES文件夹，上传文件保存的目录
$dir_path = "./UPLOAD_FILES/";
// 判断目录是否存在，不存在则创建
if (is_dir($dir_path)) {
    // 存在该目录则获取该目录下所有的文件
    $upfiles = scandir($dir_path);
}

// 遍历目录下所有的文件，以便在table中展现
$fileImgs = array();
$fileOths = array();
foreach ($upfiles as $file) {
    //排除掉非文件信息，即元素为【.】和【..】
    if ($file != "." && $file != "..") {
        //获取路径信息，用于根据扩展进行判断文件类型
        $pathinfo = pathinfo($file);
        //如需支持其他图片类型，可在此添加
        if ($pathinfo["extension"] == "jpg" || $pathinfo["extension"] == "jpeg"
            || $pathinfo["extension"] == "png") {
            array_push($fileImgs, $file);
        } else {//非图片的其他类型
            array_push($fileOths, $file);
        }
    }
}
?>

<!--图片部分table-->
<div style="display:inline-block;width:40%;">
    <table border="1">
        <caption>图片</caption>
        <tr>
            <th>图片名称</th>
            <th>预览</th>
            <th>下载</th>
        </tr>
        <?php
        foreach ($fileImgs as $img) {
            echo "<tr>";
            echo "<td>$img</td>";
            echo "<td><img src='$dir_path$img' /></td>";
            echo "<td><input type='button' onClick=\"downloadFile('$dir_path$img')\" value='下载'/>";
            echo "<input type='button' onClick=\"removeFile('$dir_path$img')\" value='删除' /></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

<!--其他文件部分table-->
<div style="display:inline-block;width:40%;">
    <table border="1">
        <caption>其他文件</caption>
        <tr>
            <th>文件名称</th>
            <th>下载</th>
        </tr>
        <?php
        foreach ($fileOths as $fi) {
            echo "<tr>";
            echo "<td>$fi</td>";
            echo "<td><input type='button' onClick=\"downloadFile('$dir_path$fi')\" value='下载'/>";
            echo "<input type='button' onClick=\"removeFile('$dir_path$fi')\" value='删除' /></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

<!--此处引用了jquery第三方库，因为下面脚本中使用到了ajax方法$.post()-->
<!--<script type="text/javascript" src="../jquery3.3.1.min.js"></script>-->
<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">

    //下载文件
    function downloadFile(path) {
        window.open(path);//新窗口中打开连接
    }

    //删除文件
    function removeFile(path) {
        // $.post() 为jquery中提供的方法，用于异步提交，有兴趣可以网上了解下
        $.post("./RemoveFile.php",
            {"filePath": path},
            function (data) {
                //即 RemoveFile.php中返回的数据（echo json_encode(xxxx);），通过JSON.parse()将字符串反序列化为js对象
                var obj = JSON.parse(data);
                alert(obj.msg);
                location.reload();//重载页面
            });
    }
</script>
</body>
</html>