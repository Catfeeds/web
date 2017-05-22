<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>鲜花快递,鲜花速递,网上鲜花,鲜花店送花,中国专业的鲜花快递服务商,中国鲜花快递网</title>
    <meta name="description"
          content="中国鲜花快递网是中国专业的鲜花快递公司，专注全国送花服务，提供网上鲜花快递、鲜花店送花服务。包括：生日鲜花，节日鲜花，商务鲜花，婚庆鲜花等，订购鲜花电话：400-756-9980">
    <meta name="keywords" content="鲜花快递,网上鲜花,生日鲜花,送花,鲜花店">
    <link href="/cn/css/base.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/cn/js/hm.js"></script>
    <script type="text/javascript" src="/cn/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $(".subnav ul li").each(function(){
                $(this).find("strong").css({
                    "height":$(this).find(".right-sort").height(),
                    "lineHeight":$(this).find(".right-sort").height()+"px"
                });
            })
        })
    </script>
</head>
<body>
<?php use app\commands\front\NavWidget;?>
<?php NavWidget::begin();?>
<?php NavWidget::end();?>
<!-- header end-->
<div id="container_wrap">
    <div id="container">
        <div class="local">您的位置：<a href="/">花间意鲜花网</a><em>&gt;</em><a href="#">按花材订花</a><em>&gt;</em>玫瑰</div>
        <div class="subnav">
            <ul>
                <?php
                    foreach($category as $v) {
                        ?>
                        <li>
                            <strong><?php echo $v['name']?>：</strong>

                            <div class="right-sort">
                                <?php
                                    foreach($v['child'] as $val) {
                                        ?>
                                        <a href="/cn/flower-list/index?catId=<?php echo $val['id']?>"><?php echo $val['name']?></a>
                                    <?php
                                    }
               ?>
                            </div>
                            <div class="clearfloat"></div>
                        </li>
                    <?php
                    }
                ?>
            </ul>
        </div>
        <?php
            $catId = isset($_GET['catId'])?$_GET['catId']:'';
            $price = isset($_GET['price'])?$_GET['price']:'';
            $time = isset($_GET['time'])?$_GET['time']:'';
        ?>
        <div class="paixu">
            <p>排序方式：
                <a href="#">热销</a>
                <a href="#">价格</a>
                <a href="#" class="on">最新上架</a>
            </p>
            <div class="page-nav">共<strong><?php echo $count?></strong>件商品　<?php echo $page?>/<?php echo $totalPage?>　
                <?php if($page == 1){echo '<b class="page-prev" title="上一页">&lt;</b>';}else{echo '<a class="page-prev"
                                                            href="/cn/flower-list/index?page='.($page-1).'&price='.$price.'&time='.$time.'&catId='.$catId.'"
                                                            title="上一页">&lt;</a>';} ?><?php if($page == $totalPage){echo '<b class="page-next" title="下一页">&gt;</b>';}else{echo '<a class="page-next"
                                                            href="/cn/flower-list/index?page='.($page+1).'&price='.$price.'&time='.$time.'&catId='.$catId.'"
                                                            title="上一页">&gt;</a>';} ?>
            </div>
        </div>
        <div class="mainprobox">
            <ul>
                <?php
                    foreach($data as $v) {
                        ?>
                        <li>
                            <div class="pic"><a href="#" target="_blank"><img
                                        src="<?php echo $v['defaultImage']?>"></a></div>
                            <div class="protitle"><a href="#" target="_blank"><?php echo $v['name']?></a>
                            </div>
                            <div class="yishou">已售：<span>9831</span>束</div>
                            <div class="price">￥<?php echo $v['price']?></div>
                            <span class="Tag_tj"></span>
                        </li>
                    <?php
                    }
                ?>
            </ul>
            <div class="clearfloat"></div>
        </div>
        <div class="pagebar">
            <div class="pages">
<?php echo $pageStr?>
            </div>
        </div>
<script type="text/javascript">
    $('.iPage').click(function(){
        var page = $(this).html();
        location.href = "/cn/flower-list/index?page="+page+"&catId=<?php echo $catId?>&time=<?php echo $time?>&price=<?php echo $price?>";
    })
    $('.next').click(function(){
        var page = $('.pages').find('b').html();
        page = parseInt(page);
        location.href = "/cn/flower-list/index?page="+(page+1)+"&catId=<?php echo $catId?>&time=<?php echo $time?>&price=<?php echo $price?>";
    })
    $('.prev').click(function(){
        var page = $('.pages').find('b').html();
        page = parseInt(page);
        location.href = "/cn/flower-list/index?page="+(page-1)+"&catId=<?php echo $catId?>&time=<?php echo $time?>&price=<?php echo $price?>";
    })
</script>
    </div>
</div>
<div id="footer">
    <div class="bottom_trust"></div>
    <div class="bottom_help">
        <div class="list">
            <strong>客户服务</strong>
            <ul>
                <li><a href="#" target="_blank">关于我们</a></li>
                <li><a href="#" target="_blank">VIP会员</a></li>
                <li><a href="#" target="_blank">隐私条款</a></li>
                <li><a href="#" target="_blank">安全条款</a></li>
                <li><a href="#" target="_blank">服务声明</a></li>
            </ul>
        </div>
        <div class="list">
            <strong>购物指南</strong>
            <ul>
                <li><a href="#" target="_blank">购物须知</a></li>
                <li><a href="#" target="_blank">购物流程</a></li>
                <li><a href="#" target="_blank">常见问题</a></li>
                <li><a href="#" target="_blank">联系我们</a></li>
                <li><a href="#" target="_blank">送花礼仪</a></li>
            </ul>
        </div>
        <div class="list">
            <strong>支付方式</strong>
            <ul>
                <li><a href="#" target="_blank">快捷支付</a></li>
                <li><a href="#" target="_blank">在线支付</a></li>
                <li><a href="#" target="_blank">货到付款</a></li>
                <li><a href="#" target="_blank">在线补款</a></li>
            </ul>
        </div>
        <div class="list">
            <strong>配送方式</strong>
            <ul>
                <li><a href="#" target="_blank">配送说明</a></li>
                <li><a href="#" target="_blank">定时配送</a></li>
                <li><a href="#" target="_blank">发票说明</a></li>
                <li><a href="#" target="_blank">配送范围及费用</a></li>

            </ul>
        </div>
        <div class="list">
            <strong>售后服务</strong>
            <ul>
                <li><a href="#" target="_blank">关于投诉</a></li>
                <li><a href="#" target="_blank">订单查询</a></li>
                <li><a href="#" target="_blank">订单修改</a></li>
                <li><a href="#" target="_blank">订单取消</a></li>
                <li><a href="#" target="_blank">品质标准</a></li>
            </ul>
        </div>
        <div class="qrcode" id="site_qrcode">
            <img src="images/qrcode_360flower.png" width="86" height="86">
            <div>微信订花更快捷</div>
        </div>
        <div class="service">
            <div class="kefu">客服电话</div>
            <div class="tel400" id="site_tel400">400-XXX-XXX</div>
            <div class="msg">周一至周日 8:30-18:00</div>
            <div class="online"><a href="#" target="_blank">在线客服</a></div>
        </div>
    </div>
</div>
<div class="bottom_last">
    <a href="#" target="_blank"><img src="images/pay_alipay1.gif"  border="0"></a>
    <a href="#" target="_blank"><img src="images/pay_yeepay.gif"  border="0"></a>
    <a href="#" target="_blank"><img src="images/pay_paypal1.gif"  border="0"></a>
    <img src="images/f_icp.gif"  border="0">
    <img src="images/trust_star.gif" alt="网站信用"  border="0">
    <img src="images/footer-icon01.gif" alt="icon"  border="0">
    <img src="images/footer-icon02.gif" alt="icon"  border="0">
    <img src="images/footer-icon03.png" alt="icon"  border="0">
    <p>Copyright© 2005-2017 花间意电子商务有限公司 版权所有，并保留所有权利。 www.521huadian.com All rights reserved</p>
</div>
<div id="backtop"></div>
<script type="text/javascript" src="/cn/js/zxkf.js"></script>

</body>
</html>