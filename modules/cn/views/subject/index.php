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
    <title>网校课程</title>
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
            <div class="inm"><a href="/">全部</a></div>
            <?php
                foreach($category as $k => $v) {
                        foreach($v as $val){
                            if(isset($val['checked'])&&$val['checked'] == 1) {
                                $sign = 1;break;
                            }else{
                                $sign = 0;
                            }
                        }
                        if($sign == 0){
                            break;
                        }
                    ?>
                    <em class="icon-angle-right"></em>
                    <div class="address_nav2">
                        <?php
                            foreach($v as $val) {
                                ?>
                                <?php
                                    if(isset($val['checked'])&&$val['checked'] == 1) {
                                        ?>
                                        <a href="/subject/<?php echo $val['id']?>.html"><?php echo $val['name']?><em class="icon-angle-down"></em></a>
                                    <?php
                                    }
                                        ?>
                            <?php
                            }
                        ?>
                        <ul class="address_nav3">
                            <?php
                            foreach($v as $val) {
                                ?>
                            <?php
                            if(isset($val['checked'])&&$val['checked'] == 1) {
                                continue;
                            }
                                ?>
                                <li><a href="/subject/<?php echo $val['id']?>.html"><?php echo $val['name'] ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                <?php
                }
            ?>
        </div>
        <!--选择搜索标签-->
        <div class="pl_20 search_tag_bar bg_f">
            <?php
                foreach($category as $v) {
                    ?>
                    <?php
                    if (count($v) > 0) {
                        ?>
                        <div class="stag_list_wrap">
                            <span class="int tag_classify"><?php echo $v[0]['title']?>：</span>
                            <ul class="int sTAG-list clearfix">
                                <?php
                                    foreach($v as $val) {
                                        ?>
                                        <li <?php echo isset($val['checked'])&&$val['checked']==1?'class="on"':''?>>
                                            <a href="/subject/<?php echo $val['id']?>.html"><?php echo $val['name']?></a>
                                        </li>
                                    <?php
                                    }
                                        ?>
                            </ul>
                        </div>
                    <?php
                    }
                }
            ?>
        </div>
        <!--推荐版块课程-->
        <ul class="bg_f recommend_list">
            <?php
                foreach($recommend as $v) {
                    ?>
                    <li>
                        <div class="subject_img inm"><img src="http://class.viplgw.cn<?php echo $v['image']?>" alt=""></div>
                        <p class="ellipsis-2 inm recommend_subject_name"><?php echo $v['name']?></p>

                        <div class="inm recommend_subject_data">
                            <p>时间：<?php echo isset($v['openingDate'])?$v['openingDate']:'滚动开课'?></p>

                            <p>课时：<?php echo isset($v['courseDuration'])?$v['courseDuration']:'待定'?></p>
                        </div>
                        <div class="recommend_quota inm tm">
                            <p class="quota_num"><?php echo isset($v['quota'])?$v['quota']:'10'?></p>

                            <p class="quota_name">剩余名额</p>
                        </div>
                        <span class="recommend_subject_price inm">￥<?php echo $v['price']?></span>

                        <div class="inm recommend_subject_check">
                            <?php if(isset($v['url'])&&$v['url']) {
                                ?>
                                <a href="<?php echo $v['url']?>" target="_blank">免费试听</a>
                            <?php
                            }else {
                                ?>
                                <a onclick="addCart(<?php echo $v['id']?>,1)" href="javascript:;">加入购物车</a>
                            <?php
                            }
                            ?>
                            <a onclick="toBuy(<?php echo $v['id']?>,1)" href="javascript:;">立即报名</a>
                        </div>
                    </li>
                <?php
                }
            ?>
            <??>
        </ul>
        <!--两侧内容-->
        <div class="clearfix">
            <div class="left-subject bg_f fl">
                <ul class="subject_list">
                    <?php
                        foreach($data as $v) {
                            ?>
                            <li>
                                <div class="subject_img2 inm"><a href="/goods/<?php echo $v['id']?>/<?php echo $v['type']?>.html"><img src="http://class.viplgw.cn/<?php echo $v['image']?>" alt=""></a>
                                </div>
                                <div class="subject_data inb">
                                    <h1 class="subject_name ellipsis"><a href="/goods/<?php echo $v['id']?>/<?php echo $v['type']?>.html"><?php echo $v['name']?></a></h1>
                                    <dl class="subject_data_wrap">
                                        <dt>
                                            <span class="sbj_name">价<i class="kg inm"></i>格：</span>
                                            <span class="new_price">￥<?php echo $v['price']?></span><span class="old_price">￥<?php echo $v['sales']?></span>
                                        </dt>
                                        <?php
                                            foreach($extend as $k => $val) {
                                                if($k == 2){break;}
                                                ?>
                                                <dt><span class="sbj_name"><?php echo $val['name']?>：</span><?php echo $v[$val['value']]?></dt>
                                            <?php
                                            }
                                        ?>
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
            location.href="/subject-<?php echo isset($_GET['catId'])?$_GET['catId']:'' ?>/page-"+page+'.html';
        });

        $('.prev').click(function(){
            var page = $('.table-page').find('.on').html();
            page = parseInt(page)-1;
            location.href="/subject-<?php echo isset($_GET['catId'])?$_GET['catId']:'' ?>/page-"+page+'.html';
        });

        $('.next').click(function(){
            var page = $('.table-page').find('.on').html();
            page = parseInt(page)+1;
            location.href="/subject-<?php echo isset($_GET['catId'])?$_GET['catId']:'' ?>/page-"+page+'.html';
        })
    })
</script>
</html>