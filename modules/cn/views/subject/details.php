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
            foreach ($category as $v) {
                ?>
                <a href="/subject/<?php echo $v['id'] ?>.html"><?php echo $v['name'] ?><i class="icon-angle-right"></i></a>
                <?php
            }
            ?>
            <span class="location"><?php echo $data['name'] ?></span>
        </div>
        <!--课程信息-->
        <div class="subject_detail_wrap">
            <div class="int">
                <div class="sd_img">
                    <img src="<?php echo $data['image'] ?>" alt="">
                    <?php if (isset($data['url']) && $data['url']) { ?>
                        <a href="<?php echo $data['url']?>" class="try_listen">
                            <i class="icon-play try_listen_btn"></i>免费试听
                        </a>
                        <?php
                    }
                    ?>
                </div>
                <div class="collect">
                    <span class="sc <?php if ($collection == 1) {
                        echo 'on';
                    } ?>">
                    <i class="<?php if ($collection == 1) {
                        echo 'icon-star';
                    } else {
                        echo 'icon-star-empty';
                    } ?>"></i>
                    收藏课程（2000）
                    </span>
                </div>
            </div>
            <div class="int subject_detail_info_wrap">
                <p class="ellipsis-2 sd_tit_name"
                   data-samrtid="<?php echo $_GET['id'] ?>"><?php echo $data['name'] ?></p>
                <dl class="sd_info_wrap">
                    <dt><span class="sd_name">价<i class="inm kg"></i>格：</span><span
                            class="new_price">￥<?php echo $data['price'] ?></span><span
                            class="old_price">￥<?php echo $data['sales'] ?></span></dt>
                    <?php
                    foreach ($extend as $v) {
                        ?>
                        <dt><span class="sd_name"><?php echo $v['name'] ?>：</span><?php echo $data[$v['value']] ?></dt>
                        <?php
                    }
                    ?>

                </dl>
                <div class="sd_check_bt">
                    <a onclick="toBuy(<?php echo $data['id'] ?>,<?php echo $type ?>)" href="javascript:;">立即购买</a>
                    <a href="javascript:;">在线咨询</a>
                </div>
                <!--分享-->
                <div class="share_wrap clearfix">
                    <div class="view_data fl">
                        <i class="icon-eye-open view_eye"></i>
                        <span>共<i class="light"><?php echo $data['view'] ?></i>次浏览</span>
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
                <div class="checked_item"><?php echo $data['description'] ?></div>
                <div class="checked_item bg_g">
                    <ul class="reply_list_wrap">
                        <?php
                        foreach (array_reverse($evaluate['data']) as $v) {
                            ?>
                            <li>
                                <div class="user_head inm"><img src="/cn/images/user_head.png" alt=""></div>
                                <div class="reply_data_wrap inm">
                                    <p class="nick_name"><?php echo $v['username'] ?></p>
                                    <p class="reply_time"><?php echo date('Y-m-d',$v['createTime']) ?></p>
                                    <p class="reply_text"><?php echo $v['value'] ?></p>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <!--分页-->
                    <div class="tr bg_g pageSize">
                        <ul class="pageSize">
                            <?php echo $evaluate['pageStr'] ?>
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
<?php use app\commands\front\FooterWidget; ?>
<?php FooterWidget::begin(); ?>
<?php FooterWidget::end(); ?>
</body>
<script>
    $(function () {
        $('.sub-info-check span').click(function () {
            var obj = $(this).index();
            $(this).addClass('on').siblings("span").removeClass('on');
            $('.checked_item').eq(obj).fadeIn().siblings('div.checked_item').hide();
        });
        $('.collect span.sc').click(function () {
            $.post('/cn/api/add-collect', {contentId: <?php echo $_GET['id'] ?>, catType: <?php echo $_GET['type'] ?>}, function (re) {
                alert(re.message);
                if (re.code == 1) {
                    $('.collect span.sc').addClass('on');
                    $('.collect span.sc').find("i").removeClass(' icon-star-empty').addClass(' icon-star');
                }

            }, "json")
        });
//        提交评价
        $('.reply_submit').click(function () {
            var _val = $("#reply_value").val();
            $.post('/cn/api/user-evaluate', {smartId: <?php echo $_GET['id'] ?>, content: _val}, function (data) {
                alert(data.message);
                if (data.code == 0) {

                }
                if(data.code==1){
                    var str='<li>'+
                        '<div class="user_head inm"><img src="/cn/images/user_head.png" alt=""></div>'+
                        '<div class="reply_data_wrap inm">'+
                        '<p class="nick_name">'+data.data.username+'</p>'+
                        '<p class="reply_time">2017-06-07</p>'+
                        '<p class="reply_text">'+data.data.value+'</p>'+
                        '</div>'+
                        '</li>';
                    $('.reply_list_wrap').append(str);
                }
            },"json")
        });
    })
</script>
</html>