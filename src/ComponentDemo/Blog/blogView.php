<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        /*整体页面的基本设置，背景、字体、外边距等*/
        body {
            background-color: #c7b6b8;
            color: white;
            /*设置外边距，上下外边距为0，左右外边距设置100px*/
            margin: 0 100px;
        }

        hr {
            /*定义分割线为虚线*/
            border-style: dashed;
            /*清除浮动，将浮动元素拉回文档流*/
            clear: both;
            /*上下外边距为5px，左右外边距为0*/
            margin: 5px 0;
        }

        .head-left {
            float: left;
            margin-bottom: 5px;
        }

        .head-right {
            float: right;
            margin-bottom: 5px;
        }

        /*头部右侧导航按钮的设置*/
        .head-right a {
            display: inline-block;
            width: 80px;
            text-align: center;
            color: white;
            text-decoration: none;
            border: 1px solid white;
            border-radius: 5px;
            margin: 0 20px;
        }

        .main-left {
            float: left;
            width: 68%;
            min-height: 600px;
            background-color: white;
        }

        .main-right {
            float: right;
            background-color: white;
            width: 27%;
            padding: 0 15px;
        }

        /*每个blog项目高度固定*/
        .blog-item {
            height: 110px;
            border-bottom: 1px dashed darkgrey;
        }

        /*每个blog项目修改为内敛块，横向排列*/
        .blog-item > div {
            display: inline-block;
        }

        .blog-img {
            background-size: cover;
            padding: 20px 20px 10px 20px;
        }

        .blog-img img {
            width: 80px;
            height: 80px;
        }

        .blog-summary {
            width: 80%;
            color: black;
        }

        /*博客 主标题*/
        .blog-title {
            color: #ad7757;
            margin: 0; /*去掉默认的标题外边距*/
        }

        /*博客 副标题*/
        .blog-describe {
            margin: 3px 0;
            font-size: 14px;
        }

        /*博客简要描述*/
        .blog-detail {
            border-left: 1.5px dotted darkgrey;
            padding-left: 5px;
            font-size: 14px;
        }

        /*右侧部分*/
        .blog-info {
            text-align: center;
        }

        .blog-info img {
            width: 150px;
            height: 150px;
            margin: 5px;
        }

        .blog-selfinfo {
            color: black;
            width: 90%;
            margin: 0 auto; /*左右外边距自动，即左右居中*/
            border-radius: 8px;
            height: 70px;
            background-color: #eeeeee;
        }

        .blog-selfinfo h3 {
            margin: 0;
        }

        /*推荐书籍*/
        .blog-books {
            color: black;
            border-bottom: 1.5px dotted darkgrey;
        }

        .blog-books h3 {
            border-bottom: 1.5px dotted darkgrey;
        }

        .blog-books ul {
            padding-left: 10px;
        }

        .blog-books ul > li {
            list-style: none;
        }

        .blog-visit {
            text-align: center;
            color: black;
            margin: 3px;
        }

        footer {
            height: 50px;
        }

        #foot-copy {
            float: left;
        }

        footer ul {
            float: right;
            margin: 0;
        }

        footer ul > li {
            float: left;
            list-style: none;
            width: 90px;
        }

        footer ul a {
            cursor: pointer;
        }

    </style>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>博客</title>
</head>
<body>
<header>
    <h1>博客首页</h1>
    <div>
        <div class="head-left">本页面主要采用DIV+CSS布局来实现的</div>
        <div class="head-right">
            <a class="nav-btn" href="javascript:void(0)">首页</a>
            <a class="nav-btn" href="javascript:void(0)">闲言碎语</a>
            <a class="nav-btn" href="javascript:void(0)">我是谁</a>
        </div>
    </div>
</header>
<hr>
<main>
    <div class="main-left">

        <div class="blog-item">
            <div class="blog-img">
                <img src="aiit.jpg">
            </div>
            <div class="blog-summary">
                <h3 class="blog-title">我是HTML</h3>
                <div class="blog-describe"><i>博思智慧平台</i></div>
                <div class="blog-detail">超文本标记语言（英语：HyperText Markup Language，简称：HTML）是一种用于创建网页的标准标记语言。</div>
            </div>
        </div>

        <div class="blog-item">
            <div class="blog-img">
                <img src="aiit.jpg">
            </div>
            <div class="blog-summary">
                <h3 class="blog-title">我是CSS</h3>
                <div class="blog-describe"><i>博思智慧平台</i></div>
                <div class="blog-detail">样式表定义如何显示 HTML 元素，就像 HTML 中的字体标签和颜色属性所起的作用那样。样式通常保存在外部的 .css 文件中。我们只需要编辑一个简单的
                    CSS 文档就可以改变所有页面的布局和外观。
                </div>
            </div>
        </div>

        <div class="blog-item">
            <div class="blog-img">
                <img src="aiit.jpg">
            </div>
            <div class="blog-summary">
                <h3 class="blog-title">我是HTML</h3>
                <div class="blog-describe"><i>博思智慧平台</i></div>
                <div class="blog-detail">超文本标记语言（英语：HyperText Markup Language，简称：HTML）是一种用于创建网页的标准标记语言。</div>
            </div>
        </div>

        <div class="blog-item">
            <div class="blog-img">
                <img src="aiit.jpg">
            </div>
            <div class="blog-summary">
                <h3 class="blog-title">我是CSS</h3>
                <div class="blog-describe"><i>博思智慧平台</i></div>
                <div class="blog-detail">样式表定义如何显示 HTML 元素，就像 HTML 中的字体标签和颜色属性所起的作用那样。样式通常保存在外部的 .css 文件中。我们只需要编辑一个简单的
                    CSS 文档就可以改变所有页面的布局和外观。
                </div>
            </div>
        </div>

    </div>

    <div class="main-right">
        <div class="blog-info">
            <img src="aiit.jpg">
            <div class="blog-selfinfo">
                <h3>我的博客</h3>
                <span>写字楼里写字间，写字间里程序员。程序人员写程序，又拿程序换酒钱。</span>
            </div>
        </div>

        <div class="blog-books">
            <h3><i>推荐书籍</i></h3>
            <ul>
                <li>《CSS权威指南》</li>
                <li>《锋利的JQuery》</li>
                <li>《Javascript权威指南》</li>
                <li>《CSS权威指南》</li>
                <li>《锋利的JQuery》</li>
                <li>《Javascript权威指南》</li>
            </ul>
        </div>

        <div class="blog-visit">
            <div>访客：123名</div>
            <div>文章：12篇</div>
        </div>
    </div>
</main>
<hr>
<footer>
    <div id="foot-copy">2017-2019 Copyright my blog</div>
    <ul>
        <li><a>关于我们</a></li>
        <li><a>联系我们</a></li>
        <li><a>使用条款</a></li>
        <li><a>意见反馈</a></li>
    </ul>
</footer>

<script>
    window.onload = function () {
        // 获取所有 nav-btn 样式按钮
        var navs = document.getElementsByClassName('nav-btn');
        for (var i = 0; i < navs.length; i++) {
            navs[i].addEventListener('click', function (e) {
                // 触发事件的元素
                console.log(e.target);
                alert(e.target.innerHTML);
            })
        }
    };
</script>

</body>
</html>