<?php $userId = Yii::$app->session->get('uid'); ?>
<?php $userData = Yii::$app->session->get('userData')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="<?php echo isset($keywords)?$keywords:'' ?>">
    <meta name="description" content="<?php echo isset($description)?$description:'' ?>">
    <meta name="title" content="<?php echo isset($title)?$title:'' ?>">
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
    <link rel="stylesheet" href="/cn/css/main.css">
    <link rel="stylesheet" href="/cn/css/font-awesome.min.css">
    <script src="/cn/js/jquery-1.12.2.min.js"></script>
    <script src="/cn/js/jquery.SuperSlide.2.1.1.js"></script>
    <script src="/cn/js/index.js"></script>
    <title><?php echo isset($title)?$title:'' ?></title>
</head>
<body>
<?php use app\commands\front\NavWidget; ?>
<?php NavWidget::begin(); ?>
<?php NavWidget::end(); ?>
<!--首页内容-->
<section id="index_content" class="bg_g">
    <div class="w12 clearfix">
        <!--banner版块-->
        <div class="index_head_top clearfix">
            <!--左侧导航-->
            <div class="left_nav bg_f fl">
                <div class="left_nav_tit">课程分类</div>
                <ul class="nav3_list">
                    <?php
                        foreach($category as $v) {
                            ?>
                            <li>
                                <p class="nav3_tit"><?php echo $v['name']?></p>

                                <div class="nav3_link">
                                    <?php
                                        foreach($v['child'] as $k =>$val) {
                                            if($k>4){break;}
                                            ?>

                                            <a href="subject/<?php echo $val['id'] ?>.html"><?php echo $val['name']?></a>
                                        <?php
                                        }
                                    ?>
                                </div>
                                <?php
                                    if(count($v['child'])>0){
                                ?>
                                <div class="nav3right_wrap">
                                    <?php
                                        foreach($v['child'] as $val) {
                                            ?>
                                            <a href="subject/<?php echo $val['id'] ?>.html"><?php echo $val['name']?></a>
                                        <?php
                                        }
                                    ?>
                                </div>
                            <?php
                            }
                                ?>
                            </li>
                        <?php
                        }
                    ?>
                </ul>
            </div>
            <!--中间 banner-->
            <div class="slideBox fl">
                <ul class="hd clearfix"></ul>
                <ul class="banner">
                    <?php
                    foreach($banner as $v) {
                        ?>
                        <li><a href="<?php echo $v['url']; ?>"><img src="<?php echo $v['image']; ?>" alt=""></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <!--右侧&登录状态-->
            <div class="fr right_data bg_f">
                <!--首页登录状态-->
                <div class="index_noLogin">
                    <?php
                    if($userId) {
                        ?>
                        <div>
                            <div class="user_head2 inm"><img src="<?php echo $userData['image']?$userData['image']:'/cn/images/details_defaultImg.png'?>" alt=""></div>
                            <div class="inm welcome_hint">Hi，<span class="username_r"><?php echo $userData['nickname'] ?></span><br>欢迎来到雷哥网！</div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="clearfix login_check">
                            <a class="fl on" href="http://login.gmatonline.cn/cn/index?source=11&url=<?php echo Yii::$app->request->hostInfo.Yii::$app->request->getUrl()?>">登录</a>
                            <a class="fr" href="http://login.gmatonline.cn/cn/index/register?source=11&url=<?php echo Yii::$app->request->hostInfo.Yii::$app->request->getUrl()?>">注册</a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <!--促销活动-->
                <div class="right_item">
                    <div class="ritem_tit"><span>|</span>促销活动</div>
                    <ul class="cx_list">
                        <?php
                        foreach($hot as $v) {
                            ?>
                            <li><i class="icon_circle"></i><a href="<?php echo $v['url']; ?>"><?php echo $v['name']; ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <!--免费领取课程-->
                <div class="right_item">
                    <div class="ritem_tit"><span>|</span>免费领取课程</div>
                    <div class="user_int_wrap">
                        <div class="row_int">
                            <div class="int_k">
                                <div class="int_icon"><img src="/cn/images/int_icon_1.png" alt=""></div>
                                <input type="text" placeholder="填写你的姓名" id="name">
                            </div>
                        </div>
                        <div class="row_int">
                            <div class="int_k">
                                <div class="int_icon"><img src="/cn/images/int_icon_2.png" alt=""></div>
                                <input type="text" placeholder="填写你的手机号码" id="phone">
                            </div>
                        </div>
                        <div class="row_int clearfix">
                            <div class="int_k code_int fl">
                                <div class="int_icon"><img src="/cn/images/int_icon_3.png" alt=""></div>
                                <input type="text" placeholder="填写验证码" id="code">
                            </div>
                            <input class="code_btn fr" type="button"  onclick="sendYzm(this)" value="发送验证码">
                        </div>
                        <button class="form_submit"  onclick="subInformation()">免费领取课程</button>
                    </div>

                </div>
            </div>
        </div>
        <!--老师答疑-->
        <div class="fourClass">
            <a href="javascript:void(0);" class="prev">
                <img src="/cn/images/home-left.png" alt="left"/>
            </a>
            <a href="javascript:void(0);" class="next">
                <img src="/cn/images/home-right.png" alt="right"/>
            </a>
            <div class="fourBd">
                <ul class="help_live clearfix">
                    <?php
                    foreach(array_reverse($openClass) as $key=>$v ) {
//                        if ($key < 4) {
                            ?>
                            <li>
                                <div class="live_time ani">时间：<?php echo date('Y-m-d', $v['cnName']) ?></div>
                                <p class="help_live_tit"><a class="ellipsis" target="_blank" href="http://open.viplgw.cn/public-class/<?php echo $v['id'] ?>.html"><?php echo $v['name'] ?></a></p>
                                <div class="b_line tm"><img src="/cn/images/b_line.png" alt=""></div>
                                <div class="tm">
                                    <div class="user_head3 inm"><img src="<?php echo isset($v['article']) ? 'http://open.viplgw.cn'.$v['article'] : '/cn/images/user_head2.png' ?>" alt=""></div>
                                    <div class="inm tl P_info" style="width: 120px">
                                        <p class="ellipsis">主讲人：<?php echo $v['listeningFile'] ?></p>
                                        <p class="ellipsis">课<i class="inm tp_zw"></i>时：<?php echo $v['problemComplement'] ?></p>
                                        <p class="price">￥：<?php echo isset($v['price']) ? $v['price'] : '0' ?></p>
                                        <?php
                                        if ($v['duration']) {
                                            ?>
                                            <a class="inm playback_btn" target="_blank" href="http://open.viplgw.cn/public-class/back/<?php echo $v['id'] ?>.html">观看回放</a>
                                            <?php
                                        } else {
                                            ?>
                                            <a class="inm playback_btn" target="_blank" href="http://open.viplgw.cn/public-class/<?php echo $v['id'] ?>.html">详情</a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <?php
//                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!--课程分类&直播课程-->
        <div class="bg_f sort_wrap">
            <div class="subject_sort_tit_wrap clearfix">
                <div class="fl left_sort_tit">
                    <div class="sort_icon_wrap inm"><img src="/cn/images/sort_icon_1.png" alt=""></div>
                    <span class="inm sort_name">直播课程</span>
                    <img src="/cn/images/sort_icon_1b.png" alt="">
                </div>
                <div class="fr right_sort_more">
                    <a class="sort_more" target="_blank" href="/subject/188.html">查看更多></a>
                </div>
            </div>
            <ul class="live_course_list clearfix">
                <?php
                foreach($recording as $key=>$v) {
                    if ($key == 0) {
                        ?>
                        <li>
                            <div class="ani live_user_check">
                                <div class="relative rh100">
                                    <div class="user_handle_wrap">
                                        <a class="big_try_btn" href="<?php echo $v['url'] ?>" target="_blank">
                                            <div class="playIcon_img inm"><img src="/cn/images/piay_icon.png" alt="">
                                            </div>
                                            <span class="inm">点击试听</span>
                                        </a>
                                        <div class="live_user_handle clearfix">
                                            <a class="fl" href="javascript:;" onclick="toBuy(<?php echo $v['id'] ?>,1)">购买</a>
                                            <a class="fr" target="_blank" href="/goods/<?php echo $v['id'] ?>/1.html">详情</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="live_time2 ani">
                                时间：<?php echo $v['openingDate']; ?></div>
                            <div class="cr1_img"><img src="/cn/images/1cr_1.png" alt=""></div>
                            <div class="live_course_info">
                                <div class="live_course_name_wrap">
                                    <p class="live_course_name"><?php echo $v['name'] ?></p>
                                    <p class="live_course_ks">课时：<?php echo $v['courseDuration'] ?></p>
                                </div>
                                <div>
                                    <div class="inb">
                                        <span class="index_new_price">￥<?php echo $v['price'] ?></span>
                                        <span class="index_old_price">￥<?php echo $v['sales'] ?></span>
                                    </div>
                                    <a class="small_try_btn inb" href="<?php echo $v['url'] ?>" target="_blank">试听</a>
                                </div>

                            </div>
                        </li>
                        <?php
                    }
                    if ($key == 1) { ?>
                        <li>
                            <div class="ani live_user_check">
                                <div class="relative rh100">
                                    <div class="user_handle_wrap">
                                        <a class="big_try_btn" href="<?php echo $v['url'] ?>" target="_blank">
                                            <div class="playIcon_img inm"><img src="/cn/images/piay_icon.png" alt=""></div>
                                            <span class="inm">点击试听</span>
                                        </a>
                                        <div class="live_user_handle clearfix">
                                            <a class="fl" href="javascript:;" onclick="toBuy(<?php echo $v['id'] ?>,1)">购买</a>
                                            <a class="fr" target="_blank" href="/goods/<?php echo $v['id'] ?>/1.html">详情</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="live_time2 ani">
                                时间：<?php echo $v['openingDate']; ?></div>
                            <div class="cr1_img"><img src="/cn/images/1cr_2.png" alt=""></div>
                            <div class="live_course_info">
                                <div class="live_course_name_wrap">
                                    <p class="live_course_name"><?php echo $v['name'] ?></p>
                                    <p class="live_course_ks">课时：<?php echo $v['courseDuration'] ?></p>
                                </div>
                                <div>
                                    <div class="inb">
                                        <span class="index_new_price">￥<?php echo $v['price'] ?></span>
                                        <span class="index_old_price">￥<?php echo $v['sales'] ?></span>
                                    </div>
                                    <a class="small_try_btn inb" href="<?php echo $v['url'] ?>" target="_blank">试听</a>
                                </div>

                            </div>
                        </li>
                        <?php
                    }if($key == 2) {
                        ?>
                        <li>
                            <div class="ani live_user_check">
                                <div class="relative rh100">
                                    <div class="user_handle_wrap">
                                        <a class="big_try_btn" href="<?php echo $v['url'] ?>" target="_blank">
                                            <div class="playIcon_img inm"><img src="/cn/images/piay_icon.png" alt=""></div>
                                            <span class="inm">点击试听</span>
                                        </a>
                                        <div class="live_user_handle clearfix">
                                            <a class="fl" href="javascript:;" onclick="toBuy(<?php echo $v['id'] ?>,1)">购买</a>
                                            <a class="fr" target="_blank" href="/goods/<?php echo $v['id'] ?>/1.html">详情</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="live_time2 ani">
                                时间：<?php echo $v['openingDate']; ?></div>
                            <div class="live_course_info">
                                <div class="live_course_name_wrap">
                                    <p class="live_course_name"><?php echo $v['name'] ?></p>
                                    <p class="live_course_ks">课时：<?php echo $v['courseDuration'] ?></p>
                                </div>
                                <div>
                                    <div class="inb">
                                        <span class="index_new_price">￥<?php echo $v['price'] ?></span>
                                        <span class="index_old_price">￥<?php echo $v['sales'] ?></span>
                                    </div>
                                    <a class="small_try_btn inb" href="<?php echo $v['url'] ?>" target="_blank">试听</a>
                                </div>

                            </div>
                            <div class="cr1_img"><img src="/cn/images/1cr_3.png" alt=""></div>
                        </li>
                        <?php
                    }
                    if($key == 3){ ?>
                        <li>
                            <div class="ani live_user_check">
                                <div class="relative rh100">
                                    <div class="user_handle_wrap">
                                        <a class="big_try_btn" href="<?php echo $v['url'] ?>" target="_blank">
                                            <div class="playIcon_img inm"><img src="/cn/images/piay_icon.png" alt=""></div>
                                            <span class="inm">点击试听</span>
                                        </a>
                                        <div class="live_user_handle clearfix">
                                            <a class="fl" href="javascript:;" onclick="toBuy(<?php echo $v['id'] ?>,1)">购买</a>
                                            <a class="fr" target="_blank" href="/goods/<?php echo $v['id'] ?>/1.html">详情</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="live_time2 ani">时间：<?php echo $v['openingDate']; ?></div>
                            <div class="cr1_img"><img src="/cn/images/1cr_4.png" alt=""></div>
                            <div class="live_course_info">
                                <div class="live_course_name_wrap">
                                    <p class="live_course_name"><?php echo $v['name'] ?></p>
                                    <p class="live_course_ks">课时：<?php echo $v['courseDuration'] ?></p>
                                </div>
                                <div>
                                    <div class="inb">
                                        <span class="index_new_price">￥<?php echo $v['price'] ?></span>
                                        <span class="index_old_price">￥<?php echo $v['sales'] ?></span>
                                    </div>
                                    <a class="small_try_btn inb" href="<?php echo $v['url'] ?>" target="_blank">试听</a>
                                </div>

                            </div>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
        <!--课程分类&回放课程-->
        <div class="bg_f sort_wrap">
            <div class="subject_sort_tit_wrap clearfix">
                <div class="fl left_sort_tit">
                    <div class="sort_icon_wrap inm"><img src="/cn/images/sort_icon_2.png" alt=""></div>
                    <span class="inm sort_name">回放课程</span>
                    <img src="/cn/images/sort_icon_2b.png" alt="">
                </div>
                <div class="fr right_sort_more">
                    <a class="sort_more" target="_blank" href="/subject/190.html">查看更多></a>
                </div>
            </div>
            <div class="playback_course_list clearfix">
                <div class="pb_left fl">
                    <?php
                    foreach($playback as $k=>$v) {
                        if($k==0) {
                            ?>
                            <div class="pb_list_item">
                                <div class="ani pb_check">
                                    <div class="rh100 relative">
                                        <div class="pb_handle-wrap">
                                            <a href="<?php echo $v['url'] ?>" target="_blank" class="pb_big_btn bg_g2">
                                                <div class="pb_icon inm"><img src="/cn/images/pb_icon_1.png" alt=""></div>
                                                <span class="inm">回放课程</span>
                                            </a>
                                            <a href="/goods/<?php echo $v['id'] ?>/1.html" target="_blank" class="pb_big_btn bg_f2">
                                                <div class="pb_icon inm"><img src="/cn/images/pb_icon_2.png" alt=""></div>
                                                <span class="inm">查看详情</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <p class="pb_name"><?php echo $v['name'] ?></p>
                                <div class="pb_btn_wrap">
                                    <a class="small_try_btn pb_btn inb" href="<?php echo $v['url'] ?>">回放</a>
                                    <a class="small_try_btn inb" href="/goods/<?php echo $v['id'] ?>/1.html">详情</a>
                                </div>
                                <div class="2cr_img cr2_1 ani"><img src="/cn/images/2cr_1.png" alt=""></div>
                            </div>
                            <?php
                        }if ($k==1) { ?>
                            <div class="pb_list_item">
                                <div class="ani pb_check">
                                    <div class="rh100 relative">
                                        <div class="pb_handle-wrap">
                                            <a href="<?php echo $v['url'] ?>" class="pb_big_btn bg_g2">
                                                <div class="pb_icon inm"><img src="/cn/images/pb_icon_1.png" alt=""></div>
                                                <span class="inm">回放课程</span>
                                            </a>
                                            <a href="/goods/<?php echo $v['id'] ?>/1.html" class="pb_big_btn bg_f2">
                                                <div class="pb_icon inm"><img src="/cn/images/pb_icon_2.png" alt=""></div>
                                                <span class="inm">查看详情</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <p class="pb_name"><?php echo $v['name'] ?></p>
                                <div class="pb_btn_wrap tr">
                                    <a class="small_try_btn pb_btn inb" href="<?php echo $v['url'] ?>">回放</a>
                                    <a class="small_try_btn inb" href="/goods/<?php echo $v['id'] ?>/1.html">详情</a>
                                </div>
                                <div class="2cr_img cr2_2 ani"><img src="/cn/images/2cr_2.png" alt=""></div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="pb_middle fl">
                    <?php
                    foreach($playback as $k=>$v) {
                        if ($k == 2) {
                            ?>
                            <div class="pb_list_item">
                                <div class="ani pb_check">
                                    <div class="rh100 relative">
                                        <div class="pb_handle-wrap">
                                            <a href="<?php echo $v['url'] ?>" target="_blank" class="pb_big_btn bg_g2">
                                                <div class="pb_icon inm"><img src="/cn/images/pb_icon_1.png" alt="">
                                                </div>
                                                <span class="inm">回放课程</span>
                                            </a>
                                            <a href="/goods/<?php echo $v['id'] ?>/1.html" target="_blank" class="pb_big_btn bg_f2">
                                                <div class="pb_icon inm"><img src="/cn/images/pb_icon_2.png" alt="">
                                                </div>
                                                <span class="inm">查看详情</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <p class="pb_name"><?php echo $v['name'] ?></p>
                                <div class="pb_btn_wrap tl">
                                    <a class="small_try_btn pb_btn inb" href="<?php echo $v['url'] ?>">回放</a>
                                    <a class="small_try_btn inb" href="/goods/<?php echo $v['id'] ?>/1.html">详情</a>
                                </div>
                                <div class="2cr_img cr2_3 ani"><img src="/cn/images/2cr_5.png" alt=""></div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="pb_fight fl">
                    <?php
                    foreach($playback as $k=>$v) {
                        if ($k == 3) {
                            ?>
                            <div class="pb_list_item">
                                <div class="ani pb_check">
                                    <div class="rh100 relative">
                                        <div class="pb_handle-wrap">
                                            <a href="<?php echo $v['url'] ?>" target="_blank" class="pb_big_btn bg_g2">
                                                <div class="pb_icon inm"><img src="/cn/images/pb_icon_1.png" alt="">
                                                </div>
                                                <span class="inm">回放课程</span>
                                            </a>
                                            <a href="/goods/<?php echo $v['id'] ?>/1.html" target="_blank" class="pb_big_btn bg_f2">
                                                <div class="pb_icon inm"><img src="/cn/images/pb_icon_2.png" alt="">
                                                </div>
                                                <span class="inm">查看详情</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <p class="pb_name"><?php echo $v['name'] ?></p>
                                <div class="pb_btn_wrap">
                                    <a class="small_try_btn pb_btn inb" href="<?php echo $v['url'] ?>">回放</a>
                                    <a class="small_try_btn inb" href="/goods/<?php echo $v['id'] ?>/1.html">详情</a>
                                </div>
                                <div class="2cr_img cr2_1 ani"><img src="/cn/images/2cr_3.png" alt=""></div>
                            </div>
                            <?php
                        }if($k == 4){ ?>
                            <div class="pb_list_item">
                                <div class="ani pb_check">
                                    <div class="rh100 relative">
                                        <div class="pb_handle-wrap">
                                            <a href="<?php echo $v['url'] ?>" class="pb_big_btn bg_g2">
                                                <div class="pb_icon inm"><img src="/cn/images/pb_icon_1.png" alt=""></div>
                                                <span class="inm">回放课程</span>
                                            </a>
                                            <a href="/goods/<?php echo $v['id'] ?>/1.html" class="pb_big_btn bg_f2">
                                                <div class="pb_icon inm"><img src="/cn/images/pb_icon_2.png" alt=""></div>
                                                <span class="inm">查看详情</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <p class="pb_name"><?php echo $v['name'] ?></p>
                                <div class="pb_btn_wrap tr">
                                    <a class="small_try_btn pb_btn inb" href="<?php echo $v['url'] ?>">回放</a>
                                    <a class="small_try_btn inb" href="/goods/<?php echo $v['id'] ?>/1.html">详情</a>
                                </div>
                                <div class="2cr_img cr2_2 ani"><img src="/cn/images/2cr_4.png" alt=""></div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--雷哥网留学-->
        <div class="bg_f sort_wrap">
            <div class="subject_sort_tit_wrap clearfix">
                <div class="fl left_sort_tit">
                    <div class="sort_icon_wrap inm"><img src="/cn/images/sort_icon_6.png" alt=""></div>
                    <span class="inm sort_name">雷哥网留学</span>
                </div>
                <div class="fr right_sort_more">
                    <a class="sort_more" target="_blank" href="/subject/194.html">查看更多></a>
                </div>
            </div>
            <div class="smartList clearfix">
                <?php
                foreach($lgwLiuxue as $key=>$v) {
                    if ($key == 0) {
                        ?>
                        <div class="smartItem_1 fl smartItem">
                            <div class="wrap_info">
                                <a href="/goods/<?php echo $v['id'] ?>/2.html" target="_blank" class="common_cr_name"><?php echo $v['name'] ?></a>
                                <div class="gmat_price_wrap">
                                    <span class="index_new_price">￥<?php echo $v['price'] ?></span>
                                    <span class="index_old_price">￥<?php echo $v['sales'] ?></span>
                                </div>
                                <a class="small_try_btn inb" href="<?php echo $v['url'] ?>" target="_blank">试听</a>
                            </div>
                            <div class="smartImg"><img
                                    src="<?php echo isset($v['iamge']) ? $v['iamge'] : '/cn/images/6cr_1.png' ?>"
                                    alt=""></div>
                        </div>
                    <?php
                    }
                }
                ?>
                <div class="sr_wrap fl">
                    <?php
                    foreach($lgwLiuxue as $key=>$v) {
                        if ($key == 1) {
                            ?>
                            <div class="smartItem_2 smartItem">
                                <div class="wrap_info">
                                    <a target="_blank" href="/goods/<?php echo $v['id'] ?>/2.html" class="common_cr_name"><?php echo $v['name'] ?></a>
                                    <div class="gmat_price_wrap">
                                        <span class="index_new_price">￥<?php echo $v['price'] ?></span>
                                        <span class="index_old_price">￥<?php echo $v['sales'] ?></span>
                                    </div>
                                    <a class="small_try_btn inb" href="<?php echo $v['url'] ?>" target="_blank">试听</a>
                                </div>
                                <div class="smartImg"><img
                                        src="<?php echo isset($v['iamge']) ? $v['iamge'] : '/cn/images/6cr_2.png' ?>"
                                        alt=""></div>
                            </div>
                        <?php
                        }
                    }
                    ?>
                    <div class="sbtm_wrap clearfix">
                        <?php
                        foreach($lgwLiuxue as $key=>$v) {
                            if ($key == 2) {
                                ?>
                                <div class="smartItem_3 fl smartItem">
                                    <div class="wrap_info">
                                        <a target="_blank" href="/goods/<?php echo $v['id'] ?>/2.html" class="common_cr_name"><?php echo $v['name'] ?></a>
                                        <div class="gmat_price_wrap">
                                            <span class="index_new_price">￥<?php echo $v['price'] ?></span>
                                            <span class="index_old_price">￥<?php echo $v['sales'] ?></span>
                                        </div>
                                        <a class="small_try_btn inb" href="<?php echo $v['url'] ?>" target="_blank">试听</a>
                                    </div>
                                    <div class="smartImg"><img
                                            src="<?php echo isset($v['iamge']) ? $v['iamge'] : '/cn/images/6cr_3.png' ?>"
                                            alt=""></div>
                                </div>
                            <?php
                            }
                            if ($key == 3) {
                                ?>
                                <div class="smartItem_3 fr smartItem">
                                    <div class="wrap_info">
                                        <a target="_blank" href="/goods/<?php echo $v['id'] ?>/2.html" class="common_cr_name"><?php echo $v['name'] ?></a>
                                        <div class="gmat_price_wrap">
                                            <span class="index_new_price">￥<?php echo $v['price'] ?></span>
                                            <span class="index_old_price">￥<?php echo $v['sales'] ?></span>
                                        </div>
                                        <a class="small_try_btn inb" href="<?php echo $v['url'] ?>" target="_blank">试听</a>
                                    </div>
                                    <div class="smartImg"><img
                                            src="<?php echo isset($v['iamge']) ? $v['iamge'] : '/cn/images/6cr_4.png' ?>"
                                            alt=""></div>
                                </div>
                            <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
        <!--雷哥网GMAT-->
        <div class="bg_f sort_wrap">
            <div class="subject_sort_tit_wrap clearfix">
                <div class="fl left_sort_tit">
                    <div class="sort_icon_wrap inm"><img src="/cn/images/sort_icon_3.png" alt=""></div>
                    <span class="inm sort_name">雷哥网GMAT</span>
                </div>
                <div class="fr right_sort_more">
                    <a class="sort_more" target="_blank" href="/subject/193.html">查看更多></a>
                </div>
            </div>
            <ul class="gmat_course_list clearfix">
                <?php
                foreach($lgwGmat as $key=>$v) {
                    ?>
                    <li>
                        <a href="/goods/<?php echo $v['id'] ?>/1.html" target="_blank" class="gmat_cr_name"><?php echo $v['name'] ?></a>
                        <div class="gmat_price_wrap">
                            <span class="index_new_price">￥<?php echo $v['price'] ?></span>
                            <span class="index_old_price">￥<?php echo $v['sales'] ?></span>
                        </div>
                        <a class="small_try_btn inb" href="<?php echo $v['url'] ?>" target="_blank">试听</a>
                        <div class="cr3_img"><img src="/cn/images/3cr_<?php echo $key+1; ?>.png" alt=""></div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <!--课程分类&SAT课程-->
        <div class="bg_f sort_wrap">
            <div class="subject_sort_tit_wrap clearfix">
                <div class="fl left_sort_tit">
                    <div class="sort_icon_wrap inm"><img src="/cn/images/sort_icon_1.png" alt=""></div>
                    <span class="inm sort_name">雷哥网SAT</span>
                </div>
                <div class="fr right_sort_more">
                    <a class="sort_more" target="_blank" href="/subject/188.html">查看更多></a>
                </div>
            </div>
            <ul class="live_course_list clearfix anne-sat">
                <?php
                foreach($recording as $key=>$v) {
                    if ($key == 0) {
                        ?>
                        <li>
                            <div class="ani live_user_check">
                                <div class="relative rh100">
                                    <div class="user_handle_wrap">
                                        <a class="big_try_btn" href="<?php echo $v['url'] ?>" target="_blank">
                                            <div class="playIcon_img inm"><img src="/cn/images/piay_icon.png" alt="">
                                            </div>
                                            <span class="inm">点击试听</span>
                                        </a>
                                        <div class="live_user_handle clearfix">
                                            <a class="fl" href="javascript:;" onclick="toBuy(<?php echo $v['id'] ?>,1)">购买</a>
                                            <a class="fr" target="_blank" href="/goods/<?php echo $v['id'] ?>/1.html">详情</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="live_time2 ani">
                                时间：<?php echo $v['openingDate']; ?></div>
                            <div class="cr1_img"><img src="/cn/images/sat-a.jpg" alt=""></div>
                            <div class="live_course_info">
                                <div class="live_course_name_wrap">
                                    <p class="live_course_name"><?php echo $v['name'] ?></p>
                                    <p class="live_course_ks">课时：<?php echo $v['courseDuration'] ?></p>
                                </div>
                                <div>
                                    <div class="inb">
                                        <span class="index_new_price">￥<?php echo $v['price'] ?></span>
                                        <span class="index_old_price">￥<?php echo $v['sales'] ?></span>
                                    </div>
                                    <a class="small_try_btn inb" href="<?php echo $v['url'] ?>" target="_blank">试听</a>
                                </div>

                            </div>
                        </li>
                        <?php
                    }
                    if ($key == 1) { ?>
                        <li>
                            <div class="ani live_user_check">
                                <div class="relative rh100">
                                    <div class="user_handle_wrap">
                                        <a class="big_try_btn" href="<?php echo $v['url'] ?>" target="_blank">
                                            <div class="playIcon_img inm"><img src="/cn/images/piay_icon.png" alt=""></div>
                                            <span class="inm">点击试听</span>
                                        </a>
                                        <div class="live_user_handle clearfix">
                                            <a class="fl" href="javascript:;" onclick="toBuy(<?php echo $v['id'] ?>,1)">购买</a>
                                            <a class="fr" target="_blank" href="/goods/<?php echo $v['id'] ?>/1.html">详情</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="live_time2 ani">
                                时间：<?php echo $v['openingDate']; ?></div>
                            <div class="cr1_img"><img src="/cn/images/sat-b.jpg" alt=""></div>
                            <div class="live_course_info">
                                <div class="live_course_name_wrap">
                                    <p class="live_course_name"><?php echo $v['name'] ?></p>
                                    <p class="live_course_ks">课时：<?php echo $v['courseDuration'] ?></p>
                                </div>
                                <div>
                                    <div class="inb">
                                        <span class="index_new_price">￥<?php echo $v['price'] ?></span>
                                        <span class="index_old_price">￥<?php echo $v['sales'] ?></span>
                                    </div>
                                    <a class="small_try_btn inb" href="<?php echo $v['url'] ?>" target="_blank">试听</a>
                                </div>

                            </div>
                        </li>
                        <?php
                    }if($key == 2) {
                        ?>
                        <li>
                            <div class="ani live_user_check">
                                <div class="relative rh100">
                                    <div class="user_handle_wrap">
                                        <a class="big_try_btn" href="<?php echo $v['url'] ?>" target="_blank">
                                            <div class="playIcon_img inm"><img src="/cn/images/piay_icon.png" alt=""></div>
                                            <span class="inm">点击试听</span>
                                        </a>
                                        <div class="live_user_handle clearfix">
                                            <a class="fl" href="javascript:;" onclick="toBuy(<?php echo $v['id'] ?>,1)">购买</a>
                                            <a class="fr" target="_blank" href="/goods/<?php echo $v['id'] ?>/1.html">详情</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="live_time2 ani">
                                时间：<?php echo $v['openingDate']; ?></div>
                            <div class="live_course_info">
                                <div class="live_course_name_wrap">
                                    <p class="live_course_name"><?php echo $v['name'] ?></p>
                                    <p class="live_course_ks">课时：<?php echo $v['courseDuration'] ?></p>
                                </div>
                                <div>
                                    <div class="inb">
                                        <span class="index_new_price">￥<?php echo $v['price'] ?></span>
                                        <span class="index_old_price">￥<?php echo $v['sales'] ?></span>
                                    </div>
                                    <a class="small_try_btn inb" href="<?php echo $v['url'] ?>" target="_blank">试听</a>
                                </div>

                            </div>
                            <div class="cr1_img"><img src="/cn/images/sat-c.jpg" alt=""></div>
                        </li>
                        <?php
                    }
                    if($key == 3){ ?>
                        <li>
                            <div class="ani live_user_check">
                                <div class="relative rh100">
                                    <div class="user_handle_wrap">
                                        <a class="big_try_btn" href="<?php echo $v['url'] ?>" target="_blank">
                                            <div class="playIcon_img inm"><img src="/cn/images/piay_icon.png" alt=""></div>
                                            <span class="inm">点击试听</span>
                                        </a>
                                        <div class="live_user_handle clearfix">
                                            <a class="fl" href="javascript:;" onclick="toBuy(<?php echo $v['id'] ?>,1)">购买</a>
                                            <a class="fr" target="_blank" href="/goods/<?php echo $v['id'] ?>/1.html">详情</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="live_time2 ani">时间：<?php echo $v['openingDate']; ?></div>
                            <div class="cr1_img"><img src="/cn/images/sat-d.jpg" alt=""></div>
                            <div class="live_course_info">
                                <div class="live_course_name_wrap">
                                    <p class="live_course_name"><?php echo $v['name'] ?></p>
                                    <p class="live_course_ks">课时：<?php echo $v['courseDuration'] ?></p>
                                </div>
                                <div>
                                    <div class="inb">
                                        <span class="index_new_price">￥<?php echo $v['price'] ?></span>
                                        <span class="index_old_price">￥<?php echo $v['sales'] ?></span>
                                    </div>
                                    <a class="small_try_btn inb" href="<?php echo $v['url'] ?>" target="_blank">试听</a>
                                </div>

                            </div>
                        </li>
                        <?php
                    }
                }
                ?>
                <li>
                    <div class="ani live_user_check">
                        <div class="relative rh100">
                            <div class="user_handle_wrap">
                                <a class="big_try_btn" href="<?php echo $v['url'] ?>" target="_blank">
                                    <div class="playIcon_img inm"><img src="/cn/images/piay_icon.png" alt=""></div>
                                    <span class="inm">点击试听</span>
                                </a>
                                <div class="live_user_handle clearfix">
                                    <a class="fl" href="javascript:;" onclick="toBuy(<?php echo $v['id'] ?>,1)">购买</a>
                                    <a class="fr" target="_blank" href="/goods/<?php echo $v['id'] ?>/1.html">详情</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="live_time2 ani">时间：<?php echo $v['openingDate']; ?></div>
                    <div class="cr1_img"><img src="/cn/images/sat-e.jpg" alt=""></div>
                    <div class="live_course_info">
                        <div class="live_course_name_wrap">
                            <p class="live_course_name"><?php echo $v['name'] ?></p>
                            <p class="live_course_ks">课时：<?php echo $v['courseDuration'] ?></p>
                        </div>
                        <div>
                            <div class="inb">
                                <span class="index_new_price">￥<?php echo $v['price'] ?></span>
                                <span class="index_old_price">￥<?php echo $v['sales'] ?></span>
                            </div>
                            <a class="small_try_btn inb" href="<?php echo $v['url'] ?>" target="_blank">试听</a>
                        </div>

                    </div>
                </li>
            </ul>
        </div>
        <!--雷哥网托福-->
        <div class="bg_f sort_wrap">
            <div class="subject_sort_tit_wrap clearfix">
                <div class="fl left_sort_tit">
                    <div class="sort_icon_wrap inm"><img src="/cn/images/sort_icon_4.png" alt=""></div>
                    <span class="inm sort_name">雷哥网托福</span>
                </div>
                <div class="fr right_sort_more">
                    <a class="sort_more" target="_blank" href="/subject/192.html">查看更多></a>
                </div>
            </div>
            <ul class="teofl_course_list clearfix">
                <?php
                foreach($lgwToefl as $key=>$v) {
                    ?>
                    <li>
                        <div class="wrap_info">
                            <a href="/goods/<?php echo $v['id'] ?>/1.html" target="_blank" class="common_cr_name"><?php echo $v['name'] ?></a>
                            <div class="gmat_price_wrap">
                                <span class="index_new_price">￥<?php echo $v['price'] ?></span>
                                <span class="index_old_price">￥<?php echo $v['sales'] ?></span>
                            </div>
                            <a class="small_try_btn inb" href="<?php echo $v['url'] ?>" target="_blank">试听</a>
                        </div>
                        <div class="cr4_img"><img src="/cn/images/4cr_<?php echo $key+1 ?>.png" alt=""></div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <!--雷哥网雅思-->
        <div class="bg_f sort_wrap">
            <div class="subject_sort_tit_wrap clearfix">
                <div class="fl left_sort_tit">
                    <div class="sort_icon_wrap inm"><img src="/cn/images/sort_icon_5.png" alt=""></div>
                    <span class="inm sort_name">雷哥网雅思</span>
                </div>
                <div class="fr right_sort_more">
                    <a class="sort_more" target="_blank" href="/subject/209.html">查看更多></a>
                </div>
            </div>
            <ul class="teofl_course_list yasi_list clearfix">
                <?php
                foreach($lgwIelts as $key=>$v) {
                    ?>
                    <li>
                        <div class="wrap_info">
                            <a target="_blank" href="/goods/<?php echo $v['id'] ?>/1.html" class="common_cr_name"><?php echo $v['name'] ?></a>
                            <div class="gmat_price_wrap">
                                <span class="index_new_price">￥<?php echo $v['price'] ?></span>
                                <span class="index_old_price">￥<?php echo $v['sales'] ?></span>
                            </div>
                            <a class="small_try_btn inb" href="<?php echo $v['url'] ?>" target="_blank">试听</a>
                        </div>
                        <div class="cr4_img"><img src="/cn/images/5cr_<?php echo $key+1; ?>.png" alt=""></div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>

        <!--雷哥网英语-->
<!--        <div class="bg_f sort_wrap">-->
<!--            <div class="subject_sort_tit_wrap clearfix">-->
<!--                <div class="fl left_sort_tit">-->
<!--                    <div class="sort_icon_wrap inm"><img src="/cn/images/sort_icon_7.png" alt=""></div>-->
<!--                    <span class="inm sort_name">雷哥网英语</span>-->
<!--                </div>-->
<!--                <div class="fr right_sort_more">-->
<!--                    <a class="sort_more" target="_blank" href="/subject/196.html">查看更多></a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <ul class="lgyList clearfix">-->
<!--                --><?php
//                foreach($lgwEnglish as $key=>$v) {
//                    ?>
<!--                    <li>-->
<!--                        <div class="wrap_info">-->
<!--                            <a target="_blank" href="#" class="common_cr_name">--><?php //echo $v['name'] ?><!--</a>-->
<!--                            <div class="gmat_price_wrap">-->
<!--                                <span class="index_new_price">￥--><?php //echo $v['price'] ?><!--</span>-->
<!--                                <span class="index_old_price">￥--><?php //echo $v['sales'] ?><!--</span>-->
<!--                            </div>-->
<!--                            <a class="small_try_btn inb" href="--><?php //echo $v['url'] ?><!--">试听</a>-->
<!--                        </div>-->
<!--                        <div class="lgyImg"><img src="/cn/images/7cr_--><?php //echo $key+1;?><!--.png" alt=""></div>-->
<!--                    </li>-->
<!--                    --><?php
//                }
//                ?>
<!--            </ul>-->
<!---->
<!---->
<!--        </div>-->
        <!--雷哥网书籍-->
        <div class="bg_f sort_wrap">
            <div class="subject_sort_tit_wrap clearfix">
                <div class="fl left_sort_tit">
                    <div class="sort_icon_wrap inm"><img src="/cn/images/sort_icon_8.png" alt=""></div>
                    <span class="inm sort_name">雷哥网书籍</span>
                </div>
                <div class="fr right_sort_more">
                    <a class="sort_more" target="_blank" href="/subject/198.html">查看更多></a>
                </div>
            </div>
            <div class="picMarquee-left relative">
                <div class="bd">
                    <ul>
                        <?php
                        foreach($lgwBook as $v) {
                            ?>
                            <li>
                                <a href="/goods/<?php echo $v['id']?>/4.html" target="_blank" title="<?php echo $v['name'] ?>"><img src="<?php echo isset($v['image'])?$v['image']:'/cn/images/books.png' ?>" alt=""></a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <a class="next npBtn ani"><i class="icon-caret-right"></i></a>
                <a class="prev npBtn ani"><i class="icon-caret-left"></i></a>
            </div>
        </div>
        <!--雷哥网会员课程-->
        <div class="bg_f sort_wrap">
            <div class="subject_sort_tit_wrap clearfix">
                <div class="fl left_sort_tit">
                    <div class="sort_icon_wrap inm"><img src="/cn/images/sort_icon_9.png" alt=""></div>
                    <span class="inm sort_name">雷哥网会员课程</span>
                </div>
                <div class="fr right_sort_more">
                    <a class="sort_more" target="_blank" href="/subject/200.html">查看更多></a>
                </div>
            </div>
            <div class="vipCourse_list clearfix">
            <?php
            foreach($lgwVip as $k=>$v) {
                if ($k == 0) {
                    ?>
                    <div class="vipCourse_item_1 fl vc_im">
                        <div class="vcImg"><img src="/cn/images/9cr_1.png" alt=""></div>
                        <div class="wrap_info">
                            <a target="_blank" href="/goods/<?php echo $v['id'] ?>/5.html" class="common_cr_name"><?php echo $v['name'] ?></a>
                            <div class="gmat_price_wrap">
                                <div class="inb pr_wrap">
                                    <span class="index_new_price">￥<?php echo $v['price'] ?></span>
                                    <span class="index_old_price">￥<?php echo $v['sales'] ?></span>
                                </div>
                                <a class="small_try_btn inb" href="<?php echo $v['url'] ?>" target="_blank">购买</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
                <ul class="vip_middle_md fl">
                    <?php
                    foreach($lgwVip as $k=>$v) {
                        if ($k == 1) {
                            ?>
                            <li>
                                <div class="wrap_info">
                                    <a target="_blank" href="/goods/<?php echo $v['id'] ?>/5.html" class="common_cr_name"><?php echo $v['name'] ?></a>
                                    <div class="gmat_price_wrap">
                                        <div class="inb pr_wrap">
                                            <span class="index_new_price">￥<?php echo $v['price'] ?></span>
                                            <span class="index_old_price">￥<?php echo $v['sales'] ?></span>
                                        </div>
                                        <a class="small_try_btn inb" href="<?php echo $v['url'] ?>" target="_blank">购买</a>
                                    </div>
                                </div>
                                <div class="vcImg"><img src="/cn/images/9cr_2.png" alt=""></div>
                            </li>
                            <?php
                        }
                        if ($k == 2) {
                            ?>
                            <li>
                                <div class="wrap_info">
                                    <a href="/goods/<?php echo $v['id'] ?>/5.html" class="common_cr_name"><?php echo $v['name'] ?></a>
                                    <div class="gmat_price_wrap">
                                        <div class="inb pr_wrap">
                                            <span class="index_new_price">￥<?php echo $v['price'] ?></span>
                                            <span class="index_old_price">￥<?php echo $v['sales'] ?></span>
                                        </div>
                                        <a class="small_try_btn inb" href="<?php echo $v['url'] ?>" target="_blank">购买</a>
                                    </div>
                                </div>
                                <div class="vcImg"><img src="/cn/images/9cr_3.png" alt=""></div>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
                <?php
                foreach($lgwVip as $k=>$v) {
                    if ($k == 3) {
                        ?>
                        <div class="vipCourse_item_1 fl vc_im">
                            <div class="vcImg"><img src="/cn/images/9cr_4.png" alt=""></div>
                            <div class="wrap_info">
                                <a href="/goods/<?php echo $v['id'] ?>/5.html" class="common_cr_name"><?php echo $v['name'] ?></a>
                                <div class="gmat_price_wrap">
                                    <div class="inb pr_wrap">
                                        <span class="index_new_price">￥<?php echo $v['price'] ?></span>
                                        <span class="index_old_price">￥<?php echo $v['sales'] ?></span>
                                    </div>
                                    <a class="small_try_btn inb" href="<?php echo $v['url'] ?>" target="_blank">购买</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!--footer-->
<?php use app\commands\front\FooterWidget; ?>
<?php FooterWidget::begin(); ?>
<?php FooterWidget::end(); ?>
</body>
<script>
    $(function () {
        //        banner 轮播
        jQuery(".slideBox").slide({
            mainCell: ".banner",
            titCell: ".hd",
            effect: "left",
            autoPlay: true,
            autoPage: "<li></li>"
        });
        jQuery(".picMarquee-left").slide({
            mainCell: ".bd ul",
            autoPlay: true,
            effect: "leftMarquee",
            vis: 6,
            interTime: 50
        });
    })
</script>
</html>