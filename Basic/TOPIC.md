<!-- TOC -->

- [专题](#专题)
    - [上传文件](#上传文件)
        - [上传文件另存为](#上传文件另存为)

<!-- /TOC -->

<a id="markdown-专题" name="专题"></a>
# 专题

<a id="markdown-上传文件" name="上传文件"></a>
## 上传文件
【upload.php】
```php
<form action="upload_action.php" method="post" enctype="multipart/form-data">
    <!--    此处name的值需要和后台 $_FILES[]key值保持一致-->
    <input type="file" name="file1">
    <input type="submit" value="上传">
</form>
```

有关上面的 HTML 表单的一些注意项列举如下：
* `<form>` 标签的 enctype 属性规定了在提交表单时要使用哪种内容类型。在表单需要二进制数据时，比如文件内容，请使用 "multipart/form-data"。
* `<input>` 标签的 `type="file"` 属性规定了应该把输入作为文件来处理。举例来说，当在浏览器中预览时，会看到输入框旁边有一个浏览按钮。

【upload_action.php】
```php
echo "错误代码：" . $_FILES["file1"]["error"] . "<br>";

echo "文件名：" . $_FILES["file1"]["name"] . "<br>";
echo "文件大小：" . ($_FILES["file1"]["size"] / 1024) . "kB<br>";
echo "文件临时保存位置：" . $_FILES["file1"]["tmp_name"] . "<br>";
```

通过使用 PHP 的全局数组 $_FILES，你可以从客户计算机向远程服务器上传文件。

第一个参数是表单的 input name，第二个下标可以是 "name", "type", "size", "tmp_name" 或 "error"。

* $_FILES["file"]["name"] - 被上传文件的名称
* $_FILES["file"]["type"] - 被上传文件的类型
* $_FILES["file"]["size"] - 被上传文件的大小，以字节计
* $_FILES["file"]["tmp_name"] - 存储在服务器的文件的临时副本的名称
* $_FILES["file"]["error"] - 由文件上传导致的错误代码

<a id="markdown-上传文件另存为" name="上传文件另存为"></a>
### 上传文件另存为

【upload.php】
```php
<form action="upload_action.php" method="post" enctype="multipart/form-data">
    <!--    此处name的值需要和后台 $_FILES[]key值保持一致-->
    <input type="file" name="file1">
    <input type="submit" value="上传">
</form>
```

【upload_action.php】
```php
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
```

