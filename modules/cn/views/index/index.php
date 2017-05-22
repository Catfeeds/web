<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>中国鲜花快递网-鲜花速递|网上订花送花|网上花店鲜花预定|鲜花配送|专注于全国鲜花速递服务</title>
    <meta name="description"
          content="中国鲜花快递网是国内最早提供全国鲜花快递服务的公司之一，专注于全国鲜花速递服务，鲜花网提供网上订花送花、鲜花预定服务，鲜花配送范围覆盖全国各大中城市，市区最快2-3小时送达，国内领先的鲜花速递服务商。">
    <meta name="keywords" content="鲜花速递,网上订花,送花,网上花店,鲜花预定,鲜花配送">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link href="/cn/css/base.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/cn/js/hm.js"></script>
    <script type="text/javascript" src="/cn/js/banner.js"></script>
    <script type="text/javascript" src="/cn/js/jquery-1.4.2.min.js"></script>
</head>
<body>
<div id="top_banner">
    <div class="ads">
        <a href="<?php echo $stick['url']?>" target="_blank"><img src="<?php echo $stick['image']?>"  width="1180" height="80"></a>
        <a onclick="document.getElementById('top_banner').style.display='none'" class="close-btn" href="javascript:void(0);" title="关闭"></a>
    </div>
</div>
<?php use app\commands\front\NavWidget;?>
<?php NavWidget::begin();?>
<?php NavWidget::end();?>
    <div class="menu">
        <ul>
            <?php
                foreach($category as $k => $v) {
            ?>
            <li>
                <div class="menu-left">
                    <img src="<?php echo $v['image']?>" alt="图标"/>

                    <p><?php echo $v['name']?></p>
                </div>
                <div class="menu-right padd01">
                    <ul>
                        <?php
                            foreach($v['child'] as $val) {
                                ?>
                                <li><a href="#"><?php echo $val['name']?></a></li>
                            <?php
                            }
                        ?>
                    </ul>
                    <?php
                    if ($k == 0) {
                        ?>
                        <div class="menu-r-sort">
                            <ul>
                                <?php
                                    $data = \app\modules\cn\models\Category::find()->where("pid = 0 AND type =1")->all();
                                ?>
                                <?php
                                    foreach($data as $val) {
                                        ?>
                                        <li>
                                            <label><?php echo $val['name']?></label>

                                            <div class="m-r-sli">
                                                <?php
                                                $child = \app\modules\cn\models\Category::find()->where("pid = {$val['id']}")->all();
                                                ?>
                                                <ul>
                                                    <?php
                                                    foreach($child as $value) {
                                                        ?>
                                                        <li><a href="#"><?php echo $value['name']?></a></li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                            <div class="clearfloat"></div>
                                        </li>
                                    <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    <?php
                    }
                            ?>
                        </div>
                        <div class="clearfloat"></div>
                    </li>
                <?php
                }
            ?>
            <li>
                <div class="last-sort">
                    <ul>
                        <?php
                            foreach($especially as $v){
                        ?>
                        <li><a href="<?php echo $v['url']?>"><img src="<?php echo $v['image']?>" alt="图标"/><?php echo $v['name']?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
                        <?php
                        $lianjie = "";
                        $imgarr = "";
                            foreach($banner as $v){
                                $lianjie .= $v['url'].',';
                                $imgarr .= $v['image'].',';
                            }
                        ?>
    <div class="menu_mid" data-value="<?php echo $lianjie?>" data-image="<?php echo $imgarr?>">
        <div class="banner">
            <div id="lunbox">
                <!--<ul class="imgList">-->
                <!--<li style="opacity: 0; display: none;"><a target="_blank"-->
                <!--href="/jieri/valentine.html"-->
                <!--title="情人节鲜花" onfocus="this.blur();"><img border="0"-->
                <!--style="cursor:pointer;outline:0;"-->
                <!--src="/cn/images/ad_valentine.jpg"></a>-->
                <!--</li>-->
                <!--<li style="opacity: 0; display: none;"><a target="_blank" href="/flower/"-->
                <!--title="鲜花速递" onfocus="this.blur();"><img border="0"-->
                <!--style="cursor:pointer;outline:0;"-->
                <!--src="/cn/images/ad_01.jpg"></a>-->
                <!--</li>-->
                <!--<li style="opacity: 1;"><a target="_blank" href="/birthday/" title="生日送花"-->
                <!--onfocus="this.blur();"><img border="0" style="cursor:pointer;outline:0;"-->
                <!--src="/cn/images/ad_birthday.jpg"></a></li>-->
                <!--</ul>-->
                <!--<ul class="countNum">-->
                <!--<li class="">1</li>-->
                <!--<li class="">2</li>-->
                <!--<li class="current">3</li>-->
                <!--</ul>-->
            </div>
            <script>lunboxaaa();</script>
        </div>
    </div>
    <div class="menu_right">
        <div class="cuxiao">
            <a href="#" target="_blank">
                <img src="/cn/images/index-guanzhu.png"/>
            </a>
            <div class="why-choose">
                <h4>为何选择花间意？</h4>
                <ul>
                    <li>1、12年品牌花店，口碑相传，专业的服务、售后团队。</li>
                    <li>2、连锁花店，全国3000多座城市，2万+家分店，配送范围覆盖全国。</li>
                    <li>3、空运昆明顶级花材，花材提前预订，当天包扎，质量有保障。</li>
                    <li>4、旗下签约花艺师均从业3年以上，产品够强势。</li>
                    <li>5、30多家媒体报导，实力有见证！</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfloat"></div>

</div>
<div id="container_wrap">
    <div id="container">
        <div class="remai_content">
            <ul>
                <li>
                    <img src="/cn/images/index-xianshi.png" alt="限时推荐"/>
                </li>
                <?php foreach($recommend as $k => $v) { ?>
                    <li>
                        <div class="propic">
                            <a href="#" target="_blank">
                                <img src="<?php echo $v['defaultImage']?>">
                            </a>
                        </div>
                        <div class="protit">
                            <a href="#" target="_blank"><?php echo $v['name']?></a>
                        </div>
                        <div class="yishou">已售：<span><?php echo $v['sales']?></span>束</div>
                        <div class="proprice">￥<?php echo $v['price']?></div>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <?php
            foreach($head as $v) {
                ?>
                <?php
                    if($v['type'] == 2) {
                        ?>
                        <div class="shengri_title">
                            <h1><a href="javascript:;"  title="<?php echo $v['name']?>"><?php echo $v['name']?></a></h1>

                            <div class="more">
                                <?php
                                    foreach($v['category'] as $val) {
                                        ?>
                                        <a href="#" target="_blank"><?php echo $val['name']?></a><em>|</em>
                                    <?php
                                    }
                                        ?>
                                <a href="#" target="_blank">更多&gt;&gt;</a>
                            </div>
                        </div>
                        <div class="shengri_content">
                            <div class="bottom_pic">
                                <ul>
                                    <?php
                                        foreach($v['flower'] as $val) {
                                            ?>
                                            <li>
                                                <div class="propic">
                                                    <a href="/flower/HJY<?php echo $val['goodsNumber']?>.html" target="_blank">
                                                        <img src="<?php echo $val['defaultImage']?>" title="flower"/>
                                                    </a>
                                                </div>
                                                <div class="protit">
                                                    <a href="#" target="_blank"><?php echo $val['flowerDes']?></a>
                                                </div>
                                                <div class="yishou">已售：<span><?php echo $val['sales']?></span>束</div>
                                                <div class="proprice">￥<?php echo $val['price']?></div>
                                            </li>
                                        <?php
                                        }
                                            ?>
                                </ul>
                            </div>
                        </div>
                    <?php
                    }
                        ?>
                <?php
                    if($v['type'] == 1) {
                        ?>
                        <div class="shengri_title">
                            <h1><a href="javascript:;"  title="<?php echo $v['name']?>"><?php echo $v['name']?></a></h1>

                            <div class="more">
                                <?php
                                foreach($v['category'] as $val) {
                                    ?>
                                    <a href="#" target="_blank"><?php echo $val['name']?></a><em>|</em>
                                <?php
                                }
                                ?>
                                <a href="#" target="_blank">更多&gt;&gt;</a>
                            </div>
                        </div>
                        <div class="shengri_content">
                            <div class="top_pic">
                                <ul>
                                    <?php
                                    $left = unserialize($v['left']);
                                    ?>
                                    <li class="first">
                                        <a href="<?php echo $left['url']?>" target="_blank">
                                            <img src="<?php echo $left['image']?>" width="295" height="260">
                                        </a>
                                    </li>
                                    <?php
                                    $middleImage = unserialize($v['middle']);
                                    ?>
                                    <li class="mid">
                                        <a href="<?php echo $middleImage['url']?>" target="_blank">
                                            <img src="<?php echo $middleImage['image']?>" width="586" height="260">
                                        </a>
                                    </li>
                                    <?php
                                    $right = unserialize($v['right']);
                                    ?>
                                    <li class="last">
                                        <a href="<?php echo $right['url']?>" target="_blank">
                                            <img src="<?php echo $middleImage['image']?>" width="295" height="260">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="bottom_pic">
                                <ul>
                                    <?php
                                    foreach($v['flower'] as $val) {
                                        ?>
                                        <li>
                                            <div class="propic"><a href="#" target="_blank"><img
                                                        src="<?php echo $val['defaultImage']?>"></a></div>
                                            <div class="protit"><a href="#"
                                                                   target="_blank"><?php echo $val['name']?></a>
                                            </div>
                                            <div class="yishou">已售：<span><?php echo $val['sales']?></span>束</div>
                                            <div class="proprice">￥<?php echo $val['price']?></div>
                                        </li>
                                    <?php
                                    }
                                        ?>
                                </ul>
                            </div>
                        </div>
                    <?php
                    }
                        ?>
            <?php
            }
        ?>
        <div class="about-us"><a href="#"><img src="/cn/images/index-guanggao.png" alt="了解我们"/></a></div>
        <!--爱情鲜花-->
        <div class="love_flower">
            <?php
                foreach($middle as $v) {
                    ?>
                    <div class="love-l-left">
                        <div class="left-title">
                            <h1><a href="javascript:;" title="<?php echo $v['name']?>"><?php echo $v['name']?></a></h1>
                            <ul>
                                <?php
                                foreach($v['category'] as $val) {
                                    ?>
                                        <li><a href="#"><?php echo $val['name']?></a></li>
                                    <?php
                                    }
                                ?>
                                <li><a href="#"><img src="/cn/images/index-smallSJ.png" alt="图标"/> 全部鲜花</a></li>
                            </ul>
                        </div>
                        <div class="bottom_pic">
                            <ul>
                                <?php
                                foreach($v['flower'] as $val) {
                                    ?>
                                        <li>
                                            <div class="propic"><a href="/flower/detail.asp?ID=534" target="_blank"><img
                                                        src="<?php echo $val['defaultImage']?>"></a></div>
                                            <div class="protit"><a href="/flower/detail.asp?ID=534" target="_blank"><?php echo $val['name']?></a>
                                            </div>
                                            <div class="yishou">已售：<span><?php echo $val['sales']?></span>束</div>
                                            <div class="proprice">￥<?php echo $val['price']?>.00</div>
                                        </li>
                                    <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                <?php
                }
            ?>
            <div class="love-l-right">
                <div class="love-r-title">
                    花间意销售排行榜
                </div>
                <div class="r-con">
                    <ul>
<?php
    foreach($top as $k => $v) {
        if($k == 3){break;}
        ?>
        <li>
            <div class="r-c-left">
                <span><?php echo $k+1?></span>
                <img src="<?php echo $v['image']?>" alt="flower">
            </div>
            <div class="r-c-right">
                <h4><?php echo $v['name']?></h4>
                <b><?php echo $v['price']?></b>

                <p>销量：<span><?php echo $v['number']?></span>束</p>
                <a href="#">查看</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#">购买</a>
            </div>
            <div class="clearfloat"></div>
        </li>
    <?php
    }
?>
                        <?php
                        foreach($top as $k => $v) {
                            if ($k < 3) {
                                continue;
                            }
                            ?>
                            <li>
                                <div class="phb-l">
                                    <b><?php echo $k+1?></b>
                                    <span><?php echo $v['name']?></span>
                                </div>
                                <div class="phb-c"><?php echo $v['price']?></div>
                                <div class="phb-r"><span><?php echo $v['number']?></span>束</div>
                                <div class="clearfloat"></div>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="clearfloat"></div>
        </div>
        <?php
        foreach($foot as $v) {
            ?>
            <?php
            if($v['type'] == 2) {
                ?>
                <div class="shengri_title">
                    <h1><a href="javascript:;"  title="<?php echo $v['name']?>"><?php echo $v['name']?></a></h1>

                    <div class="more">
                        <?php
                        foreach($v['category'] as $val) {
                            ?>
                            <a href="#" target="_blank"><?php echo $val['name']?></a><em>|</em>
                        <?php
                        }
                        ?>
                        <a href="#" target="_blank">更多&gt;&gt;</a>
                    </div>
                </div>
                <div class="shengri_content">
                    <div class="bottom_pic">
                        <ul>
                            <?php
                            foreach($v['flower'] as $val) {
                                ?>
                                <li>
                                    <div class="propic">
                                        <a href="#" target="_blank">
                                            <img src="<?php echo $val['defaultImage']?>" title="flower"/>
                                        </a>
                                    </div>
                                    <div class="protit">
                                        <a href="#" target="_blank"><?php echo $val['name']?></a>
                                    </div>
                                    <div class="yishou">已售：<span><?php echo $val['sales']?></span>束</div>
                                    <div class="proprice">￥<?php echo $val['price']?></div>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            <?php
            }
            ?>
            <?php
            if($v['type'] == 1) {
                ?>
                <div class="shengri_title">
                    <h1><a href="javascript:;" title="<?php echo $v['name']?>"><?php echo $v['name']?></a></h1>

                    <div class="more">
                        <?php
                        foreach($v['category'] as $val) {
                            ?>
                            <a href="#" target="_blank"><?php echo $val['name']?></a><em>|</em>
                        <?php
                        }
                        ?>
                        <a href="#" target="_blank">更多&gt;&gt;</a>
                    </div>
                </div>
                <div class="shengri_content">
                    <div class="top_pic">
                        <ul>
                            <?php
                            $left = unserialize($v['left']);
                            ?>
                            <li class="first">
                                <a href="<?php echo $left['url']?>" target="_blank">
                                    <img src="<?php echo $left['image']?>" width="295" height="260">
                                </a>
                            </li>
                            <?php
                            $middleImage = unserialize($v['middle']);
                            ?>
                            <li class="mid">
                                <a href="<?php echo $middleImage['url']?>" target="_blank">
                                    <img src="<?php echo $middleImage['image']?>" width="586" height="260">
                                </a>
                            </li>
                            <?php
                            $right = unserialize($v['right']);
                            ?>
                            <li class="last">
                                <a href="<?php echo $right['url']?>" target="_blank">
                                    <img src="<?php echo $right['image']?>" width="295" height="260">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="bottom_pic">
                        <ul>
                            <?php
                            foreach($v['flower'] as $val) {
                                ?>
                                <li>
                                    <div class="propic"><a href="#" target="_blank"><img
                                                src="<?php echo $val['defaultImage']?>"></a></div>
                                    <div class="protit"><a href="#"
                                                           target="_blank"><?php echo $val['name']?></a>
                                    </div>
                                    <div class="yishou">已售：<span><?php echo $val['sales']?></span>束</div>
                                    <div class="proprice">￥<?php echo $val['price']?></div>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            <?php
            }
            ?>
        <?php
        }
        ?>

    </div>
</div>
<div class="caseBox">
    <div class="case-yuding">
        <div class="case-title">
            <h2>蛋糕预定</h2>
            <a href="#">更多蛋糕&gt;&gt;</a>
            <div class="clearfloat"></div>
        </div>
        <div class="case-bot">
            <ul>
                <?php
                foreach($cake as $v) {
                    ?>
                    <li>
                        <div class="img-box">
                            <a href="#"><img src="<?php echo $v['defaultImage']?>" alt="图片"/></a>
                        </div>
                        <h4><a href="#"><?php echo $v['name']?></a></h4>

                        <p>￥<?php echo $v['price']?></p>
                        <span>已售<b>6668</b>束</span>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="case-yuding c-ml">
        <div class="case-title">
            <h2>花篮预定</h2>
            <a href="#">更多花篮&gt;&gt;</a>
            <div class="clearfloat"></div>
        </div>
        <div class="case-bot">
            <ul>
                <?php
                    foreach($basket as $v) {
                        ?>
                        <li>
                            <div class="img-box">
                                <a href="#"><img src="<?php echo $v['defaultImage']?>" alt="图片"/></a>
                            </div>
                            <h4><a href="#"><?php echo $v['name']?></a></h4>

                            <p>￥<?php echo $v['price']?></p>
                            <span>已售<b>6668</b>束</span>
                        </li>
                    <?php
                    }
                ?>
            </ul>
        </div>
    </div>
    <div class="clearfloat"></div>

</div>
<div class="kuaijie">
    <ul class="k-ul01">
        <?php
            foreach($keywords as $k => $v) {
                if($k >=9){
                    break;
                }
                ?>
                <li><a href="<?php echo $v['url']?>" <?php echo $v['type'] == 2?'class="bg01"':'class="bg02"'?>><?php echo $v['name']?></a></li>
            <?php
            }
        ?>
    </ul>
    <ul class="k-ul02">
        <?php
        foreach($keywords as $k => $v) {
            if($k <9){
                continue;
            }
            ?>
            <li><a href="<?php echo $v['url']?>" <?php echo $v['type'] == 2?'class="bg01"':'class="bg02"'?>><?php echo $v['name']?></a></li>
        <?php
        }
        ?>
        <li><a href="#" class="color">查看更多&gt;&gt;</a></li>
    </ul>
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
            <img src="/cn/images/qrcode_360flower.png" width="86" height="86">
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
    <a href="#" target="_blank"><img src="/cn/images/pay_alipay1.gif"  border="0"></a>
    <a href="#" target="_blank"><img src="/cn/images/pay_yeepay.gif"  border="0"></a>
    <a href="#" target="_blank"><img src="/cn/images/pay_paypal1.gif"  border="0"></a>
    <img src="/cn/images/f_icp.gif"  border="0">
    <img src="/cn/images/trust_star.gif" alt="网站信用"  border="0">
    <img src="/cn/images/footer-icon01.gif" alt="icon"  border="0">
    <img src="/cn/images/footer-icon02.gif" alt="icon"  border="0">
    <img src="/cn/images/footer-icon03.png" alt="icon"  border="0">
    <p>Copyright© 2005-2017 花间意电子商务有限公司 版权所有，并保留所有权利。 www.521huadian.com All rights reserved</p>
</div>
<div id="backtop"></div>
<script type="text/javascript" src="/cn/js/zxkf.js"></script>
</body>
</html>