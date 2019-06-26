<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>首页</title>
    <style>
        header, footer {
            background-color: lightcyan;
        }

        div {
            margin: 3px;
        }

        #main div {
            padding: 0 5px;
        }

        ul {
            padding: 0;
        }

        ul li {
            list-style: none;
        }

        ul li a {
            color: cadetblue;
            text-decoration-line: none;
        }

        ul li a:hover {
            color: hotpink;
            background-color: darkslategrey;
        }

        div.div-float {
            float: left;
            height: 100%;
            background-color: antiquewhite;
        }
    </style>
</head>
<body>

<header style="height: 70px;">
    <h2 style="line-height:70px; text-align: center;">最简单的MIS管理系统布局</h2>
</header>

<div id="main">
    <div class="div-float" style="width: 80px;">
        <ul>
            <li><a href="../ValidateCodeDemo/ValidateView.php" target="content">验证码</a></li>
            <li><a href="../UploadDemo/Upload.php" target="content">上传图片</a></li>
        </ul>
    </div>
    <div class="div-float" id="contentParent">
        <iframe id="content" name="content" frameborder="0" style="width: 100%;height: 100%"
                src="../ValidateCodeDemo/ValidateView.php"></iframe>
    </div>
</div>

<footer style="height: 40px;clear: both;">
    <h4 style="text-align: center;line-height: 40px;">copyright2018 iflytek</h4>
</footer>

<script type="text/javascript">
    //页面加载完成时执行mainHeight函数
    window.onload = mainHeight;

    //自适应宽度和高度
    function mainHeight() {
        var h = document.documentElement.clientHeight;
        var w = document.documentElement.clientWidth;
        document.getElementById("main").style.height = (h - 180) + "px";
        document.getElementById("contentParent").style.width = (w - 135) + "px";
    }

    //定时任务，即500毫秒(半秒钟)执行一次mainHeight函数
    setInterval(mainHeight, 500);
</script>
</body>
</html>
