<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--阻止浏览器缓存-->
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
    <meta http-equiv="expires" content="0">
    <!-- Basic Page Needs
     ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="GMAT网课，GMAT培训，托福网课，托福培训，雅思网课，雅思培训，零中介留学，美国留学，出国留学，留学申请，留学文书、海外实习">
    <meta name="description" content="雷哥网社区-我们就爱分享知识！申友旗下一站式互联网留学备考智能服务平台。">
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
    <link rel="stylesheet" href="/cn/css/swipebox.css">
    <link rel="stylesheet" href="/cn/css/justifiedgallery.min.css">
    <link rel="stylesheet" href="/cn/css/animate.min.css">
    <script src="/cn/js/jquery-1.12.2.min.js"></script>
    <script src="/cn/js/jquery.swipebox.js"></script>
    <script src="/cn/js/justifiedgallery.js"></script>
    <script src="/cn/js/jquery.SuperSlide.2.1.1.js"></script>
    <script src="/cn/js/showImg.js"></script>
    <title><?php echo $category->name ? $category->name : '全部帖子' ?>-雷哥网社区-我们就爱分享知识！</title>
    <style>
        .tzTop{
            padding: 20px 0;
        }
        .tzBt{
            padding-bottom: 20px;
        }
        .tzIcon{
            width: 70px;
            height: 70px;
            overflow: hidden;
            border-radius: 4px;
            margin-right: 20px;
        }
        .tzNum{
            color: #81828c;
            font-size: 13px;
        }
        .tzNum span{
            margin: 0 10px;
        }
        .tzbName{
            font-size: 18px;
            color: #444444;
            padding-left: 10px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body id="community">
<!--搜索-->
<?php use app\commands\front\NavWidget; ?>
<?php NavWidget::begin(); ?>
<?php NavWidget::end(); ?>
<!--当前位置-->
<section>
    <div class="w12 location">
        <div class="tzTop"><a href="/">首页</a>&nbsp;><?php
            if(count($parent)>0) {
                foreach ($parent as $v) {
                    ?>
                    <a href="/post/list/<?php echo $v['id']?>.html"><?php echo $v['name']?>
                    </a>&nbsp;><em><?php echo  $category['name'] ?></em>
                <?php
                }
            }else{
                echo '<em>全部帖子</em>';
            }
            ?>
            </div>
        <div class="tzBt">
            <div class="tzIcon inb"><img src="<?php echo $category['image']?$category['image']:''?>" alt=""></div>
            <div class="inb">
                <p class="tzbName"><?php echo $category['name']?$category['name']:'全部帖子'?></p>
                <div class="tzNum">
                    <span>今日新贴：<span class="light"><?php echo $today?></span></span>|
                    <span>贴子总数：<span class="light"><?php echo $count?></span></span>
                </div>
            </div>
        </div>
    </div>
</section>
<!--社区内容-->
<section>
    <div class="w12 clearfix content-wrap">
        <div class="left fl">
            <div class="lc-1 bg-f">
                <!--热帖-->
                <div class="lc-tit">
                    <div class="ic-wrap inb"><img src="/cn/images/ic-2.png" alt=""></div>
                    <span class="lc-tit-word"><?php echo $category->name ? $category->name : '全部帖子' ?></span>
                    <!--                    <a class="fr more" href="/">返回首页</a>-->
                </div>

            </div>
            <!--帖子列表-->
            <div class="bg-f lc-3">
                <ul class="post-list3">
                    <?php
                    foreach ($data as $v) {
                        ?>
                        <li>
                            <div class="user-head inb"><img
                                    src="<?php echo isset($v['image']) ? $v['image'] : '/cn/img/noavatar_big.gif' ?>"
                                    alt=""></div>
                            <div class="post-info inb">
                                <div class="post-tit">
                                    <span><?php echo $v['catName'] ?></span>
                                    <?php
                                    if ($v['hot']) {
                                        ?>
                                        <span>HOT</span>
                                        <?php
                                    }
                                    ?>
                                    <a href="/post/details/<?php echo $v['id'] ?>.html"><?php echo $v['title'] ?></a>
                                </div>
                                <!--                                <p class="post-de">-->
                                <?php //echo $v['cnContent'] ?><!--</p>-->
                                <div class="publish-info clearfix">


                                    <div class="author-info">
                                         <span class="author-name"><?php echo $v['nickname'] ? $v['nickname'] : $v['userName'] ?></span>
                                        <span class="show-time">发布于 <?php echo $v['dateTime'] ?></span>
                                    </div>

                                    <?php
                                    if ($v['replySign']) {
                                        ?>
                                        <!--                                        <div class="author-info">-->
                                        <!--                                        <span class="reply-data">--><?php //echo $v['replyName'] ?><!--最后回复于 --><?php //echo date("Y-m-d H:i", $v['replyTime']) ?><!-- </span>-->
                                        <!--                                        </div>-->
                                        <div class="author-info">
                                            <span class="author-date" title=""><?php echo $v['replyName'] ?></span>
                                            <span class="show-time"
                                                  title="09:01">最后回复于&nbsp;<span><?php echo date("Y-m-d H:i", $v['replyTime']) ?></span></span>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div class="fans_numbox">
                                        <span>查看：<span class="light"><?php echo $v['viewCount'] ?></span></span>|
                                                <span>回复：<span class="light"><?php echo $v['replyCount'] ?></span>
                                            </span>
                                    </div>
                                </div>
                                <div class="picturedisplay">
                                    <div class="thumblist ">
                                        <?php
                                        $images = unserialize($v['imageContent']);
                                        foreach ($images as $val) {
                                            ?>
                                            <span onclick="showPicture(this);"><img
                                                    src="http://gossip.gmatonline.cn<?php echo $val ?>" alt=""></span>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="picturebox xs-image">
                                        <div class="picturecontrol x-act"
                                             style=" color: #9699a3;    padding-bottom: 20px;">
                                            <a class="x-btn" onclick="closePicture(this);"
                                               href="javascript:;">
                                                <img src="/cn/images/Icon_shouqi.png">
                                                收起

                                            </a>
                                            &nbsp;&nbsp;&nbsp;

                                            <a class="icon_viewlarge x-btn" href="#" target="_blank">
                                                <img src="/cn/images/Icon_chakandatu.png">
                                                查看大图</a>
                                            &nbsp;&nbsp;&nbsp;

                                            <a class="icon_turnleft x-btn" onclick="turnImg(this);" href="javascript:;">
                                                <img src="/cn/images/Icon_xuanzhuan.png">
                                                旋转
                                            </a>

                                        </div>
                                        <div class="bigpicture">
                                            <div class="picturewrap" onclick="closePicture(this);"
                                                 style="margin: 20px;">
                                                <img deg="0" class="picture" src="/cn/images/nopic.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <div class="show-more tm">
                    <ul class="pageSize-wrap">
                        <?php echo $pageStr?>
                    </ul>
                </div>
                <script type="text/javascript">
                    /**
                     * 讨论分页
                     */
                    $("body").on("click",".iPage",function(){
                        var page = $(this).html();
                        location.href="/post/list/<?php echo $catId?>/"+page+".html";
                    })
                </script>
            </div>
        </div>
        <?php use app\commands\front\RightWidget; ?>
        <?php RightWidget::begin(); ?>
        <?php RightWidget::end(); ?>
    </div>
</section>

</body>

<script>


    $('.post-list li').click(function () {
        var num = $(this).index();
        $(this).addClass("on").siblings("li").removeClass("on");
        $('.post-nav2 .post-list2').eq(num).slideDown(300).siblings(".post-list2").slideUp(200);
    });
    $('.rank-classify span').click(function () {
        var num = $(this).index();
        $(this).addClass("on").siblings("span").removeClass("on");
        $(".rankList-wrap").eq(num).fadeIn(300).siblings(".rankList-wrap").hide();
    });
    //        banner 轮播
    jQuery(".slide-box").slide({
        mainCell: ".banner",
        effect: "fold",
        autoPlay: true,
    });
    //    课程推荐
    jQuery(".slideBox-1").slide({
        mainCell: ".banner",
        titCell: ".hd ul",
        effect: "leftLoop",
        autoPage: "<li></li>",
        autoPlay: true
    });
    //    微信交流
    jQuery(".slideBox-2").slide({
        mainCell: ".banner",
        titCell: ".hd ul",
        effect: "fold",
        autoPage: "<li></li>",
        autoPlay: true
    });

</script>
</html>