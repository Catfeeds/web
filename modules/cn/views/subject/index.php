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
<!--顶部导航栏-->
<section id="nav_wrap">
    <div class="w12 clearfix">　　
        <ul class="nav_list fl clearfix">
            <li>
                <a href="#">雷哥网网校<img src="images/crow_1.png" style="margin-left: 7px" alt=""></a>
                <dl class="nav2_list">
                    <dt><a href="#">雷哥网留学</a></dt>
                    <dt><a href="#">雷哥网GMAT</a></dt>
                    <dt><a href="#">雷哥网托福</a></dt>
                    <dt><a href="#">雷哥网雅思</a></dt>
                </dl>
            </li>
            <li><a href="#">首页</a></li>
            <li><a href="#">学习工具</a></li>
            <li><a href="#">会员</a></li>
            <li><a href="#">学习小组</a></li>
            <li><a href="#">活动</a></li>
            <li><a href="#">八卦社区</a></li>
            <li class="shop_car">
                <div class="shoppingIcon inm relative">
                    <img src="images/shopping_icon.png" alt="">
                    <span class="shop_msg ani">1</span>
                </div>
                <a href="#">购物车</a>
            </li>
        </ul>
        <!--未登录-->
        <div class="noLogin fr">
            <a href="#">登录</a>
            <span class="fg_line inm"></span>
            <a href="#">注册</a>
        </div>
        <!--已登录-->
        <div class="yesLogin fr">
            <div class="common_user_head inm"><img src="images/common_head.png" alt=""></div>
            <span class="header_username inm">Tina2017</span>
        </div>
    </div>
</section>
<!--搜索栏-->
<section id="search_wrap" class="bg_f">
    <div class="w12">
        <div class="clearfix">
            <div class="leige_logo fl">
                <a href="/">
                    <img src="images/logo.png" alt="">
                </a>
            </div>
            <div class="search_wrap fl">
                <span class="search_name inm">选课中心</span>
                <div class="inm sint_wrap">
                    <input class="search_int inm" type="search">
                    <a class="search_btn inm tm" href="javascript:;">搜索</a>
                </div>
            </div>
            <div class="fr search_ermList">
                <div class="int sint_el">
                    <div class="erm_k">
                        <a href="#"><img src="images/erm_1.png" alt=""></a>
                    </div>
                    <p class="erm_de">雷哥GMATAPP</p>
                </div>
                <div class="int sint_el">
                    <div class="erm_k"><img src="images/erm_2.png" alt=""></div>
                    <p class="erm_de">雷哥托福APP</p>
                </div>
            </div>
        </div>
    </div>
