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
            <div class="inm"><a href="#">全部</a></div>
            <?php
                foreach($category as $k => $v) {
                        if($k == count($category)-1){
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
                                        <a href="#"><?php echo $val['name']?><em class="icon-angle-down"></em></a>
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
                                <li><a href="#"><?php echo $val['name'] ?></a></li>
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
                                            <a href="#"><?php echo $val['name']?></a>
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
            <li>
                <div class="subject_img inm"><img src="/cn/images/subject_icon.png" alt=""></div>
                <p class="ellipsis-2 inm recommend_subject_name">2017年gmat在线强化全程课程</p>
                <div class="inm recommend_subject_data">
                    <p>时间：2016/6/17至2017/6/30每天17：30</p>
                    <p>课时：共计8课时</p>
                </div>
                <div class="recommend_quota inm tm">
                    <p class="quota_num">10</p>
                    <p class="quota_name">剩余名额</p>
                </div>
                <span class="recommend_subject_price inm">￥2600</span>
                <div class="inm recommend_subject_check">
                    <a href="#">免费试听</a>
                    <a href="#">立即报名</a>
                </div>
            </li>
            <li>
                <div class="subject_img inm"><img src="/cn/images/subject_icon.png" alt=""></div>
                <p class="ellipsis-2 inm recommend_subject_name">2017年gmat在线强化全程课程</p>
                <div class="inm recommend_subject_data">
                    <p>时间：2016/6/17至2017/6/30每天17：30</p>
                    <p>课时：共计8课时</p>
                </div>
                <div class="recommend_quota inm tm">
                    <p class="quota_num">10</p>
                    <p class="quota_name">剩余名额</p>
                </div>
                <span class="recommend_subject_price inm">￥2600</span>
                <div class="inm recommend_subject_check">
                    <a href="#">免费试听</a>
                    <a href="#">立即报名</a>
                </div>
            </li>
        </ul>
        <!--两侧内容-->
        <div class="clearfix">
            <div class="left-subject bg_f fl">
                <ul class="subject_list">
                    <?php
                        foreach($data as $v) {
                            ?>
                            <li>
                                <div class="subject_img2 inm"><a href="#"><img src="<?php echo $v['image']?>" alt=""></a>
                                </div>
                                <div class="subject_data inb">
                                    <h1 class="subject_name ellipsis"><a href="#"><?php echo $v['name']?></a></h1>
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
                                            <a href="<?php echo $v['url']?>">免费试听</a>
                                        <?php
                                        }
                                    ?>
                                    <a href="#">加入购物车</a>
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
                        <li>
                            <div class="recommend_like_img int"><a href="#"><img src="/cn/images/r_img.png" alt=""></a></div>
                            <dl class="int like_data">
                                <dt class="like_name ellipsis"><a href="#">GMAT周末班一对一</a></dt>
                                <dt><span class="like_new_price">￥400</span> <span class="like_old_price">￥700</span></dt>
                                <dt><a class="like_btn" href="#">试听</a></dt>
                            </dl>
                        </li>
                        <li>
                            <div class="recommend_like_img int"><a href="#"><img src="/cn/images/r_img.png" alt=""></a></div>
                            <dl class="int like_data">
                                <dt class="like_name ellipsis"><a href="#">GMAT周末班一对一</a></dt>
                                <dt><span class="like_new_price">￥400</span> <span class="like_old_price">￥700</span></dt>
                                <dt><a class="like_btn" href="#">试听</a></dt>
                            </dl>
                        </li>
                        <li>
                            <div class="recommend_like_img int"><a href="#"><img src="/cn/images/r_img.png" alt=""></a></div>
                            <dl class="int like_data">
                                <dt class="like_name ellipsis"><a href="#">GMAT周末班一对一</a></dt>
                                <dt><span class="like_new_price">￥400</span> <span class="like_old_price">￥700</span></dt>
                                <dt><a class="like_btn" href="#">试听</a></dt>
                            </dl>
                        </li>
                        <li>
                            <div class="recommend_like_img int"><a href="#"><img src="/cn/images/r_img.png" alt=""></a></div>
                            <dl class="int like_data">
                                <dt class="like_name ellipsis"><a href="#">GMAT周末班一对一</a></dt>
                                <dt><span class="like_new_price">￥400</span> <span class="like_old_price">￥700</span></dt>
                                <dt><a class="like_btn" href="#">试听</a></dt>
                            </dl>
                        </li>
                        <li>
                            <div class="recommend_like_img int"><a href="#"><img src="/cn/images/r_img.png" alt=""></a></div>
                            <dl class="int like_data">
                                <dt class="like_name ellipsis"><a href="#">GMAT周末班一对一</a></dt>
                                <dt><span class="like_new_price">￥400</span> <span class="like_old_price">￥700</span></dt>
                                <dt><a class="like_btn" href="#">试听</a></dt>
                            </dl>
                        </li>
                        <li>
                            <div class="recommend_like_img int"><a href="#"><img src="/cn/images/r_img.png" alt=""></a></div>
                            <dl class="int like_data">
                                <dt class="like_name ellipsis"><a href="#">GMAT周末班一对一</a></dt>
                                <dt><span class="like_new_price">￥400</span> <span class="like_old_price">￥700</span></dt>
                                <dt><a class="like_btn" href="#">试听</a></dt>
                            </dl>
                        </li>
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
<footer>
    <div class="w12 tm" style="padding: 30px 0">
        <ul class="footer-list">
            <li><a href="javascript:void(0);">课程类型</a></li>
            <li><a href="http://www.gmatonline.cn/index.html">GMAT</a></li>
            <li><a href="http://www.toeflonline.cn/">TOEFL</a></li>
            <li><a href="http://ielts.gmatonline.cn/">IELTS</a></li>
            <li><a href="http://smartapply.gmatonline.cn/">留学</a></li>
        </ul>
        <ul class="footer-list">
            <li><a href="javascript:void(0);">题库</a></li>
            <li><a href="http://www.gmatonline.cn/question/stog8leetkey.html">PREP</a></li>
            <li><a href="http://www.gmatonline.cn/question/stog1leetkey.html">OG</a></li>
            <li><a href="http://www.toeflonline.cn/tpoExam.html">TPO</a></li>
            <li><a href="http://ielts.gmatonline.cn/">剑桥</a></li>
        </ul>
        <ul class="footer-list erm-3-wrap">
            <li><a href="javascript:void(0);">关注我们</a></li>
            <li>
                <a href="#"><div class="ft-icon"><img src="/cn/images/icon-wx.png" alt=""></div>：雷哥GMAT</a>
                <div class="erm-3"><img src="/cn/images/erm-6.jpg" alt=""></div>
            </li>
            <li>
                <a href="#"><div class="ft-icon"><img src="/cn/images/icon-wx.png" alt=""></div>：雷哥托福</a>
                <div class="erm-3"><img src="/cn/images/erm-7.jpg" alt=""></div>
            </li>
            <li>
                <a href="#"><div class="ft-icon"><img src="/cn/images/icon-wx.png" alt=""></div>：雷哥雅思</a>
                <div class="erm-3"><img src="/cn/images/erm-8.png" alt=""></div>
            </li>
            <li>
                <a href="#"><div class="ft-icon"><img src="/cn/images/icon-wx.png" alt=""></div>：雷哥留学</a>
                <div class="erm-3"><img src="/cn/images/erm-9.jpg" alt=""></div>
            </li>
        </ul>
        <div class="leige-tag inb">
            <div><img src="/cn/images/logo-2.png" alt=""></div>
            <div class="ft-tag">
                <span><em class="point"></em>优质教学</span>
                <span><em class="point"></em>海量题库</span>
                <span><em class="point"></em>全方位服务</span>
                <span><em class="point"></em>超值课程礼包</span>
            </div>
            <p class="ft-de">雷哥网  让你学的更好、效率更高、让你每天进步一点点</p>
        </div>
    </div>
    <div class="copyRight tm">
        ©2016 gmatonline.cn All Rights Reserved    京ICP备15001182号-1 京公网安备11010802017681
        <a href="http://www.gmatonline.cn/aboutUs/16.html#free_shengm">免责声明</a>
    </div>
</footer>
</body>
</html>