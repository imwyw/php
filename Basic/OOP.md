<!-- TOC -->

- [面向对象](#面向对象)
        - [构造方法](#构造方法)

<!-- /TOC -->

<a id="markdown-面向对象" name="面向对象"></a>
# 面向对象

解析如下：

* 类使用 class 关键字后加上类名定义。
* 类名后的一对大括号({})内可以定义变量和方法。
* 类的变量使用 var 来声明, 变量也可以初始化值。
* 函数定义类似 PHP 函数的定义，但函数只能通过该类及其实例化的对象访问。

```php
class Site
{
    /* 成员变量  使用var来声明*/
    var $url;
    var $title;

    /* 成员函数 */
    function setUrl($par)
    {
        $this->url = $par;
    }

    // PHP_EOL 换行符
    function getUrl()
    {
        echo $this->url . PHP_EOL;
    }

    function setTitle($par)
    {
        $this->title = $par;
    }

    function getTitle()
    {
        echo $this->title . PHP_EOL;
    }
}
```

创建对象，调用成员方法。
```php
$w3cschool = new Site;
$taobao = new Site;
$google = new Site;

// 调用成员函数，设置标题和URL
$w3cschool->setTitle( "W3Cschool教程" );
$taobao->setTitle( "淘宝" );
$google->setTitle( "Google 搜索" );

$w3cschool->setUrl( 'www.w3cschool.cn' );
$taobao->setUrl( 'www.taobao.com' );
$google->setUrl( 'www.google.com' );

// 调用成员函数，获取标题和URL
$w3cschool->getTitle();
$taobao->getTitle();
$google->getTitle();

$w3cschool->getUrl();
$taobao->getUrl();
$google->getUrl();
```

<a id="markdown-构造方法" name="构造方法"></a>
### 构造方法

语法格式：
```php
void __construct ([ mixed $args [, $... ]] )
```

```php
class Site
{
    /* 成员变量  使用var来声明*/
    var $url;
    var $title;

    public function __construct($u, $t)
    {
        $this->url = $u;
        $this->title = $t;
    }
}

$s1 = new Site("www.baidu.com", "baidu");
echo $s1->url . PHP_EOL;
```



