<!DOCTYPE html>
<html>
<head>
    <title>购物车页面</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="/cn/css/public.css"/>
    <link rel="stylesheet" href="/cn/css/shoppingCart.css"/>
    <link rel="stylesheet" href="/cn/css/reset.css">
    <link rel="stylesheet" href="/cn/css/common.css">
    <link rel="stylesheet" href="/cn/css/main.css">
    <link rel="stylesheet" href="/cn/css/font-awesome.min.css">
    <script type="text/javascript" src="/cn/js/jquery-1.12.2.min.js"></script>
    <script type="text/javascript" src="/cn/js/shoppingCart.js"></script>
</head>
<body>
<?php use app\commands\front\NavWidget; ?>
<?php NavWidget::begin(); ?>
<?php NavWidget::end(); ?>
<div class="shoppingCont">
    <h4>全部商品 <span>12</span></h4>
    <span class="right-grey">已选商品（不含运费）0.00</span>
    <div class="catContent">
        <table cellspacing="0">
            <tr>
                <th>
                    <input type="checkbox" name="checkBox" id="allCheck"/><label for="allCheck">全选</label>
                </th>
                <th>商品</th>
                <th>单价（元）</th>
                <th>数量</th>
                <th>小计（元）</th>
                <th>操作</th>
            </tr>
            <?php
                foreach($data as $v) {
                    ?>
                    <tr>
                        <td><input data-id="<?php echo $v['id']?>" data-type="<?php echo $v['type']?>" type="checkbox"/></td>
                        <td>
                            <div class="cat-left">
                                <img src="<?php echo $v['image']?>" alt="商品图片"/>
                            </div>
                            <div class="cat-right">
                                <h3><?php echo $v['name']?></h3>
                                <span><?php echo date("Y-m-d H:i:s",$v['createTime'])?></span>
                            </div>
                            <div style="clear: both"></div>
                        </td>
                        <td><span>￥<span><?php echo $v['price']?></span></span></td>
                        <td>
                            <div class="calculate">
                                <input type="button" value="-" class="subtract" data-id="<?php echo $v['id']?>" data-type="<?php echo $v['type']?>" onclick="subFun(this)"/>
                                <span><?php echo $v['num']?></span>
                                <input type="button" value="+" class="add" data-id="<?php echo $v['id']?>" data-type="<?php echo $v['type']?>" onclick="addFun(this)"/>
                            </div>
                        </td>
                        <td><b class="subtotal">￥<span><?php echo $v['num']*$v['price']?></span></b></td>
                        <td>
                            <a href="/goods/<?php echo $v['id']?>/<?php echo $v['type']?>.html">商品详情</a>
                            <a href="#" class="redColor" data-id="<?php echo $v['id']?>" data-type="<?php echo $v['type']?>" onclick="deleteRecord(this)">删除记录</a>
                        </td>
                    </tr>
                <?php
                }
 ?>

        </table>
        <div class="bottomInfo">
            <div class="info-left">
                <input type="checkbox" name="checkBox" id="allC"/><label for="allC">全选</label>
                <span onclick="deleteChecked()">删除选中的商品</span>
            </div>
            <div class="info-right">
                <span>已选商品<b class="redFont" id="piece">0</b>件</span>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;合计：<b class="redFont"><span>￥<span id="lastTotal">0</span></span></b></span>
                <input type="button" value="结算"/>
            </div>
            <div style="clear: both"></div>
        </div>
    </div>
</div>

</body>
</html>