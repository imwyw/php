<!-- TOC -->

- [语法](#语法)
    - [基本语法](#基本语法)
        - [php脚本](#php脚本)
        - [注释](#注释)
        - [输出语句](#输出语句)
        - [命名空间](#命名空间)
        - [文件包含语句](#文件包含语句)
    - [PHP变量](#php变量)
        - [弱类型](#弱类型)
        - [作用域](#作用域)
    - [数据类型](#数据类型)
        - [常量](#常量)
        - [字符串](#字符串)
            - [引号的区别](#引号的区别)
            - [字符串函数](#字符串函数)
    - [数组](#数组)
        - [数值数组](#数值数组)
        - [关联数组](#关联数组)
        - [多维数组](#多维数组)
        - [数组排序](#数组排序)
        - [数组操作](#数组操作)
    - [超级全局变量](#超级全局变量)
        - [$GLOBALS](#globals)
        - [$_SERVER](#_server)
        - [$_REQUEST](#_request)
        - [$_POST](#_post)
        - [$_GET](#_get)
    - [函数](#函数)
    - [魔术常量](#魔术常量)
    - [常用方法](#常用方法)
        - [日期](#日期)

<!-- /TOC -->

<a id="markdown-语法" name="语法"></a>
# 语法
<a id="markdown-基本语法" name="基本语法"></a>
## 基本语法

<a id="markdown-php脚本" name="php脚本"></a>
### php脚本
PHP 脚本可以放在文档中的任何位置。

PHP 脚本以 <?php 开始，以 ?> 结束

```php
<?php        
// PHP 代码
?>
```

<a id="markdown-注释" name="注释"></a>
### 注释
```php
// 单行注释

# 单行注释

/*
多行注释
*/
```

<a id="markdown-输出语句" name="输出语句"></a>
### 输出语句
echo , print 和 print_r的区别:

* echo   - 可以输出一个或多个字符串
* print   - 只能输出简单类型变量的值,如int,string
* print_r - 可以输出复杂类型变量的值,如数组,对象

var_dump() 函数显示关于一个或多个表达式的结构信息，包括表达式的类型与值。数组将递归展开值，通过缩进显示其结构。

```php
$b = 3.1;
$c = true;
var_dump($b, $c);// 输出 float(3.1) bool(true)
```

<a id="markdown-命名空间" name="命名空间"></a>
### 命名空间

定义命名空间
```php
< ?php  
namespace MyProject1;  
// MyProject1 命名空间中的PHP代码  
 
namespace MyProject2;  
// MyProject2 命名空间中的PHP代码    
 
// 另一种语法
namespace MyProject3 {  
 // MyProject3 命名空间中的PHP代码    推荐！！！
}
?>
```

<a id="markdown-文件包含语句" name="文件包含语句"></a>
### 文件包含语句
include、require、include_once和require_once

```php
include '文件名';
```

<a id="markdown-php变量" name="php变量"></a>
## PHP变量

<a id="markdown-弱类型" name="弱类型"></a>
### 弱类型

在上面的实例中，我们注意到，不必向 PHP 声明该变量的数据类型。

PHP 会根据变量的值，自动把变量转换为正确的数据类型。

在强类型的编程语言中，我们必须在使用变量前先声明（定义）变量的类型和名称。

```php
$x = 5;
$y = 6;
$z = $x + $y;
echo $z;
```

PHP 变量规则：
* 变量以 $ 符号开始，后面跟着变量的名称
* 变量名必须以字母或者下划线字符开始
* 变量名只能包含字母数字字符以及下划线（A-z、0-9 和 _ ）
* 变量名不能包含空格
* 变量名是区分大小写的（y 和 Y 是两个不同的变量）

<a id="markdown-作用域" name="作用域"></a>
### 作用域
变量的作用域是脚本中变量可被引用/使用的部分。

PHP 有四种不同的变量作用域：
* local
* global
* static
* parameter



<a id="markdown-数据类型" name="数据类型"></a>
## 数据类型
虽然 PHP 是一门弱类型语言，在声明和使用变量的时候，并不需要指明其数据类型，但是你也应该了解它的数据类型！

String（字符串）, Integer（整型）, Float（浮点型）, Boolean（布尔型）, Array（数组）, Object（对象）, NULL（空值）。 

<a id="markdown-常量" name="常量"></a>
### 常量
设置常量，使用 define() 函数，函数语法如下：

```php
define(string constant_name, mixed value, case_sensitive = true)
```

该函数有三个参数:
* constant_name：必选参数，常量名称，即标志符。
* value：必选参数，常量的值。
* case_sensitive：可选参数，指定是否大小写敏感，设定为 true 表示不敏感。

<a id="markdown-字符串" name="字符串"></a>
### 字符串
PHP中字符串用单双引号都可以。

在 PHP 中，只有一个字符串运算符。

并置运算符 (.) 用于把两个字符串值连接起来。类似于java、c++、c#中的“+”拼接



<a id="markdown-引号的区别" name="引号的区别"></a>
#### 引号的区别
PHP中字符串的表示可以用双引号，也可以用单引号，但是两者之间有些区别。

字符串中有变量的时候，单引号仅输出变量名，而不是值：

```php
$a = "jack";
$b = "lucy";

echo '<h1>$a$b</h1>'; // $a$b
echo "<h1>$a$b</h1>"; // jacklucy
```

双引号中包含变量，存在某种特殊场景，比如
```php
echo "$a__$b"; // 报错，提示 Undefined variable: a__
```

两个变量中有其他字符干扰，则会导致无法解析变量，可以使用花括号包含解决

```php
echo  "<h1>{$a}__{$b}</h1>";
```

<a id="markdown-字符串函数" name="字符串函数"></a>
#### 字符串函数

函数 | 说明
---|---
chr() 　　　　　　　　 | 从指定的 ASCII 值返回字符。
explode() 　　　　　|　 把字符串打散为数组。
str_ireplace() 　　　|　 替换字符串中的一些字符。（对大小写不敏感）
str_word_count() 　　| 计算字符串中的单词数。
strip_tags() 　　　　|　剥去 HTML、XML 以及 PHP 的标签。
stripos() 　　　　　　 | 返回字符串在另一字符串中第一次出现的位置(大小写不敏感)
strlen()　　　　　　　 | 返回字符串的长度。

<a id="markdown-数组" name="数组"></a>
## 数组
* 数值数组 - 带有数字 ID 键的数组
* 关联数组 - 带有指定的键的数组，每个键关联一个值
* 多维数组 - 包含一个或多个数组的数组

<a id="markdown-数值数组" name="数值数组"></a>
### 数值数组
自动分配 ID 键（ID 键总是从 0 开始）：
```php
$cars=array("Volvo","BMW","Toyota");
```

人工分配 ID 键：
```php
$cars[0]="Volvo";        
$cars[1]="BMW";        
$cars[2]="Toyota";
```

count() 函数用于返回数组的长度
```php
$cars = array("Volvo", "BMW", "Toyota");

// for遍历数组
for ($i = 0; $i < count($cars); $i++) {
    echo $cars[$i] . ",";
}
```

```php
$cars = array("Volvo", "BMW", "Toyota");

// foreach 遍历
foreach ($cars as $car) {
    echo $car . ",";
}
```

<a id="markdown-关联数组" name="关联数组"></a>
### 关联数组

```php
$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
```
或者
```php
$age['Peter']="35";        
$age['Ben']="37";        
$age['Joe']="43";
```

foreach遍历 关联数组
```php
foreach ($age as $k => $v) {
    echo $k . "-" . $v . "<hr>";
}
```

<a id="markdown-多维数组" name="多维数组"></a>
### 多维数组
```php


$families = array
(
    "Griffin" => array
    (
        "Peter",
        "Lois",
        "Megan"
    ),
    "Quagmire" => array
    (
        "Glenn"
    ),
    "Brown" => array
    (
        "Cleveland",
        "Loretta",
        "Junior"
    )
);
```

<a id="markdown-数组排序" name="数组排序"></a>
### 数组排序

* sort() - 对数组进行升序排列
* rsort() - 对数组进行降序排列
* asort() - 根据关联数组的值，对数组进行升序排列
* ksort() - 根据关联数组的键，对数组进行升序排列
* arsort() - 根据关联数组的值，对数组进行降序排列
* krsort() - 根据关联数组的键，对数组进行降序排列

<a id="markdown-数组操作" name="数组操作"></a>
### 数组操作

array_push添加元素，unset删除元素

```php
$ids = array("a", "b", "c");
// 数组 添加元素
array_push($ids, "e");
print_r($ids); // Array ( [0] => a [1] => b [2] => c [3] => e )

// 删除数组元素
unset($ids[2]);
print_r($ids);// Array ( [0] => a [1] => b [3] => e )
```

array_search()查找数组元素
```php
$stu = array("jack" => array("jack", 12, "男"), "lucy" => array("lucy", 22, "女"));
// 按value值寻找，存在则返回key值，否则返回false
$res = array_search(array("jack", 12, "男"), $stu);
var_dump($res);//string(4) "jack"
```


<a id="markdown-超级全局变量" name="超级全局变量"></a>
## 超级全局变量
PHP中预定义了几个超级全局变量（superglobals） ，这意味着它们在一个脚本的全部作用域中都可用。 
* $GLOBALS
* $_SERVER
* $_REQUEST
* $_POST
* $_GET
* $_FILES
* $_ENV
* $_COOKIE
* $_SESSION

<a id="markdown-globals" name="globals"></a>
### $GLOBALS
$GLOBALS 是一个包含了全部变量的全局组合数组。变量的名字就是数组的键。

```php
$x = 75;
$y = 25;

function addition()
{
    $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
}

addition();
echo $z;
```

<a id="markdown-_server" name="_server"></a>
### $_SERVER

$_SERVER 是一个包含了诸如头信息(header)、路径(path)、以及脚本位置(script locations)等等信息的数组。

元素/代码 | 描述
------|---
$_SERVER['SERVER_ADDR'] | 当前运行脚本所在的服务器的 IP 地址。
$_SERVER['SERVER_NAME'] | 当前运行脚本所在的服务器的主机名。如果脚本运行于虚拟主机中，该名称是由那个虚拟主机所设置的值决定。(如: www.w3cschool.cn)
$_SERVER['QUERY_STRING'] | query string（查询字符串），如果有的话，通过它进行页面访问。
$_SERVER['REMOTE_PORT'] | 用户机器上连接到 Web 服务器所使用的端口号。
$_SERVER['SERVER_PORT'] | Web 服务器使用的端口。默认值为 "80"。如果使用 SSL 安全连接，则这个值为用户设置的 HTTP 端口。

<a id="markdown-_request" name="_request"></a>
### $_REQUEST
$_REQUEST 用于收集HTML表单提交的数据。表单method为POST/GET都可以收集到参数。

<a id="markdown-_post" name="_post"></a>
### $_POST
$_POST 被广泛应用于收集表单数据，在HTML form标签的指定该属性："method="post"。

<a id="markdown-_get" name="_get"></a>
### $_GET

$_GET 同样被广泛应用于收集表单数据，在HTML form标签的指定该属性："method="get"。

$_GET 也可以收集URL中发送的数据。

<a id="markdown-函数" name="函数"></a>
## 函数

创建函数及调用：
```php
function writeName($fname)
{
    echo $fname . " Refsnes.<br>";
}

echo "My name is ";
writeName("Kai Jim");

echo "My sister's name is ";
writeName("Hege");

echo "My brother's name is ";
writeName("Stale");
```

<a id="markdown-魔术常量" name="魔术常量"></a>
## 魔术常量
很多常量都是由不同的扩展库定义的，只有在加载了这些扩展库时才会出现，或者动态加载后，或者在编译时已经包括进去了。

有八个魔术常量它们的值随着它们在代码中的位置改变而改变。

魔术常量 | 描述
-----|---
`__LINE__` | 文件中的当前行号。
`__FILE__` | 文件的完整路径和文件名。
`__DIR__` | 文件所在的目录。
`__FUNCTION__` | 函数名称
`__CLASS__` | 类的名称
`__TRAIT__` | Trait 的名字
`__METHOD__` | 类的方法名
`__NAMESPACE__` | 当前命名空间的名称


```php
echo '这是第 “ ' . __LINE__ . ' ” 行<br>';
echo '该文件位于 “ ' . __FILE__ . ' ” <br>';
echo '该文件位于 “ ' . __DIR__ . ' ” <br>';

function test()
{
    echo '函数名为：' . __FUNCTION__ . '<br>';
}

test();
```

<a id="markdown-常用方法" name="常用方法"></a>
## 常用方法

<a id="markdown-日期" name="日期"></a>
### 日期





















