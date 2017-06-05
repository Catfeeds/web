
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" href="/cn/css/public.css"/>
    <link rel="stylesheet" href="/cn/css/myOrder.css"/>
    <script type="text/javascript" src="/cn/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/cn/js/jquery.SuperSlide.2.1.1.js"></script>
    <script type="text/javascript" src="/cn/js/myOrder.js"></script>

</head>
<body>

<div class="orderContent">
    <div class="order-left">
        <ul>
            <li class="on"><a href="/order.html">我的订单</a></li>
            <li><a href="#">我的雷豆</a></li>
            <li><a href="#">我的购物车</a></li>
        </ul>
    </div>
    <div class="order-right">
        <div class="orderHd hd">
            <ul>
                <li data-value="3"  class="change <?php echo (isset($_GET['status']) && $_GET['status']==3) || !isset($_GET['status'])?'on':''?>">全部订单</li>
                <li data-value="1" class="change <?php echo (isset($_GET['status']) && $_GET['status']=="1")?'on':''?>">待付款</li>
                <li data-value="2" class="change <?php echo (isset($_GET['status']) && $_GET['status']=="2")?'on':''?>">已付款</li>
            </ul>
        </div>
        <div class="orderBd">
            <div class="info-title">
                <ul>
                    <li>订单详情</li>
                    <li>数量</li>
                    <li>金额</li>
                    <li>状态</li>
                    <li>操作</li>
                </ul>
            </div>
            <div class="info-all">
                <ul>
                    <?php
                        foreach($data  as $v) {
                            ?>
                            <!--------------------------这是一个订单的li----------------------->
                            <li class="topLi">
                                <div class="order-num">
                                    <p><?php echo date("Y-m-d H:i:s",$v['buy_time'])?> <span class="orderml">订单号：<?php echo $v['order_id']?></span></p>
                                </div>
                                <div class="order-course">
                                    <ul>
                                        <li>
                                            <div class="course-col">
                                                <ul>
                                                    <li>
                                                        <div class="left-picture">
                                                            <a target="_blank" href="<?php echo Yii::$app->params['gmatUrl'].$v['url']?>">
                                                                <img
                                                                    src="<?php echo Yii::$app->params['gmatUrl'].'/'.$v['image']?>"
                                                                    alt="详情图片"/>
                                                            </a>
                                                        </div>
                                                        <div class="right-introduce">
                                                            <h4><a href="#"><?php echo $v['title']?></a></h4>
                                                            <span><a href="#"></a></span>
                                                        </div>
                                                        <div style="clear: both"></div>
                                                    </li>
                                                    <li class="marTop">
                                                        X<?php echo $v['commodity_Num']?>
                                                    </li>
                                                    <li class="marTop">
                                                        <span class="redColor">￥<?php echo $v['account']?></span>
                                                    </li>
                                                    <li class="marTop">
                                                        <span class="redColor"><?php echo $v['order_status'] == 1?'已付款':'待付款'?></span>
                                                    </li>
                                                    <li class="btnMartop">
                                                        <?php
                                                            if($v['typeid'] == 1) {
                                                                ?>
                                                                <a href="<?php echo Yii::$app->params['gmatUrl']?>/liveclass/<?php echo $v['order_id']?>.html" class="orderD">进入教室</a>
                                                            <?php
                                                            }else {
                                                                ?>
                                                                <a href="<?php echo Yii::$app->params['gmatUrl']?>/pay/pay_Details&orderid=<?php echo $v['order_id']?>" class="orderD02">立即购买</a>
                                                            <?php
                                                            }
                                                        ?>
                                                        <!--<a href="#" class="dis-B">订单详情</a>-->
                                                        <a href="#" class="dis-B redColor"
                                                           onclick="deleteCourseRecord(this)">删除记录</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!--进入视频界面入口-->
                                            <div class="showVideo">

                                                <a href="#" target="_blank">
                                                    <button type="button" value="">day1雷哥GMAT PREP08 SC1—18题</button>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </li>
                        <?php
                        }
                    ?>
                    <!--------------------------这是一个订单的li----------------------->
                    <?php
                        foreach($order as $k => $v) {
                            if(10-count($data)>=0){
                                $l = 10-count($data);
                                if($k==$l){
                                    break;
                                }
                            }
                            ?>
                            <li class="topLi">
                                <div class="order-num">
                                    <p><?php echo date("Y-m-d H:i:s",$v['createTime'])?> <span class="orderml">订单号：<?php echo $v['orderNumber']?></span></p>
                                     <div class="order-n-right">
                                         <span>总金额：<b>￥890.00</b></span>
                                         <span class="red">未付款</span>
                                     </div>
                                </div>
                                <div class="order-course">
                                    <ul>
                                        <?php
                                            foreach($v['goods'] as $val) {
                                                ?>
                                                <!--------------------------这是一个订单多个商品的li（第二个商品）----------------------->
                                                <li>
                                                    <div class="course-col">
                                                        <ul>
                                                            <li>
                                                                <div class="left-picture">
                                                                    <a href="#">
                                                                        <img
                                                                            src="<?php
                                                                                if($v['orderBelong'] == 2){
                                                                                    echo Yii::$app->params['toeflUrl'].$val['image'];
                                                                                }elseif($v['orderBelong'] == 3){
                                                                                    echo Yii::$app->params['smartUrl'].$val['image'];
                                                                                }elseif($v['orderBelong'] == 5){
                                                                                    echo $val['image'];
                                                                                }
                                                                            ?>"
                                                                            alt="详情图片"/>
                                                                    </a>
                                                                </div>
                                                                <div class="right-introduce">
                                                                    <h4><a href="#"><?php echo $val['contentName']?></a></h4>
                                                                    <span><a href="#"><?php echo $val['contentTag']?></a></span>
                                                                </div>
                                                                <div style="clear: both"></div>
                                                            </li>
                                                            <li class="marTop">
                                                                X1
                                                            </li>
                                                            <li class="marTop">
                                                                <span class="redColor">￥<?php echo $val['price']?></span>
                                                            </li>
                                                            <li class="marTop">
                                                                <span class="greyColor02"><?php echo $v['status']>2?'已付款':'待付款'?></span>
                                                            </li>
                                                            <li class="btnMartop02">
                                                                <!--<a href="#" class="dis-B">订单详情</a>-->
                                                                <a href="#" class="dis-B redColor"
                                                                   onclick="deleteCourseRecord(this)">删除记录</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!--进入视频界面入口-->
                                                    <div class="showVideo">
                                                        <a href="#" target="_blank">
                                                            <button type="button" value="">day1雷哥GMAT PREP08 SC1—18题
                                                            </button>
                                                        </a>
                                                    </div>
                                                </li>
                                            <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </li>
                        <?php
                        }
?>
                </ul>
            </div>
            <!--分页-->
            <div class="table-page">
                <ul>
      <?php echo $pageStr?>
                </ul>
            </div>
        </div>
    </div>
    <div style="clear: both"></div>
</div>

</body>
</html>
<script type="text/javascript">

    function CancelOrder(_id,_this){
        $.post("/pay/api/cancel-order",{orderId:_id},function(re){
            alert(re.message);
            if(re.code == 1){
                window.location.href="/order.html"
            }
        },'json')
    }
    $(function(){
        /**
         * 分页点击
         */
        $(".iPage").on("click",function(){
            var type = $('.orderHd').find('.on').attr('data-value');
            var page = $(this).html();
            location.href="/order/"+type+"/"+page+'.html';
        })

        /**
         * 类型点击
         */
        $('.change').click(function(){
            $(this).siblings().removeClass('on');
            $(this).addClass('on');
            var type = $('.orderHd').find('.on').attr('data-value');
            location.href="/order/"+type+"/1.html";
        })
    })
</script>