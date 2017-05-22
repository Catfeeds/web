<!DOCTYPE html>
<html lang="en">
<head>
    <!--阻止浏览器缓存-->
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
    <meta http-equiv="expires" content="0">
    <!-- Basic Page Needs
     ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="title" content="">
    <meta name="author" content="">
    <meta name="Copyright" content="">
    <meta name="description" content="">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- 让IE浏览器用最高级内核渲染页面 还有用 Chrome 框架的页面用webkit 内核
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
    <!-- IOS6全屏 Chrome高版本全屏
    ================================================== -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <!-- 让360双核浏览器用webkit内核渲染页面
    ================================================== -->
    <meta name="renderer" content="webkit">
    <link rel="stylesheet" href="/cn/css/reset.css">
    <link rel="stylesheet" href="/cn/css/common.css">
    <link rel="stylesheet" href="/cn/css/main.css">
    <link rel="stylesheet" href="/cn/css/topic-gc.css">
    <script src="/cn/js/jquery-1.12.2.min.js"></script>
    <title>话题广场</title>
</head>
<body class="bg-f">
<!--搜索-->
<?php use app\commands\front\NavWidget; ?>
<?php NavWidget::begin(); ?>
<?php NavWidget::end(); ?>
<!--当前位置-->
<section>
    <div class="w12 location">
        <a href="/">首页</a>&nbsp;>&nbsp;<a href="/topic_square.html">话题</a>&nbsp;>&nbsp;<a href="/topic/<?php echo isset($_GET['topicId'])?$_GET['topicId']:'0' ?>.html">问题</a>&nbsp;>&nbsp;<em><?php echo isset($question['title']) ? $question['title'] : '' ?></em>
    </div>
</section>
<section id="topicGc">
    <div class="w12 clearfix" style="padding-top: 15px">
        <div class="fl" style="width: 850px">
            <div class="zm-topic-cat-title clearfix">
                <h2 class="fl bT"><i class="zg-icon zg-icon-topic-square"></i>话题广场</h2>
<!--                <a class="fr gzing" href="#">已关注7个话题</a>-->
            </div>
            <ul class="topicList clearfix">
                <?php
                foreach($topic as $v) { ?>
                    <li><a href="/topic/<?php echo $v['id'] ?>.html"><?php echo $v['name'] ?></a></li>
                    <?php
                }
                ?>
                <!--                <a href="#">运动</a>-->
            </ul>
<!--            <ul class="topicWrap-list">-->
<!--                <li>-->
<!--                    <div class="topicImg-left fl"><img src="/cn/images/8f57b9d21e34c1a2c04877f3d576f7a4_xs.jpg" alt=""></div>-->
<!--                    <div class="fl">-->
<!--                        <div class="twName clearfix">-->
<!--                            <a class="tcName fl" href="#">运动</a>-->
<!--                            <a class="gz fr" href="#"><i class="z-icon-follow"></i>关注</a>-->
<!--                        </div>-->
<!--                        <p class="ellipsis-2 twDe">游戏 是一种在特定时间、空间范围内遵循某种特定规则的，追求精神…</p>-->
<!--                    </div>-->
<!--                </li>-->
<!--            </ul>-->
        </div>
        <div class="w285 hotGc fr">
            <div class="zm-topic-cat-title clearfix">
                <h2 class="bT">热门话题</h2>
            </div>
            <ul class="hotWrap">
                <?php
                foreach($hotTopic as $h) {
                    ?>
                    <li>
                        <div class="top clearfix">
                            <div class="topicImg fl"><img src="/cn/images/c0709cb3e_m.jpg" alt=""></div>
                            <div class="fl hTit">
                                <div class="hContent"><a href="/topic/<?php echo $h['id'] ?>.html"><?php echo isset($h['name']) ? $h['name'] : '' ?></a>
                                </div>
                                <div class="meta">
                                    <span>34801 人关注</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</section>

</body>
</html>