</section>
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
                                        <li <?php echo isset($val['checked'])&&$val['checked']==1?'class="on"':''?>><?php echo $val['name']?></li>
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
                <div class="subject_img inm"><img src="images/subject_icon.png" alt=""></div>
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
                <div class="subject_img inm"><img src="images/subject_icon.png" alt=""></div>
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
                    <li>
                        <div class="subject_img2 inm"><a href="#"><img src="images/sub_img.png" alt=""></a></div>
                        <div class="subject_data inb">
                            <h1 class="subject_name ellipsis"><a href="#">2017年GMAT在线强化全程课程</a></h1>
                            <dl class="subject_data_wrap">
                                <dt>
                                    <span class="sbj_name">价<i class="kg inm"></i>格：</span>
                                    <span class="new_price">￥6800</span><span class="old_price">￥1200</span>
                                </dt>
                                <dt><span class="sbj_name">课程时长：</span>60课时</dt>
                                <dt><span class="sbj_name">开课日期：</span>4月23日-6月30日</dt>
                            </dl>
                        </div>
                        <div class="subject_btn inb">
                            <a href="#">免费试听</a>
                            <a href="#">查看详情</a>
                        </div>
                    </li>
                    <li>
                        <div class="subject_img2 inm"><a href="#"><img src="images/sub_img.png" alt=""></a></div>
                        <div class="subject_data inb">
                            <h1 class="subject_name ellipsis"><a href="#">2017年GMAT在线强化全程课程</a></h1>
                            <dl class="subject_data_wrap">
                                <dt>
                                    <span class="sbj_name">价<i class="kg inm"></i>格：</span>
                                    <span class="new_price">￥6800</span><span class="old_price">￥1200</span>
                                </dt>
                                <dt><span class="sbj_name">课程时长：</span>60课时</dt>
                                <dt><span class="sbj_name">开课日期：</span>4月23日-6月30日</dt>
                            </dl>
                        </div>
                        <div class="subject_btn inb">
                            <a href="#">免费试听</a>
                            <a href="#">查看详情</a>
                        </div>
                    </li>
                    <li>
                        <div class="subject_img2 inm"><a href="#"><img src="images/sub_img.png" alt=""></a></div>
                        <div class="subject_data inb">
                            <h1 class="subject_name ellipsis"><a href="#">2017年GMAT在线强化全程课程</a></h1>
                            <dl class="subject_data_wrap">
                                <dt>
                                    <span class="sbj_name">价<i class="kg inm"></i>格：</span>
                                    <span class="new_price">￥6800</span><span class="old_price">￥1200</span>
                                </dt>
                                <dt><span class="sbj_name">课程时长：</span>60课时</dt>
                                <dt><span class="sbj_name">开课日期：</span>4月23日-6月30日</dt>
                            </dl>
                        </div>
                        <div class="subject_btn inb">
                            <a href="#">免费试听</a>
                            <a href="#">查看详情</a>
                        </div>
                    </li>
                    <li>
                        <div class="subject_img2 inm"><a href="#"><img src="images/sub_img.png" alt=""></a></div>
                        <div class="subject_data inb">
                            <h1 class="subject_name ellipsis"><a href="#">2017年GMAT在线强化全程课程</a></h1>
                            <dl class="subject_data_wrap">
                                <dt>
                                    <span class="sbj_name">价<i class="kg inm"></i>格：</span>
                                    <span class="new_price">￥6800</span><span class="old_price">￥1200</span>
                                </dt>
                                <dt><span class="sbj_name">课程时长：</span>60课时</dt>
                                <dt><span class="sbj_name">开课日期：</span>4月23日-6月30日</dt>
                            </dl>
                        </div>
                        <div class="subject_btn inb">
                            <a href="#">免费试听</a>
                            <a href="#">查看详情</a>
                        </div>
                    </li>
                    <li>
                        <div class="subject_img2 inm"><a href="#"><img src="images/sub_img.png" alt=""></a></div>
                        <div class="subject_data inb">
                            <h1 class="subject_name ellipsis"><a href="#">2017年GMAT在线强化全程课程</a></h1>
                            <dl class="subject_data_wrap">
                                <dt>
                                    <span class="sbj_name">价<i class="kg inm"></i>格：</span>
                                    <span class="new_price">￥6800</span><span class="old_price">￥1200</span>
                                </dt>
                                <dt><span class="sbj_name">课程时长：</span>60课时</dt>
                                <dt><span class="sbj_name">开课日期：</span>4月23日-6月30日</dt>
                            </dl>
                        </div>
                        <div class="subject_btn inb">
                            <a href="#">免费试听</a>
                            <a href="#">查看详情</a>
                        </div>
                    </li>
                    <li>
                        <div class="subject_img2 inm"><a href="#"><img src="images/sub_img.png" alt=""></a></div>
                        <div class="subject_data inb">
                            <h1 class="subject_name ellipsis"><a href="#">2017年GMAT在线强化全程课程</a></h1>
                            <dl class="subject_data_wrap">
                                <dt>
                                    <span class="sbj_name">价<i class="kg inm"></i>格：</span>
                                    <span class="new_price">￥6800</span><span class="old_price">￥1200</span>
                                </dt>
                                <dt><span class="sbj_name">课程时长：</span>60课时</dt>
                                <dt><span class="sbj_name">开课日期：</span>4月23日-6月30日</dt>
                            </dl>
                        </div>
                        <div class="subject_btn inb">
                            <a href="#">免费试听</a>
                            <a href="#">查看详情</a>
                        </div>
                    </li>
                </ul>
                <!--分页-->
                <div class="tr pageSize">
                    <a href="#">上一页</a>
                    <a href="#" class="on">1</a>
                    <a href="#">2</a>
                    <a href="#">...</a>
                    <a href="#">下一页</a>
                </div>
            </div>
            <div class="right_ad fr">
                <div class="bg_f recommend_like_wrap">
                    <div class="rad_tit_wrap">
                        <img src="images/heart_1.png" alt="">
                        <span class="inm">猜你喜欢</span>
                    </div>
                    <ul class="like_list">
                        <li>
                            <div class="recommend_like_img int"><a href="#"><img src="images/r_img.png" alt=""></a></div>
                            <dl class="int like_data">
                                <dt class="like_name ellipsis"><a href="#">GMAT周末班一对一</a></dt>
                                <dt><span class="like_new_price">￥400</span> <span class="like_old_price">￥700</span></dt>
                                <dt><a class="like_btn" href="#">试听</a></dt>
                            </dl>
                        </li>
                        <li>
                            <div class="recommend_like_img int"><a href="#"><img src="images/r_img.png" alt=""></a></div>
                            <dl class="int like_data">
                                <dt class="like_name ellipsis"><a href="#">GMAT周末班一对一</a></dt>
                                <dt><span class="like_new_price">￥400</span> <span class="like_old_price">￥700</span></dt>
                                <dt><a class="like_btn" href="#">试听</a></dt>
                            </dl>
                        </li>
                        <li>
                            <div class="recommend_like_img int"><a href="#"><img src="images/r_img.png" alt=""></a></div>
                            <dl class="int like_data">
                                <dt class="like_name ellipsis"><a href="#">GMAT周末班一对一</a></dt>
                                <dt><span class="like_new_price">￥400</span> <span class="like_old_price">￥700</span></dt>
                                <dt><a class="like_btn" href="#">试听</a></dt>
                            </dl>
                        </li>
                        <li>
                            <div class="recommend_like_img int"><a href="#"><img src="images/r_img.png" alt=""></a></div>
                            <dl class="int like_data">
                                <dt class="like_name ellipsis"><a href="#">GMAT周末班一对一</a></dt>
                                <dt><span class="like_new_price">￥400</span> <span class="like_old_price">￥700</span></dt>
                                <dt><a class="like_btn" href="#">试听</a></dt>
                            </dl>
                        </li>
                        <li>
                            <div class="recommend_like_img int"><a href="#"><img src="images/r_img.png" alt=""></a></div>
                            <dl class="int like_data">
                                <dt class="like_name ellipsis"><a href="#">GMAT周末班一对一</a></dt>
                                <dt><span class="like_new_price">￥400</span> <span class="like_old_price">￥700</span></dt>
                                <dt><a class="like_btn" href="#">试听</a></dt>
                            </dl>
                        </li>
                        <li>
                            <div class="recommend_like_img int"><a href="#"><img src="images/r_img.png" alt=""></a></div>
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
                    <li><a href="#"><img src="images/ad_1.png" alt=""></a></li>
                    <li><a href="#"><img src="images/ad_2.png" alt=""></a></li>
                    <li><a href="#"><img src="images/ad_3.png" alt=""></a></li>
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
                <a href="#"><div class="ft-icon"><img src="images/icon-wx.png" alt=""></div>：雷哥GMAT</a>
                <div class="erm-3"><img src="images/erm-6.jpg" alt=""></div>
            </li>
            <li>
                <a href="#"><div class="ft-icon"><img src="images/icon-wx.png" alt=""></div>：雷哥托福</a>
                <div class="erm-3"><img src="images/erm-7.jpg" alt=""></div>
            </li>
            <li>
                <a href="#"><div class="ft-icon"><img src="images/icon-wx.png" alt=""></div>：雷哥雅思</a>
                <div class="erm-3"><img src="images/erm-8.png" alt=""></div>
            </li>
            <li>
                <a href="#"><div class="ft-icon"><img src="images/icon-wx.png" alt=""></div>：雷哥留学</a>
                <div class="erm-3"><img src="images/erm-9.jpg" alt=""></div>
            </li>
        </ul>
        <div class="leige-tag inb">
            <div><img src="images/logo-2.png" alt=""></div>
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