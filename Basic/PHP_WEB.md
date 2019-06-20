<!-- TOC -->

- [WEB编程](#web编程)
    - [表单提交](#表单提交)
    - [URL传参](#url传参)
    - [共享内存shmop](#共享内存shmop)
    - [session](#session)
        - [session登录验证](#session登录验证)
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

<a id="markdown-url传参" name="url传参"></a>
## URL传参
使用超链接传递参数。我们在Web页面中的很多操作都是点击超链接在网页之间跳转，页面跳转的同时可以传递参数。

【page1.php】页面中，通过连接跳转，附加参数
```php
<a href="page2.php?name=jack" target="_self">跳转</a>
```

【page2.php】接收url中的传参
```php
echo "<h1>" . $GET["name"] . "</h1>";
```

<a id="markdown-共享内存shmop" name="共享内存shmop"></a>
## 共享内存shmop
目前正在用的一个场景，针对某一台机器上的错误进行汇总并报警，我们把一分钟之内的相同报警合并成一条，用共享内存来暂存，非常实用且高效。

* shmop_open
* shmop_close
* shmop_read
* shmop_write
* shmop_delete

使用shmop共享内存方式，需要修改【php.ini】文件，去掉php_shmop.dll配置前的分号`;`
```shell
extension=php_shmop.dll
```


创建内存段,shmop_open方法：

```php
//共享内存的唯一的key值
$key = 1;
//访问模式
$mode = "c";
//内存段的权限。
$permissions = 755;
//内存段大小
$size = 1024;
//返回一个ID编号，其他函数可使用该 ID 编号操作该共享内存段。
$shmid = shmop_open($key, $mode, $permissions, $size);
```
**$key**

系统建立IPC通讯 （消息队列、信号量和共享内存） 时必须指定一个key值。

**$mode**

访问模式，它类似于fopen的访问模式，有以下几种

* 模式 “a”，它允许您访问只读内存段
* 模式 “w”，它允许您访问可读写的内存段
* 模式 “c”，它创建一个新内存段，或者如果该内存段已存在，尝试打开它进行读写 *模式 “n”，它创建一个新内存段，如果该内存段已存在，则会失败，返回 false，并伴随有warning: unable to attach or create shared memory segment

**$permissions**

内存段的权限。您必须在这里提供一个八进制值，它类似于UNIX操作系统文件和目录的操作权限。

**$size**

内存段大小，以字节为单位。在写入一个内存段之前，您必须在它之上分配适当的字节数。

**$shmid**

此函数返回一个 ID 编号，其他函数可使用该 ID 编号操作该共享内存段。这个 ID 是共享内存访问 ID，与系统 ID 不同，它以参数的形式传递。请注意不要混淆这两者。如果失败，shmop_open 将返回 FALSE。


通过编号ID，在共享内存段写入数据：
```php
shmop_write($shmid, "hello shmop", 0);
```

通过编号ID，在共享内存段读取数据：
```php
$size = shmop_size($shmid);
$res = shmop_read($shmid, 0, $size);
```

使用共享内存的方式，可以在一个php页面进行共享内存的写入，而在另一个php页面进行共享内存的读取。

需要注意的是，一定要保证shmop操作读写的key值是一致的。

最后，所有操作完成后需要对共享内存段进行关闭和删除的操作。

<a id="markdown-session" name="session"></a>
## session
因为http无状态的特性，session是一个键值对集合，通过session进行用户的区分和跨页面数据共享。

```php
#1. 开启session。首先必须启动会话，向服务器注册用户的会话。
session_start();

#2. 存储session变量。存储或取回 session 变量中保存的值，可以通过将其保存在$_SESSION数组中来实现。
$_SESSION["xxx"] = "jack";
echo $_SESSION["xxx"];

#3. 删除session变量。
unset($_SESSION['xxx']);//删除一个已注册的session变量；
$_SESSION=array();//删除多个session。

#4. 注销session。注销当前会话
session_destory();
```

<a id="markdown-session登录验证" name="session登录验证"></a>
### session登录验证

下面案例演示了通过session方式实现登录验证，即未登录的情况下无法访问主页。

【session_login.php】登录页

【session_action.php】处理登录业务

【session_index.php】主页（登录后可访问）

【session_destory.php】处理注销业务


```html
<!-- session_login.php -->
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>模拟登录</title>
</head>
<body>
<h1>模拟登录</h1>
<form action="session_action.php" method="post">
    <div>
        用户名：<input type="text" name="userName">
    </div>
    <div>
        密码：<input type="password" name="userPassword">
    </div>
    <div>
        <input type="submit" value="登录">
    </div>
</form>
</body>
</html>
```

```php
// session_action.php
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
```

```php
// session_index.php
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
```

```php
// session_destory.php
<?php
session_start();

// 注销当前会话
session_destroy();

header("location:session_login.php");
```

<a id="markdown-cookie" name="cookie"></a>
## Cookie
cookie 是一种在远程浏览器端储存数据并以此来跟踪和识别用户的机制，PHP 透明地支持 HTTP cookie。

**创建cookie**

setcookie() 函数用于设置 cookie，不过要注意，setcookie() 函数必须位于 `<html>` 标签之前。

`setcookie(name, value, expire, path, domain);`

创建名为 "username" 的 cookie，把为它赋值 "张三"，同时我们也规定了此 cookie 在3600秒（即一小时）后过期：
```php
setcookie("username", "张三", time() + 3600);
```

**读取cookie**

通过之前创建cookie时的"username"读取：
```php
if (isset($_COOKIE["username"])) {
    echo "cookie:" . $_COOKIE["username"];
} else {
    echo "unset";
}
```

**删除cookie**

当要删除cookie时，把过期日期变更为过去的时间点即可，代码如下：
```php
setcookie("username", "张三", time() - 120);
```












