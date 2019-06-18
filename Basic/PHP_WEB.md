<!-- TOC -->

- [WEB编程](#web编程)
    - [表单提交](#表单提交)
    - [Cookie](#cookie)
    - [跨页面数据](#跨页面数据)
        - [shmop方式](#shmop方式)

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

<a id="markdown-跨页面数据" name="跨页面数据"></a>
## 跨页面数据

<a id="markdown-shmop方式" name="shmop方式"></a>
### shmop方式
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




