<!DOCTYPE html>
<!-- saved from url=(0022)https://www.zhihu.com/ -->
<html lang="zh-CN" dropeffect="none"
      class="js is-AppPromotionBarVisible cssanimations csstransforms csstransitions flexbox no-touchevents no-mobile modal-doc-overflow modal-open"
      style="">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script async="" src="js/ga.js"></script>


    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">


    <title>首页 - 知乎</title>

    <meta name="apple-itunes-app" content="app-id=432274380">


    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta id="znonce" name="znonce" content="2a42706a06b8460ead9047ea19da58db">


    <link rel="stylesheet" href="/cn/css/topic.css">
    <link rel="stylesheet" href="/cn/css/header.css">

    <link rel="stylesheet" href="/cn/css/reset.css">
    <link rel="stylesheet" href="/cn/css/common.css">
    <link rel="stylesheet" href="/cn/css/topic-gc.css">
    <!--[if lt IE 9]>
    <!--<script src="https://static.zhihu.com/static/components/respond/dest/respond.min.js"></script>-->
    <script src="/cn/js/respond.proxy.js"></script>
    <!--[endif]-->
    <script src="/cn/js/instant.14757a4a.js"></script>
    <script src="/cn/js/jquery-1.12.2.min.js"></script>
    <script src="/cn/js/test.js"></script>

</head>

<body class="zhi ">


<!--搜索-->
<?php use app\commands\front\NavWidget; ?>
<?php NavWidget::begin(); ?>
<?php NavWidget::end(); ?>
<!--当前位置-->
<section>
    <div class="w12 location">
        <a href="/">首页</a>&nbsp;>&nbsp;<a
            href="/topic_square.html">话题</a>&nbsp;>&nbsp;<em><?php echo $topic['name'] ?></em>
    </div>
