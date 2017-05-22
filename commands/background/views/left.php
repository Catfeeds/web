
<ul class="nav nav-tabs nav-stacked">
<?php $module = Yii::$app->controller->module->id;
    $controller = Yii::$app->controller->id;
?>
    <?php
        if($module == 'content') {
            ?>
            <li>
                <a href="/content/category/index">鲜花分类</a>
            </li>
            <li>
                <a href="/content/basket/index">花篮分类</a>
            </li>
            <li>
                <a href="/content/cake/index">蛋糕分类</a>
            </li>
        <?php
        }
    ?>
    <?php
    if($module == 'goods') {
        ?>
        <li>
            <a href="/goods/flower/index">鲜花管理</a>
        </li>
        <li>
            <a href="/goods/basket/index">花篮管理</a>
        </li>
        <li>
            <a href="/goods/cake/index">蛋糕管理</a>
        </li>
    <?php
    }
    ?>
    <?php
    if($module == 'home') {
        ?>
        <li>
            <a href="/home/picture/picture">轮播图管理</a>
        </li>
        <li>
            <a href="/home/recommend/index">推荐管理</a>
        </li>
        <li>
            <a href="/home/module/index">模块管理</a>
        </li>
        <li>
            <a href="/home/navigation/index">顶部导航</a>
        </li>
        <li>
            <a href="/home/stick/index">置顶图片</a>
        </li>
        <li>
            <a href="/home/top/index">排行榜</a>
        </li>
        <li>
            <a href="/home/especially/index">推荐分类</a>
        </li>
        <li>
            <a href="/home/keywords/index">底部关键字</a>
        </li>
        <li>
            <a href="/home/bottom/index">搜索栏底部连接</a>
        </li>
        <li>
            <a href="/home/phone/index">联系电话</a>
        </li>
        <li>
            <a href="/home/about/index">了解我们</a>
        </li>
        <li>
            <a href="/home/append/index">附件组件</a>
        </li>
        <li>
            <a href="/home/feast/index">节日特价</a>
        </li>
        <li>
            <a href="/home/hot-sell/index">热销推荐</a>
        </li>
    <?php
    }
    ?>
</ul>
