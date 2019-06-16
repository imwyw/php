<!-- TOC -->

- [WEB编程](#web编程)
    - [表单提交](#表单提交)
    - [Cookie](#cookie)

<!-- /TOC -->

<a id="markdown-web编程" name="web编程"></a>
# WEB编程

<a id="markdown-表单提交" name="表单提交"></a>
## 表单提交

login.php
```php
<form action="loginAction.php" method="get">
    <table>
        <tr>
            <td>用户名</td>
            <td>
                <input type="text" name="userName">
            </td>
        </tr>
        <tr>
            <td>密码</td>
            <td>
                <input type="password" name="userPwd">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="登录">
            </td>
        </tr>
    </table>
</form>
```

loginAction.php
```php
<?php
if (empty($_REQUEST["userName"])) {
    echo "用户名为空";
} else {
    echo $_REQUEST["userName"];
}
echo PHP_EOL;

if (empty($_REQUEST["userPwd"])) {
    echo "密码为空";
} else {
    echo $_REQUEST["userPwd"];
}
```

<a id="markdown-cookie" name="cookie"></a>
## Cookie
cookie 是一种在远程浏览器端储存数据并以此来跟踪和识别用户的机制，PHP 透明地支持 HTTP cookie。

**setcookie() 函数必须位于 <html> 标签之前。**








