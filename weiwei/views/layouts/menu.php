<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>微E后台管理</title>
    <link rel="stylesheet" type="text/css" href="public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="public/css/main.css"/>
    <script type="text/javascript" src="public/js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">微E后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="">
                        <?php
                        $session = \Yii::$app->session;
                        $session->open();
                        echo $session->get("uname");
                        ?>
                    </a></li>
                <li><a href="index.php?r=login/login">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <ul class="sub-menu">
                        <li><a href="index.php?r=index/add"></i>添加公众号</a></li>
                        <li><a href="index.php?r=index/show"></i>查看公众号</a></li>
                    </ul>
                </li>
<!--                <li>-->
<!--                    <a href="#"></i>IP管理</a>-->
<!--                    <ul class="sub-menu">-->
<!--                        <li><a href="index.php?r=index/ip"></i>管理IP</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="#"></i>自定义回复</a>-->
<!--                    <ul class="sub-menu">-->
<!--                        <li><a href="index.php?r=reply/index"></i>文字回复</a></li>-->
<!--                        <li><a href="index.php?r=reply/ruled">添加规则</a></li>-->
<!--                        <li><a href="system.html">图文回复</a></li>-->
<!--                        <li><a href="system.html">机器人回复回复</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="#">菜单</a>-->
<!--                    <ul class="sub-menu">-->
<!--                        <li><a href="index.php?r=menu/index">自定义菜单</a></li>-->
<!--                        <li><a href="system.html">图文回复</a></li>-->
<!--                        <li><a href="system.html">机器人回复回复</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <?= $content ?>
</div>
</body>
</html>