</section>
<div class="w12 zu-main clearfix " style="padding-top: 0;" id="main-topic" data-topicId="<?php echo isset($_GET['topicId']) ? $_GET['topicId'] : '' ?>" role="main" aria-hidden="false">
    <div class="w850 fl">
        <?php

            if(count($userTopic)>0) {
                ?>
                <div class="zm-topic-cat-title clearfix">
                    <h2 class="fl bT"><i class="zg-icon zg-icon-topic-square"
                                         style="background-position: -71px -88px;width: 16px;height: 16px;"></i>已参与的话题动态
                    </h2>
                    <a class="fr gzing" href="#">共关注<?php echo count($userTopic)?>个话题</a>
                </div>
                <ul class="topicList clearfix" style="border-bottom:1px solid #ccc;">
                    <?php
                        foreach($userTopic as $v) {
                            ?>
                            <li><a href="/topic/<?php echo $v['id']?>.html"><?php echo $v['name']?></a></li>
                        <?php
                        }
                    ?>
                    <!--                <a href="#">运动</a>-->
                </ul>
            <?php
            }else {
                ?>
                <div class="zm-topic-cat-title clearfix">
                    <h2 class="fl bT"><i class="zg-icon zg-icon-topic-square"
                                         style="background-position: -71px -88px;width: 16px;height: 16px;"></i>你还未参与任何话题
                    </h2>
                </div>
            <?php
            }
        ?>
        <div style="padding-top: 28px;" class="zu-main-content">
            <div class="zu-main-content-inner">


                <div class="topic-info">
                    <div style="overflow: auto;">
                        <h1 class="zm-editable-content questionName">
                            <?php echo isset($topic['name']) ? $topic['name'] : '' ?></h1>
                    </div>

                </div>

                <div class="zu-main-feed-con navigable">
                    <?php foreach ($data['data'] as $v) { ?>
                        <div id="js-home-feed-list" class="zh-general-list topstory clearfix">
                            <div class="feed-item folding feed-item-hook">
                                <div class="feed-item-inner">
                                    <div class="feed-content" data-za-module="AnswerItem">
                                        <h2 class="feed-title">
                                            <a class="question_link"
                                               href="/cn/question/<?php echo $topic['id'] ?>-<?php echo $v['id'] ?>.html?questionId=<?php echo $v['id'] ?>"
                                               target="_blank"><?php echo $v['title'] ?></a>
                                        </h2>
                                        <div class="relative reInfo">
                                            <a href="javascripi:;" class="vCount" title="200人查看">200</a>
                                        <div class="expandable entry-body">

                                            <div class="zm-item-answer-author-info">
                                                <span class="author-link"><?php echo $v['user']['username'] ?></span>
                                            </div>

                                            <div class="zm-item-rich-text expandable js-collapse-body">
                                                <div class="zh-summary summary clearfix">
                                                    <!--                                                    <img-->
                                                    <!--                                                        src="-->
                                                    <?php //echo isset($v['answer']['imageContent']) ? unserialize($v['answer']['imageContent'])[0] : '' ?><!--"-->
                                                    <!--                                                        data-rawwidth="440" data-rawheight="714"-->
                                                    <!--                                                        class="origin_image inline-img zh-lightbox-thumb"-->
                                                    <!--                                                        data-original="-->
                                                    <?php //echo isset($v['answer']['imageContent']) ? unserialize($v['answer']['imageContent'])[0] : '' ?><!--">-->
                                                    <?php echo isset($v['answer']['content']) ? $v['answer']['content'] : '还没有首楼，赶紧成为首楼' ?>
                                                    <!--                                                    <a href="javascript:;" class="toggle-expand">显示全部</a>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="feed-meta">
                                            <span class="meta-item toggle-comment js-toggleCommentBox"><i
                                                    class="z-icon-comment"></i><?php echo $v['commentNum'] ?>条评论</span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?php
                    }
                    ?>
                    <a href="javascript:;" data-page="2" id="zh-load-more" data-method="next"
                       class="zg-btn-white zg-r3px zu-button-more"
                       style="">更多</a>
                </div>

            </div>
        </div>
    </div>
    <div class="w285 fr">
        <div class="topics-plaza">
            <a target="_blank" href="/topic_square.html" class="zg-btn-blue">进入话题广场</a>
            <a target="_blank" href="/topic_square.html" class="text">
                来这里发现更多有趣话题
            </a>
        </div>
        <div class="topic-recommend rd2">
            <div class="topic-recommend-head" id="trd">
                <h2 class="topic-recommend-name fl">热门话题</h2>
                <a href="#" class="topics-pager fr">
                    换一换
                </a>
            </div>
            <div class="topic-item-contentList">
                <?php
                    foreach($hotTopic as $v) {
                        ?>
                        <div class="tItem">
                            <div class="tImg_icon">
                                <a href="/topic/<?php echo $v['id']?>.html"><img src="<?php echo $v['image']?>" alt=""></a>
                            </div>
                            <div>
                                <h3 class="topic-item-title">
                                    <a href="/topic/<?php echo $v['id']?>.html" target="_blank"><strong><?php echo $v['name']?></strong></a>
                                </h3>
                            </div>
                        </div>
                    <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<script src="/cn/js/vendor.cb14a042.js" aria-hidden="true"></script>
<script src="/cn/js/base.4cfce18f.js" aria-hidden="true"></script>

<script src="/cn/js/common.6b2d25b7.js" aria-hidden="true"></script>


<script src="/cn/js/richtexteditor.c68a1600.js" async="" aria-hidden="true"></script>
<script src="/cn/js/page-main.c0accdb8.js" aria-hidden="true"></script>
<script>
    $('#zh-load-more').click(function () {
        var page = $(this).attr('data-page');
        var topicId = $('#main-topic').attr('data-topicId');
        var str = '';
        $.ajax({
            url: '/cn/api/load-question',
            data: {
                topicId: topicId,
                page: page
            },
            dataType: 'json',
            type: 'post',
            success: function (data) {
                if (data.code == 0) {
                    $('#zh-load-more').html('暂无更多数据');
                    return false;
                }
                if (data.code == 1) {
                    $(this).attr('data-page', data.page);
                    for (var i = 0; i < data.data.data.length; i++) {
                        str += '<div class="feed-item folding feed-item-hook">' +
                            '<div class="feed-item-inner">' +
                            '<div class="feed-content" data-za-module="AnswerItem">' +
                            '<h2 class="feed-title">' +
                            '<a class="question_link" href="/cn/topic/question?questionId=' + data.data.data[i].id + '" target="_blank">' + data.data.data[i].title + '</a>' +
                            '</h2>' +
                            '<div class="expandable entry-body">' +

                            '<div class="zm-item-answer-author-info">' +
                            '<span class="author-link">' + data.data.data[i].user.username + '</span>' +
                            '</div>' +

                            '<div class="zm-item-rich-text expandable js-collapse-body">' +
                            '<div class="zh-summary summary clearfix">' + data.data.data[i].content + '' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="feed-meta">' +
                            '<span class="meta-item toggle-comment js-toggleCommentBox"><i class="z-icon-comment"></i>' + data.data.data[i].commentNum + '条评论</span>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +

                            '</div>';

                    }
                    $('#js-home-feed-list').append(str);
                }

            }
        })
    })
</script>
</html>