<?php $userId = Yii::$app->session->get('uid'); ?>
<?php $userData = Yii::$app->session->get('userData')?>
<section id="nav_wrap">
    <div class="w12 clearfix">　　
        <ul class="nav_list fl clearfix">
            <li>
                <a href="#">雷哥网网校<img src="/cn/images/crow_1.png" style="margin-left: 7px" alt=""></a>
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
            <li><a href="http://bbs.viplgw.cn/">八卦社区</a></li>
            <li class="shop_car">
                <div class="shoppingIcon inm relative">
                    <img src="/cn/images/shopping_icon.png" alt="">
                    <span class="shop_msg ani">1</span>
                </div>
                <a href="/cart.html">购物车</a>
            </li>
        </ul>
        <!--未登录-->
        <?php
        if(!$userId) {
            ?>
            <div class="noLogin fr">
                <a href="http://login.gmatonline.cn/cn/index?source=11&url=<?php echo Yii::$app->request->hostInfo.Yii::$app->request->getUrl()?>">登录</a>
                <span class="fg_line inm"></span>
                <a href="http://login.gmatonline.cn/cn/index/register?source=11&url=<?php echo Yii::$app->request->hostInfo.Yii::$app->request->getUrl()?>">注册</a>
            </div>
            <?php
        } else {
            ?>
            <!--已登录-->
            <div class="yesLogin fr">
                <a href="/order.html">
                <div class="common_user_head inm"><img src="<?php echo $userData['image']?$userData['image']:'/cn/images/details_defaultImg.png'?>" alt=""></div>
                <span class="header_username inm"><?php echo $userData['username']?></span>
                </a>
            </div>
            <?php
        }
        ?>
    </div>
</section>
<!--搜索栏-->
<section id="search_wrap" class="bg_f">
    <div class="w12">
        <div class="clearfix">
            <div class="leige_logo fl">
                <a href="/">
                    <img src="/cn/images/logo.png" alt="">
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
                        <a href="#"><img src="/cn/images/erm_1.png" alt=""></a>
                    </div>
                    <p class="erm_de">雷哥GMATAPP</p>
                </div>
                <div class="int sint_el">
                    <div class="erm_k"><img src="/cn/images/erm_2.png" alt=""></div>
                    <p class="erm_de">雷哥托福APP</p>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function addCart(id,type){
        $.post("/cn/api/add-cart",{id:id,type:type},function(re){
            if(re.code == 1){
                alert('加入购物车');
            }
        },'json')
    }

    function toBuy(id,type){
        $.post("/cn/api/to-buy",{id:id,type:type},function(re){
            if(re.code == 1){
                location.href= "http://order.gmatonline.cn/pay/order?data="+re.data;
            }
        },'json')
    }
</script>