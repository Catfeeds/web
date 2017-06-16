<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="title" content="">
    <meta name="author" content="">
    <meta name="Copyright" content="">
    <!-- <meta name="description" content=""> -->
    <!-- 让IE浏览器用最高级内核渲染页面 还有用 Chrome 框架的页面用webkit 内核
    <!-- ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
    <!-- IOS6全屏 Chrome高版本全屏-->
    <!-- ================================================== -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <!-- 让360双核浏览器用webkit内核渲染页面-->
    <!-- ================================================== -->
    <meta name="renderer" content="webkit">
    <link rel="stylesheet" href="/cn/css/reset.css">
    <link rel="stylesheet" href="/cn/css/common.css">
    <link rel="stylesheet" href="/cn/css/subject.css">
    <link rel="stylesheet" href="/cn/css/font-awesome.min.css">
    <script src="/cn/js/jquery-1.12.2.min.js"></script>
    <script src="/cn/js/jquery.SuperSlide.2.1.1.js"></script>
    <title><?php echo isset($_GET['word'])?$_GET['word']:'' ?>_出国留学考试在线课程中心_海量优质网络课程_雷哥网网校</title>
</head>
<body>
<?php use app\commands\front\NavWidget; ?>
<?php NavWidget::begin(); ?>
<?php NavWidget::end(); ?>
<!--内容-->
<section id="interSchool_content" class="bg_g">
    <div class="w12">
        <!--当前地址-->
        <div class="address_bar bg_f">
            <div class="inm"><a href="/">全部</a>><span><?php echo isset($_GET['word'])?$_GET['word']:'' ?></span> </div>

        </div>
        <!--两侧内容-->
        <div class="clearfix">
            <div class="left-subject bg_f fl">
                <ul class="subject_list">
                    <?php
                        foreach($data as $v) {
                            ?>
                            <li>
                                <div class="subject_img2 inm"><a href="/goods/<?php echo $v['id']?>/<?php echo $v['type']?>.html"><img src="<?php echo $v['image']?>" alt=""></a>
                                </div>
                                <div class="subject_data inb">
                                    <h1 class="subject_name ellipsis"><a href="/goods/<?php echo $v['id']?>/<?php echo $v['type']?>.html"><?php echo $v['name']?></a></h1>
                                    <dl class="subject_data_wrap">
                                        <dt>
                                            <span class="sbj_name">价<i class="kg inm"></i>格：</span>
                                            <span class="new_price">￥<?php echo $v['price']?></span><span class="old_price">￥<?php echo $v['sales']?></span>
                                        </dt>
                                        <dt><span class="sbj_name"><?php echo $v['extendOneName']?>：</span><?php echo $v['extendOne']?></dt>
                                        <dt><span class="sbj_name"><?php echo $v['extendTwoName']?>：</span><?php echo $v['extendTwo']?></dt>
                                    </dl>
                                </div>
                                <div class="subject_btn inb">
                                    <?php
                                        if(isset($v['url'])&&!empty($v['url'])) {
                                            ?>
                                            <a href="<?php echo $v['url']?>" target="_blank">免费试听</a>
                                        <?php
                                        }else {
                                            ?>
                                            <a href="/goods/<?php echo $v['id']?>/<?php echo $v['type']?>.html">查看详情</a>
                                        <?php
                                        }
                                    ?>
                                    <a onclick="addCart(<?php echo $v['id']?>,<?php echo $v['type']?>)" href="javascript:;">加入购物车</a>
                                </div>
                            </li>
                        <?php
                        }
                    ?>
                </ul>
                <!--分页-->
                <div class="tr pageSize">
<?php
    echo $pageStr
?>
                </div>
            </div>
            <div class="right_ad fr">
                <div class="bg_f recommend_like_wrap">
                    <div class="rad_tit_wrap">
                        <img src="/cn/images/heart_1.png" alt="">
                        <span class="inm">猜你喜欢</span>
                    </div>
                    <ul class="like_list">
                        <?php
                            foreach($love as $v) {
                                ?>
                                <li>
                                    <div class="recommend_like_img int"><a href="/goods/<?php echo $v['id']?>/<?php echo $v['type']?>.html"><img src="<?php echo $v['image']?>"
                                                                                         alt=""></a></div>
                                    <dl class="int like_data">
                                        <dt class="like_name ellipsis"><a href="/goods/<?php echo $v['id']?>/<?php echo $v['type']?>.html"><?php echo $v['name']?></a></dt>
                                        <dt><span class="like_new_price">￥<?php echo $v['price']?></span> <span
                                                class="like_old_price">￥<?php echo $v['sales']?></span></dt>
                                        <?php if(isset($v['url'])&&$v['url']) {
                                            ?>
                                            <dt><a class="like_btn" href="<?php echo $v['url']?>" target="_blank">试听</a></dt>
                                        <?php
                                        }else {
                                            ?>
                                            <dt><a onclick="toBuy(<?php echo $v['id']?>,<?php echo $v['type']?>)" class="like_btn" href="javascript">购买</a></dt>
                                        <?php
                                        }
                                        ?>
                                    </dl>
                                </li>
                            <?php
                            }
                        ?>
                    </ul>
                </div>
                <!--广告位-->
                <ul class="adPosition">
                    <li><a href="#"><img src="/cn/images/ad_1.png" alt=""></a></li>
                    <li><a href="#"><img src="/cn/images/ad_2.png" alt=""></a></li>
                    <li><a href="#"><img src="/cn/images/ad_3.png" alt=""></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--footer-->
<?php use app\commands\front\FooterWidget; ?>
<?php FooterWidget::begin(); ?>
<?php FooterWidget::end(); ?>
</body>
<script type="text/javascript">
    $(function(){
        /**
         * 分页点击
         */
        $(".iPage").on("click",function(){
            var page = $(this).html();
            location.href="/select-<?php echo isset($_GET['word'])?$_GET['word']:'' ?>/page-"+page+'.html';
        });

        $('.prev').click(function(){
            var page = $('.table-page').find('.on').html();
            page = parseInt(page)-1;
            location.href="/select-<?php echo isset($_GET['word'])?$_GET['word']:'' ?>/page-"+page+'.html';
        });

        $('.next').click(function(){
            var page = $('.table-page').find('.on').html();
            page = parseInt(page)+1;
            location.href="/select-<?php echo isset($_GET['word'])?$_GET['word']:'' ?>/page-"+page+'.html';
        })
    })
</script>
</html>