
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" href="/cn/css/public.css"/>
    <link rel="stylesheet" href="/cn/css/myOrder.css"/>
    <link rel="stylesheet" href="/cn/css/reset.css">
    <link rel="stylesheet" href="/cn/css/common.css">
    <link rel="stylesheet" href="/cn/css/main.css">
    <link rel="stylesheet" href="/cn/css/font-awesome.min.css">
    <script type="text/javascript" src="/cn/js/jquery-1.12.2.min.js"></script>
    <script type="text/javascript" src="/cn/js/jquery.SuperSlide.2.1.1.js"></script>
    <script type="text/javascript" src="/cn/js/myOrder.js"></script>

</head>
<body>
<?php use app\commands\front\NavWidget; ?>
<?php NavWidget::begin(); ?>
<?php NavWidget::end(); ?>
<div class="orderContent">
    <div class="order-left">
        <ul>
            <li><a href="/smart_order.html">留学订单</a></li>
            <li><a href="/gmat_order.html">gmat订单</a></li>
            <li class="on"><a href="/toefl_order.html">托福订单</a></li>
            <li><a href="/class_order.html">网校订单</a></li>
            <li><a href="/integral.html">我的雷豆</a></li>
            <li><a href="/cart.html">我的购物车</a></li>
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
                                                            <h4><a href="<?php echo Yii::$app->params['gmatUrl'].$v['url']?>"><?php echo $v['title']?></a></h4>
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
                                                            if($v['order_status'] == 1) {
                                                                $sign = \app\libs\Method::post(Yii::$app->params['gmatUrl'] . "/index.php?web/webapi/isLive", ['contentId' => $v['commodity_id']]);
                                                                $sign = json_decode($sign,true);
                                                                ?>
                                                                <?php
                                                                    if($sign['code'] == 1) {
                                                                        ?>
                                                                        <a href="<?php echo Yii::$app->params['gmatUrl']?>/liveclass/<?php echo $v['order_id']?>.html"
                                                                           class="orderD">进入教室</a>
                                                                    <?php
                                                                    }
                                                                        ?>
                                                            <?php
                                                            }else {
                                                                ?>
                                                                <a href="<?php echo Yii::$app->params['gmatUrl']?>/pay/pay_Details&orderid=<?php echo $v['order_id']?>" class="orderD02">立即购买</a>
                                                            <?php
                                                            }
                                                        ?>
                                                        <?php
                                                        if($v['order_status'] != 1) {
                                                            ?>
                                                            <!--<a href="#" class="dis-B">订单详情</a>-->
                                                            <a href="#" class="dis-B redColor"
                                                               onclick="deleteCourseRecord(this)">删除记录</a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php
                                                if($v['order_status'] == 1) {
                                                    ?>
                                                    <!--进入视频界面入口-->
                                                    <?php
                                                    $video = \app\libs\Method::post(Yii::$app->params['gmatUrl'] . "/index.php?web/webapi/getVideo", ['contentId' => $v['commodity_id']]);
                                                    $video = json_decode($video, true);
                                                    $video = json_decode(\app\libs\Method::getextbyhtml1($video['VideoSDK']), true);
                                                    ?>
                                                    <div class="showVideo">
                                                        <?php
                                                        foreach ($video as $k =>$val) {
                                                            ?>
                                                            <?php
                                                                if($val['-'] == 1) {
                                                                    ?>
                                                                    <div style="clear: both"></div>
                                                                    <div style="width: 100%;border: 1px #ff4502 solid;margin: 10px 0;"></div>
                                                                <?php
                                                                }else {
                                                                    ?>
                                                                    <a href="<?php echo Yii::$app->params['gmatUrl']?>/livevideo/<?php echo $v['order_id']?>-<?php echo $k+1?>.html" target="_blank">
                                                                        <button type="button"
                                                                                value=""><?php echo $val['name'] ?>
                                                                        </button>
                                                                    </a>
                                                                <?php
                                                                }
                                                                    ?>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                <?php
                                                }
                                            ?>
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
                                         <span>总金额：<b>￥<?php echo $v['payable']?></b></span>
                                         <?php
                                            if($v['status'] == 1) {
                                                ?>
                                                <a href="<?php echo Yii::$app->params['orderUrl']?>/payType/<?php echo $v['id']?>.html"
                                                   class="orderD02" style="display: inline-block;">立即购买</a>
                                            <?php
                                            }
                                         ?>
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
                                                                    <a href="<?php
                                                                    if($v['orderBelong'] == 2){
                                                                        echo Yii::$app->params['toeflUrl']."/toeflcourses/".$val['contentId'].".html";
                                                                    }elseif($v['orderBelong'] == 3){
                                                                        echo Yii::$app->params['smartUrl']."/goods/".$val['contentId'].".html";
                                                                    }elseif($v['orderBelong'] == 5){
                                                                        echo "/goods/".$val['contentId']."/".$val['type'].".html";
                                                                    }
                                                                    ?>">
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
                                                                    <h4><a href="<?php
                                                                                if($v['orderBelong'] == 2){
                                                                                    echo Yii::$app->params['toeflUrl']."/toeflcourses/".$val['contentId'].".html";
                                                                                }elseif($v['orderBelong'] == 3){
                                                                                    echo Yii::$app->params['smartUrl']."/goods/".$val['contentId'].".html";
                                                                                }elseif($v['orderBelong'] == 5){
                                                                                    echo "/goods/".$val['contentId']."/".$val['type'].".html";
                                                                                }
                                                                            ?>"><?php echo $val['contentName']?></a></h4>
                                                                    <span><a href="javascript:;"><?php echo $val['contentTag']?></a></span>
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
                                                                <?php
                                                                if($v['status']>2) {
                                                                    ?>
                                                                <?php
                                                                    if ($v['orderBelong'] == 2) {
                                                                        $sign = \app\libs\Method::post(Yii::$app->params['toeflUrl'] . "/cn/api/is-live", ['contentId' => $val['contentId']]);
                                                                    }
                                                                    if ($v['orderBelong'] == 3) {
                                                                        $sign = \app\libs\Method::post(Yii::$app->params['smartUrl'] . "/cn/api/is-live", ['contentId' => $val['contentId']]);
                                                                    }
                                                                    if ($v['orderBelong'] == 5) {
                                                                        $sign = \app\modules\cn\models\Goods::isSdk($val['contentId'], $val['type']);
                                                                    }
                                                                    $sign = json_decode($sign,true);
                                                                if($sign['code'] == 1) {
                                                                    ?>
                                                                    <a href="<?php echo Yii::$app->params['orderUrl'] ?>/pay/video/index?contentId=<?php echo $val['contentId'] ?>"
                                                                       class="orderD">进入教室</a>
                                                                <?php
                                                                }
                                                                    ?>
                                                                <?php
                                                                }
                                                                ?>
                                                                <?php
                                                                if($v['status'] == 1) {
                                                                    ?>
                                                                    <!--<a href="#" class="dis-B">订单详情</a>-->
                                                                    <a href="#" class="dis-B redColor"
                                                                       onclick="deleteCourseRecord(this)">删除记录</a>
                                                                <?php
                                                                }
                                                                ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <?php
                                                    if($v['status'] > 2) {
                                                        ?>
                                                        <?php
                                                        if ($v['orderBelong'] == 2) {
                                                            $video = \app\libs\Method::post(Yii::$app->params['toeflUrl'] . "/cn/api/get-sdk", ['contentId' => $val['contentId']]);
                                                        }
                                                        if ($v['orderBelong'] == 3) {
                                                            $video = \app\libs\Method::post(Yii::$app->params['smartUrl'] . "/cn/api/get-sdk", ['contentId' => $val['contentId']]);
                                                        }
                                                        if ($v['orderBelong'] == 5) {
                                                            $video = \app\modules\cn\models\Goods::getSdk($val['contentId'], $val['type']);
                                                        }


                                                        $video = json_decode($video, true);

                                                        ?>
                                                        <!--进入视频界面入口-->
                                                        <div class="showVideo">
                                                            <?php
                                                            foreach ($video as $value) {
                                                                ?>
                                                                <a href="<?php echo Yii::$app->params['orderUrl']?>/pay/video/video?id=<?php echo $val['id']?>&videoId=<?php echo $value['id']?>" target="_blank">
                                                                    <button type="button"
                                                                            value=""><?php echo $value['name'] ?>
                                                                    </button>
                                                                </a>
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
<?php use app\commands\front\FooterWidget; ?>
<?php FooterWidget::begin(); ?>
<?php FooterWidget::end(); ?>
</body>
</html>
<script type="text/javascript">

    function CancelOrder(_id,belong){
        if(confirm("确定删除订单吗，删除后将无法恢复")){
            $.post("/cn/api/cancel-order",{id:_id,belong:belong},function(re){
                if(re.code == 1){
                    location.reload();
                }
            },'json')
        }
    }
    $(function(){
        /**
         * 分页点击
         */
        $(".iPage").on("click",function(){
            var type = $('.orderHd').find('.on').attr('data-value');
            var page = $(this).html();
            location.href="/toefl_order/"+type+"/"+page+'.html';
        });

        /**
         * 类型点击
         */
        $('.change').click(function(){
            $(this).siblings().removeClass('on');
            $(this).addClass('on');
            var type = $('.orderHd').find('.on').attr('data-value');
            location.href="/toefl_order/"+type+"/1.html";
        })
    })
</script>