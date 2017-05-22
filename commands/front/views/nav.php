<div id="topbar">
    <div id="top">
        <div class="welcome">欢迎来到花间意鲜花店，12年老牌花店，品质有保障！</div>
        <div class="topnav">
            <a href="login.html">您好，请登录</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="register.html">免费注册</a>
            <a href="#" target="_blank">我的账户</a><em>|</em>
            <a href="#" target="_blank" class="cart">购物车<strong><span id="cart_nmb">0</span></strong>件</a><em>|</em>
            <a href="#" target="_blank">订单查询</a><em>|</em>
            <a href="#" target="_blank">付款方式</a><em>|</em>
            <a href="#" target="_blank">订单补款</a><em>|</em>
            <a href="#" target="_blank">帮助中心</a><em>|</em>
            <a href="#" target="_blank">祝福语大全</a>
        </div>
    </div>
</div>

<div id="header">
    <div class="logo"><a href="#"><img src="/cn/images/logo.png" alt="中国鲜花快递网"></a></div>
    <div class="header_right"></div>
    <div class="search">
        <form name="form1" method="post" action="#">
            <span class="search-icon"></span>
            <input name="sch" type="text" class="sch"
                   onfocus="if (this.value==this.defaultValue) this.value='';"
                   onblur="if (this.value=='') this.value=this.defaultValue;" value="请输入花束名称或编号">
            <input class="btn" type="submit" name="Submit2" value="搜索">
        </form>
        <span><?php
                foreach($bottom as $k => $v) {
                    ?>
                    <?php echo $v['name']?><?php echo $k != (count($bottom)-1)?' | ':'' ?>
                <?php
                }
            ?>
        </span>
    </div>
</div>
<div class="nav-top-word"> <span>市(县)级城区最快1小时送达，郊区(乡镇)3小时内送达！</span></div>
<div id="mainnav_wrap">
    <div id="mainnavbar">
        <div class="mainnav">
            <ul>
                <li class="first"><a href="javascript:;" target="_blank">全部鲜花分类</a></li>
                <li><a class="hot" href="/"><span></span><b>首页</b></a></li>
                <?php
                    foreach($navigation as $v) {
                        ?>
                        <li><a href="<?php echo $v['url']?>" target="_blank"><?php echo $v['name']?></a></li>
                    <?php
                    }
                ?>
            </ul>
        </div>
        <div class="main-r-zixun">
            <img src="/cn/images/index-phone.png" alt="电话图标"/>
            <span><?php echo $phone['phone']?></span>
            <a href="#">
                <img src="/cn/images/index-zixun.png" alt="咨询图标"/>
                <span>在线咨询</span>
            </a>
        </div>
    </div>
</div>
<div id="menuarea">