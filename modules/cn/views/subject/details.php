<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>因为爱情:11枝精品红玫瑰，黄英丰满。_鲜花-中国鲜花快递网</title>
    <meta name="description" content="中国鲜花快递网-鲜花，因为爱情:11枝精品红玫瑰，黄英丰满。-中国鲜花快递网专注全国送花服务。">
    <meta name="keywords" content="鲜花,11枝精品红玫瑰，黄英丰满。">
    <link href="/cn/css/base.css" rel="stylesheet" type="text/css">
    <link href="/cn/css/details.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/cn/js/hm.js"></script>
    <script type="text/javascript" src="/cn/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="/cn/js/detail.js"></script>

    <script src="/cn/js/bsStatic.js" type="text/javascript" charset="utf-8"></script>
    <script src="/cn/js/fingerprint2.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/cn/js/bs-engine.js" type="text/javascript" charset="utf-8"></script>
    <style type="text/css"></style>
    <style type="text/css"></style>
    <script src="/cn/js/bsMore.js" type="text/javascript" charset="utf-8"></script>
    <script src="/cn/js/bshareS887.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<?php use app\commands\front\NavWidget;?>
<?php NavWidget::begin();?>
<?php NavWidget::end();?>
<!-- header end-->
<div id="container_wrap">
    <div id="probox">
        <div class="local">您的位置：<a href="/">花间意鲜花网</a><em>&gt;</em><a href="#">鲜花</a><em>&gt;</em><?php echo $flower['name']?></div>
        <div class="proimg">
            <?php
            $imageList = explode("-",$flower['imageStr']);
            ?>
            <div class="bigImg">
                <img src="<?php echo isset($imageList[0])?$imageList[0]:''?>" id="midimg">

                <div style="display: none;" id="winSelector"></div>
                <span class="Tag_tj"></span>
            </div>
            <div id="bigView" style="display:none;"><img src="<?php echo isset($imageList[0])?$imageList[0]:''?>" width="800" height="800"></div>
            <div class="show-list-prev"></div>
            <div class="smallImg" id="imageMenu">
                <ul>
                    <?php
                        foreach($imageList as $k => $v) {
                            ?>
                            <li <?php echo $k == 0?'id="onlickImg"':''?>><img src="<?php echo $v?>"></li>
                        <?php
                        }
                    ?>
                </ul>
            </div>
            <div class="show-list-next"></div>
            <div class="share">
                <div class="bshare-custom">
                    <div class="bsPromo bsPromo2"></div>
                    分享到：<a class="bshare-sinaminiblog" title="分享到新浪微博"></a><a class="bshare-qzone"
                                                                              title="分享到QQ空间"></a><a class="bshare-qqmb"
                                                                                                     title="分享到腾讯微博"></a><a
                        class="bshare-qqxiaoyou" title="分享到朋友网"></a><a class="bshare-weixin" title="分享到微信"></a><a
                        class="bshare-renren" title="分享到人人网"></a><a class="bshare-douban" title="分享到豆瓣"></a><a
                        class="bshare-kaixin001" title="分享到开心网"></a></div>
            </div>
        </div>
        <div class="proinfo">
            <h1><?php echo $flower['name']?><em>商品编号：<?php echo 'HJZ'.$flower['goodsNumber']?></em></h1>

            <h2><?php echo $flower['flowerDes']?></h2>

            <div class="keybox">
                <div class="pricebox">
                    <div class="font999">市场价：￥<span class="break"><?php echo $flower['markPrice']?></span></div>
                    <div class="key_price">优惠价：<em>￥</em><span id="price_now"><?php echo $flower['price']?></span></div>
                    <!--<div>促&nbsp;&nbsp;&nbsp;&nbsp;销：<span class="zhijiang">直降</span><span class="msg">已优惠￥61.00</span></div>-->
                </div>
                <p><strong>花&nbsp;&nbsp;&nbsp;&nbsp;材：</strong><span class="content"><?php echo $flower['flowerDes']?></span></p>

                <p><strong>包&nbsp;&nbsp;&nbsp;&nbsp;装：</strong><span class="content"><?php echo $flower['pack']?></span>
                </p>
                <p><strong>花&nbsp;&nbsp;&nbsp;&nbsp;语：</strong><span class="content"><?php echo $flower['flowerLanguage']?></span>
                </p>
                <p>附送赠品：免费附送精美贺卡，代写您的祝福。(您下单时可填写留言栏)</p>

                <p>配送范围：本地区各市县、街道、乡镇（市区内免费送）</p>
                <div style="border-top: 1px dotted #DDD;"></div>
                <!--增加购买-->
                <div class="addBuy">
                    <label>增加购买：</label>
                    <ul>
                        <?php
                            foreach($append as $k => $v) {
                                ?>
                                <li>
                                    <select>
                                        <?php
                                            foreach($v['details'] as $val) {
                                                ?>
                                                <option value="<?php echo $val['id']?>"><?php echo $val['name']?>(<?php echo $val['price']?>元/<?php echo $v['unit']?>)</option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                    <input type="text"/>
                                    <span><?php echo $v['unit']?></span>
                                </li>
                            <?php
                            }
                        ?>
                    </ul>
                    <div class="clearfloat"></div>
<!--                    <p class="red-p">红玫瑰(10元)X3&nbsp;&nbsp;&nbsp;&nbsp;花瓶小号(38元)X1</p>-->
                </div>

                <!--紧限蛋糕展示-->
<!--                <div class="cake-show">-->
<!--                    <label>蛋糕尺寸</label>-->
<!--                    <ul>-->
<!--                        <li class="on"><a href="javascript:void(0);">8寸</a></li>-->
<!--                        <li><a href="javascript:void(0);">10寸</a></li>-->
<!--                        <li><a href="javascript:void(0);">12寸</a></li>-->
<!--                        <li><a href="javascript:void(0);">14寸</a></li>-->
<!--                        <li><a href="javascript:void(0);">16寸</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
                <!--紧限蛋糕展示 end-->

                <div style="border-top: 1px dotted #DDD;"></div>
                <!--数量-->
                <div class="numBox">
                    <span>数量：</span>
                    <input type="button" value="-" onclick="subtract(this)"/><input type="text" value="1" id="numTotal"/><input type="button" value="+" onclick="addNum(this)"/>
                    <span>件</span>
                </div>

                <form name="buy" method="post" action="#" id="buy">
                    <div class="buy"><input name="mc" type="hidden" id="mc" value="因为爱情">
                        <input name="ID" type="hidden" id="ID" value="419">
                        <input name="bz" type="hidden" id="bz" value="标准包装">
                        <input name="imageField3" type="image" src="/cn/images/buy_01.png" width="180" height="40"
                               border="0"
                               onclick="document.buy.action='#';document.buy.submit();"
                               style="margin-right:10px;">
                        <input name="imageField2" type="image" src="/cn/images/buy_02.png" width="180" height="40"
                               border="0">
                    </div>
                </form>
            </div>
            <!--<div class="Promise">服务承诺：<em>新鲜花材</em><em>品质保证</em><em>按时送达</em><em>退款保障</em></div>-->
        </div>
        <div class="rightbar">
            <div class="csbar">
                <h2>服务承诺</h2>

                <div class="service">
                    <dl>
                        <dt><i class="cs1"></i>极速送达</dt>
                        <dd>市区最快1小时送达</dd>
                        <dt><i class="cs2"></i>新鲜花材</dt>
                        <dd>现包现送 品质保证</dd>
                        <dt><i class="cs3"></i>专业包花</dt>
                        <dd>高级花插花师亲自插花包花</dd>
                        <dt><i class="cs4"></i>准时定点送花</dt>
                        <dd>专人专车 全程呵护</dd>
                        <dt><i class="cs5"></i>订单状态即时更新</dt>
                        <dd>送花短信通知</dd>
                        <dt><i class="cs6"></i>售后服务</dt>
                        <dd>订单实拍 100%退款承诺</dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="clearfloat"></div>
    </div>

    <div id="container">
        <div class="leftbar">
            <?php
                foreach($category as $v) {
                    ?>
                    <div class="seen-t-sort">
                        <h2><?php echo $v['name']?>订花</h2>

                        <div class="s-b-con">
                            <ul>
                                <?php
                                    foreach($v['child'] as $val) {
                                        ?>
                                        <li><a href="#"><?php echo $val['name']?></a></li>
                                    <?php
                                    }
?>
                            </ul>
                        </div>
                    </div>
                <?php
                }
?>
            <div class="seen-t-sort">
                <h2>其他产品</h2>
                <div class="s-b-con">
                    <ul>
                        <li><a href="#">精致花篮</a></li>
                        <li><a href="#">巧克力</a></li>
                        <li><a href="#">蛋糕</a></li>
                    </ul>
                </div>
            </div>

            <div class="seen">
                <h2>热销花束推荐</h2>
                <?php
                    foreach($hot as $v) {
                        ?>
                        <div class="probox_2"><a href="<?php echo $v['url']?>" target="_blank"><img
                                    src="<?php echo $v['image']?>"><?php echo $v['name']?></a>

                            <div class="price">价格：<?php echo $v['price']?></div>
                        </div>
                    <?php
                    }
                ?>
            </div>
            <div class="guanzhu">
                <a href="#">
                    <img src="/cn/images/details-guanzhu.png" alt="关注图片"/>
                </a>
            </div>
            <div class="history"><h2>最近浏览过的商品</h2>
<?php
    foreach($browse as $v) {
        ?>
        <div class="probox_1"><a href="/flower/HJY<?php echo $v['goodsNumber']?>.html" target="_blank"><img
                    src="<?php echo $v['defaultImage']?>"></a>
            <span><a href="/flower/HJY<?php echo $v['goodsNumber']?>.html" target="_blank"><?php echo $v['name']?><br>￥349</a></span>

            <div class="clearfloat"></div>
        </div>
    <?php
    }
?>
            </div>

        </div>
        <div class="maincontent">
            <div class="promenu">
                <ul>
                    <li id="tab0" class="tab01" onclick="showsub(0)">商品详情</li>
                    <li id="tab1" class="tab02" onclick="showsub(1)">购买提示</li>
                    <li id="tab2" class="tab02" onclick="showsub(2)">商品评价</li>
                    <li id="tab3" class="tab02" onclick="showsub(3)">支付方式</li>
                    <li id="tab4" class="tab02" onclick="showsub(4)">售后保障</li>
                    <li id="tab5" class="tab02" onclick="showsub(5)">为何选择我们</li>
                </ul>
            </div>
            <div id="sub0">
                <h3 id="tit0"></h3>

                <div class="detail_words">
                    <p><strong>花材：</strong>
                        <span><?php echo $flower['flowerDes']?></span></p>

                    <p><strong>包装：</strong>
                        <span><?php echo $flower['pack']?></span></p>
                    <p><strong>附送：</strong>
                        <span>免费附送精美贺卡，代写您的祝福。(您下单时可填写留言栏)</span></p>
                    <p><strong>花语：</strong>
                        <span><?php echo $flower['flowerLanguage']?></span></p>

                    <p><strong>备注：</strong>
                        <span>鲜花产品您至少应提前3小时下订单，我们保证按时送达； 为了能够有充分的时间准备，我们建议您尽量提前一天以上预定。</span></p>
                </div>
                <div class="fense-title">未述之意，尽在花间</div>
                <div class="detail_box">
                    <?php echo $flower['description']?>
                </div>
            </div>
            <div id="sub1"  style="display: none;">
                <h2 class="title">购买流程说明</h2>
                <div class="box">
                    <span class="red">客服协助网上订花：</span> <br/>
                    仅需在花间意鲜花店选择好鲜花款式，点击鲜花网右边“立即咨询”，将商品链接发送给花间意客服，花店客服人员会一对一指导下单，确认订单信息完整无误后，即刻根据订单指定的送达时间安排派送。
                    <br/><span class="red">客人自主网上订花：</span><br/>
                    客人可在鲜花网直接下单，将选择好的商品放入购物车，是网站会员的客人可直接在会员中心进行结算，没有注册会员的客人可直接点击“立即购买”，填写好相关信息后，提交订单并付款。
                    <br/>1、鲜花选择 在鲜花网首页或者鲜花网的导航条上，根据送花对象或者送花用途，选择自己最心仪的鲜花款式，点击“立即购买”，或者“加入购物车”后，点击“结算”。
                    <br/> 2、资料填写 进入鲜花网的购买页面，依次详细填写收花人的地址、联系方式、贺卡等内容，留下订花人的电话，以便在送达后及时短信或电话回复。
                    <br/><span class="red">注：务必留下准确的联系方式和详细地址，以便订单准确无误地送达收花人手中。</span>
                    <br/> 3、订单确认 相关信息填写好后。点击提交订单，鲜花网会弹出一个订单号，为了方便网上订花随时跟踪订单记录，请记住该订单号，方便查单。同时，页面跳转到鲜花网的支付页面。
                    <br/>4、付款方式 花间意鲜花网支持各个银行的付款方式，自助下单的客人，可直接余额支付，也可选择网银支付、支付宝、微信快捷支付。在外地不方便电脑操作的客人，可在银行柜台直接打款或则ATM机转账支付。
                    <br/>5、鲜花配送 在付款成功之后，花间意鲜花网会有专人客服确认订单并安排，如果订单显示正在配货，则鲜花订单有效，如果订单的地址不够详细、联系方式有问题或者花材有变动，花店会及时第一时间与客人取得联系并协商。
                    <br/> 6、完成订单 当收花人收到鲜花后，如果订花人留下了联系方式，则会收到订单已经送达的短信提示，订单流程结束。如果对于网上订花有任何问题，都可以及时拨打鲜花网的服务热线进行说明或投诉。
                    <br/><span class="red">电话订花方式：</span>
                    <br/>400免费电话订花：客人可随时拨打24小时订花免费服务热线400-XXX-XXXX电话订购鲜花。一个电话，可以立即送花上门。
                </div>
                <h2 class="title">常见问题说明</h2>
                <h3 id="tit1"></h3>
                <dl>
                    <dt>1.你们的鲜花可以送到哪些地方？</dt>
                    <dd> 全国的城市市区都可免费配送。郊区、开发区、乡镇、农村需咨询在线客服确认之后再订购。</dd>
                    <dt> 2.你们是怎么配送到全国各地的？</dt>
                    <dd>我们花店在全国600多个城市拥有8000多家分店，鲜花均是由当地分店包扎，花材均采用当天新鲜花材制作，专人、
                        专车配送，确保送到的鲜花新鲜饱满。
                    </dd>
                    <dt>3、配送费说明</dt>
                    <dd>  市县级城市的城区均由城区的分店免费配送；郊区、开发区、乡镇、农村则由城区内的花店专车送到，因此会产生额
                        外费用，需要补拍配送费。
                    </dd>
                    <dt> 4.鲜花需要提前预定吗？</dt>
                    <dd>常见花材一般当天便可送到，为了防止分店当天订单已满，缺少花材，请提前预定。
                        稀有花材（向日葵，绣球花，蓝玫瑰）至少需要提前1天预定，并在订单里准确填写订花人联系方式，以免没有花材
                        时及时与您取得联系。
                        季节性花材（如马蹄莲、郁金香、风信子、雏菊、桔梗花、勿忘我）需要咨询客服预定。</a>
                    </dd>
                    <dt>5.我想在特定时间送花，可以吗?</dt>
                    <dd>可以的。
                        因城市交通状况随时变化，原则上我们只能承诺类似“几月几日几点到几点之间、上午、下午、晚上、几点以前”这
                        样的时间送达，一般以2个小时为区间。（比如您可以指定10点前送到，或者送花时间在10:00—12:00之间）。
                        如果是在17:00之后付款，第二天送花只能指定上午或者下午送花哦。
                        如果您需要特定时间（具体到某个小时）送到，需要加收30元定时费用（重要节假日如情人节、七夕节等，只承诺在
                        当天送达），详见《定时配送》。
                        但如您确有特殊要求，请联系我们客服，我们将最大限度满足你的时间要求。
                    </dd>
                    <dt> 6.鲜花会送到收花人手上吗？</dt>
                    <dd>
                        原则上，我们会把鲜花送到收花人手上。不排除如收花人不在本地、门卫不让进、收花人主动要求指定代收人代收的
                        其他情况，我们会在取得收花人或订花人同意的情况下，再做妥善处理。
                    </dd>
                    <dt> 7.我如何才能知道我送给别人的鲜花已经送到?</dt>
                    <dd>  在鲜花送出后我们会通过短信或电话联系您，您也可以在"订单查询"栏查询您的订单状态。
                        一般鲜花送出后1小时内即可送到收花人手中，如遇部分城市交通不便或联系不上收花人，也会出现配送延迟的少见
                        情况，给您造成的不变请您谅解。</dd>
                    <dt>8.鲜花和图片是一模一样吗？</dt>
                    <dd>花间意鲜花网的每束鲜花都是采用新鲜的花材由专业的花艺师制作包装，制作过程中我们会以图片原始形态作为主要
                        参考，外型上尽量保持与图片一致，但由于每个花艺师的手法风格不同，每一朵花的外观及其开放程度不同，各地的
                        配花和包装纸由于全国地域限制，具体效果可能有小的改变，但绝不会影响整体风格，产品质量请您放心！
                    </dd>
                    <dt>9.收到的花材和支数会变吗？</dt>
                    <dd>主花材颜色和支数不会变，如当地分店缺主花材，我们客服会在第一时间联系您，征得您的同意后更换。
                        配花由于全国地域性差异以及部分配花属于季节性花材，像桔梗、相思豆、叶上黄金、水仙百合等特殊配花，店面会
                        根据具体情况安排相似的配花或者同等价位配花制作。</dd>
                    <dt>10.可以花到后付款吗?</dt>
                    <dd>可以的，如果是您本人收花可以花到付款。</dd>
                    <dt>11.我在提交订单后不想要了，怎么办?</dt>
                    <dd>在您的订单生效前，您可以登陆，查看您的订购情况，对于没有处理的订单您可以撤销。
                        您也可以电话联系我们，或点击"在线客服"人工撤销订单。</dd>
                    <dt>12.我对鲜花不满意，想退还，可以吗?</dt>
                    <dd>如果是因为我司的问题，如鲜花不新鲜，没有按时送到，我们会按要求退还的。请参照《售后服务》
                    </dd>
                    <dt>13.我在网上付款安全吗?</dt>
                    <dd>您在网上付款是将您的资料提交给银行的安全认证系统，就算是花间意鲜花网内部工作人员也无法得知，旨在保证您
                        的付款安全。</dd>
                    <dt>14.可以开发票吗？</dt>
                    <dd>可以的。《详见发票说明》</dd>
                    <dt>15.蓝玫瑰是天然的吗？</dt>
                    <dd>目前国内市场上的蓝玫瑰都是染色的，不过我们会采用昆明那边空运过来的染色的蓝玫瑰，保证质量。
                        您如果不喜欢染色可以选择其他颜色的玫瑰产品。</dd>
                    <dt>16.您们怎么保证给我送到，我怎么相信你们？</dt>
                    <dd>首先，我们是知名的鲜花速递供应商，在行业内已经有很高的知名度，全国8000多家分店，因此不存在故意不送。
                        其次，我们有严格的售后服务，如果没有送到，我们有相应的售后赔偿机制，还请您放心订购，我们一定会为您提供
                        最好的鲜花速递服务。</dd>
                </dl>
            </div>
            <div id="sub2" style="display: none;">
                <h3 id="tit2">商品评价</h3>

                <div class="comment">
                    <!--<h3><span>评价人</span>评论<em>(只有购买过商品的用户才能进行评价)</em></h3>-->
                    <h4>客户评论 <span>（总计<b>1512</b>条</span>）</h4>
                    <ul>

                        <li><span>2017-02-14 21:54</span><p>买家：peng***</p><br/>还不错，我女朋友挺满意的，谢谢！希望能越办越好！</li>

                        <li><span>2017-02-14 21:54</span><p>买家：peng***</p><br/>还不错，我女朋友挺满意的，谢谢！希望能越办越好！</li>
                        <li><span>2017-02-14 21:54</span><p>买家：peng***</p><br/>还不错，我女朋友挺满意的，谢谢！希望能越办越好！</li>
                        <li><span>2017-02-14 21:54</span><p>买家：peng***</p><br/>还不错，我女朋友挺满意的，谢谢！希望能越办越好！</li>
                        <li><span>2017-02-14 21:54</span><p>买家：peng***</p><br/>还不错，我女朋友挺满意的，谢谢！希望能越办越好！</li>
                        <li><span>2017-02-14 21:54</span><p>买家：peng***</p><br/>还不错，我女朋友挺满意的，谢谢！希望能越办越好！</li>
                        <li><span>2017-02-14 21:54</span><p>买家：peng***</p><br/>还不错，我女朋友挺满意的，谢谢！希望能越办越好！</li>
                        <li><span>2017-02-14 21:54</span><p>买家：peng***</p><br/>还不错，我女朋友挺满意的，谢谢！希望能越办越好！</li>
                        <li><span>2017-02-14 21:54</span><p>买家：peng***</p><br/>还不错，我女朋友挺满意的，谢谢！希望能越办越好！</li>
                        <li><span>2017-02-14 21:54</span><p>买家：peng***</p><br/>还不错，我女朋友挺满意的，谢谢！希望能越办越好！</li>

                    </ul>
                    <div class="pages" style="margin:10px 20px;">
                        <b>1</b><A href=?page=2>2</A><A href=?page=3>3</A><A href=?page=4>4</A><A href=?page=5>5</A><A
                            href=?page=6>6</A><em>...</em>
                        <A href=?page=2>下一页</A>
                    </div>
                </div>


            </div>
            <div id="sub3" style="display: none;">
                <h3 id="tit3"></h3>
                <h2 class="title">支付方式说明</h2>
                <div class="box">
                    <p>
                        花间意鲜花店支持网上在线支付，也支持银行汇款转账，VIP客户可提供先收货再付款服务。 <br/>
                        花间意鲜花店提供：支付宝支付、网上银行支付、微信支付、银行转账汇款、货到付款。
                    </p>
                    <p>
                        花间意鲜花店付款联系方式： <br/>
                        鲜花店电话：400-XXXX-XXX <br/>
                        花间意提供网上支付小贴士： <br/>
                        1、银行卡网上支付开通手续 <br/>
                        因各地银行政策不同，花间意鲜花店建议您在网上支付前拨打所在地银行电话，咨询该行可供网上支付的银行卡种类及开通手续。
                        <br/>2、支付金额上限 <br/>
                        目前各银行对于网上支付均有一定金额的限制，由于各银行政策不同，花间意鲜花店建议您在申请网上支付功能时向银行咨询相关事宜。
                        <br/>3、怎样判断网上支付是否成功？ <br/>
                        当您完成网上在线支付过程后，系统应提示支付成功；如果系统没有提示支付失败或成功，您可通过电话、ATM 、柜台或登录网上银行等各种方式查询银行卡余额，如果款项已被扣除，网上支付交易应该是成功的，花间意建议您耐心等待。
                    </p>
                    <span class="red">
                        安全性说明：在花间意鲜花店网上购物、付款的时候，是在相应的银行的网站上输入您的信用卡（借记卡）帐号和密码的，安全性由银行全面提供支持和保护。银行和52鲜花网网上花店通过数字签名和加密验证的，本鲜花店保证绝对安全!
                    </span>
                </div>
                <h2 class="title">支付过程说明</h2>
                <div class="box">
                    <p>付款方式一：点击"立即购买"按钮</p>
                    <img src="/cn/images/details-buyimg.png" alt="buy"/>
                    <p>付款方式二：支付平台支付</p>
                    <img src="/cn/images/details-zhifu.png" alt="buy"/>
                </div>
                <h2 class="title">温馨提示</h2>
                <div class="box">
                    <p>（1）钱款到帐查询电话：400-XXXX-XXX <br/>
                        （2）推荐选择在线支付，及时到帐查询</p>
                </div>
            </div>
            <div id="sub4" style="display: none;">
                <h3 id="tit4">售后保障</h3>
                <div style="text-align: center;margin-top: 20px;"><img src="/cn/images/details-shouhou.png" width="800"></div>

            </div>
            <div id="sub5" style="display: none;">
                <h3 id="tit5"></h3>
                <img src="/cn/images/details-why.png" alt="为何选择我们" width="910px"/>
            </div>
            <br>
        </div>
        <div class="clearfloat"></div>
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
<script type="text/javascript" src="/cn/js/msg.asp"></script>
<script type="text/javascript" src="/cn/js/zxkf.js"></script>
<script>
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?0eba20786751252d609ab180a84b797d";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>

<script type="text/javascript" charset="utf-8" src="/cn/js/buttonLite.js"></script>
<script type="text/javascript" charset="utf-8" src="/cn/js/bshareC0.js"></script>

</body>
</html>