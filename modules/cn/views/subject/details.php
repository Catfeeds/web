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
    <link rel="stylesheet" href="/cn/css/subject-details.css">
    <link rel="stylesheet" href="/cn/css/font-awesome.min.css">
    <script src="/cn/js/jquery-1.12.2.min.js"></script>
    <script src="/cn/js/jquery.SuperSlide.2.1.1.js"></script>
    <script src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script>
    <script src="http://static.bshare.cn/b/bshareC0.js"></script>
    <title>课程详情</title>
</head>
<body>
<?php use app\commands\front\NavWidget; ?>
<?php NavWidget::begin(); ?>
<?php NavWidget::end(); ?>
<!--内容-->
<section>
    <div class="w12 clearfix">
        <!--第二种地址栏-->
        <div class="address_location">
            <a href="/">全部<i class="icon-angle-right"></i></a>
            <?php
                foreach($category as $v) {
                    ?>
                    <a href="/subject/<?php echo $v['id']?>.html"><?php echo $v['name']?><i class="icon-angle-right"></i></a>
                <?php
                }
            ?>
            <span class="location"><?php echo $data['name']?></span>
        </div>
        <!--课程信息-->
        <div class="subject_detail_wrap">
            <div class="int">
                <div class="sd_img">
                    <img src="<?php echo $data['image']?>" alt="">
                    <?php if(isset($data['url'])&&$data['url']) { ?>
                        <a href="#" class="try_listen">
                            <i class="icon-play try_listen_btn"></i>免费试听
                        </a>
                    <?php
                    }
                    ?>
                </div>
                <div class="collect">
                    <span class="sc">
                    <i class="icon-star-empty"></i>
                    收藏课程（2000）
                    </span>
                </div>
            </div>
            <div class="int subject_detail_info_wrap">
                <p class="ellipsis-2 sd_tit_name"><?php echo $data['name']?></p>
                <dl class="sd_info_wrap">
                    <dt><span class="sd_name">价<i class="inm kg"></i>格：</span><span class="new_price">￥<?php echo $data['name']?></span><span
                            class="old_price">￥<?php echo $data['sales']?></span></dt>
                    <?php
                        foreach($extend as $v) {
                            ?>
                            <dt><span class="sd_name"><?php echo $v['name']?>：</span><?php echo $data[$v['value']]?></dt>
                        <?php
                        }
                    ?>

                </dl>
                <div class="sd_check_bt">
                    <a onclick="toBuy(<?php echo $data['id']?>,<?php echo $type?>)" href="javascript:;">立即购买</a>
                    <a href="javascript:;">在线咨询</a>
                </div>
                <!--分享-->
                <div class="share_wrap clearfix">
                    <div class="view_data fl">
                        <i class="icon-eye-open view_eye"></i>
                        <span>共<i class="light"><?php echo $data['view']?></i>次浏览</span>
                    </div>
                    <div class="bshare-custom fr">
                        <a title="分享到微信" class="bshare-weixin"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a
                            title="分享到豆瓣" class="bshare-douban"></a><a title="分享到人人网" class="bshare-renren"></a><a
                            title="分享到腾讯微博" class="bshare-qqmb"></a><a title="更多平台"
                                                                       class="bshare-more bshare-more-icon more-style-addthis"></a>
                    </div>
                </div>
            </div>
        </div>
        <!--课程详情简介-->
        <div class="sub_info_wrap">
            <div class="sub-info-check">
                <span class="on">课程详情</span>
                <span>学员评价</span>
            </div>
            <div class="check_num-content">
                <div class="checked_item"><?php echo $data['description']?></div>
                <div class="checked_item bg_g">
                    <ul class="reply_list_wrap">
                        <?php
                        foreach(array_reverse($evaluate['data']) as $v) {
                            ?>
                            <li>
                                <div class="user_head inm"><img src="/cn/images/user_head.png" alt=""></div>
                                <div class="reply_data_wrap inm">
                                    <p class="nick_name">Tina小姐姐</p>
                                    <p class="reply_time">2017.05.12</p>
                                    <p class="reply_text">雷哥网的老师真的真的好热情啊，讲得特别好呢，要出国的小伙伴一定要来听雷哥的课程哦，对
                                        <br>你会非常有帮助的。</p>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                        <li>
                            <div class="user_head inm"><img src="/cn/images/user_head.png" alt=""></div>
                            <div class="reply_data_wrap inm">
                                <p class="nick_name">Tina小姐姐</p>
                                <p class="reply_time">2017.05.12</p>
                                <p class="reply_text">雷哥网的老师真的真的好热情啊，讲得特别好呢，要出国的小伙伴一定要来听雷哥的课程哦，对
                                    <br>你会非常有帮助的。</p>
                            </div>
                        </li>
                    </ul>
                    <!--分页-->
                    <div class="tr bg_g pageSize">
                        <ul class="pageSize">
                            <?php echo  $evaluate['pageStr'] ?>
                        </ul>
<!--                        <a href="#">上一页</a>-->
<!--                        <a href="#" class="on">1</a>-->
<!--                        <a href="#">2</a>-->
<!--                        <a href="#">...</a>-->
<!--                        <a href="#">下一页</a>-->
                    </div>
                    <!--输入框-->
                    <div class="reply_int_wrap bg_g">
                        <textarea id="reply_value" placeholder="在此处输入"></textarea>
                        <div class="tr">
                            <a href="javascript:;" class="tm reply_submit">提交</a>
                        </div>
                    </div>
                </div>
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
<script>
    $(function(){
        $('.sub-info-check span').click(function(){
            var obj=$(this).index();
            $('.checked_item').eq(obj).fadeIn().siblings('div.checked_item').hide();
        });
        $('.collect span.sc').click(function(){
            $(this).addClass('on');
           $(this).find("i").removeClass(' icon-star-empty').addClass(' icon-star');
        })
    })
</script>
</html>