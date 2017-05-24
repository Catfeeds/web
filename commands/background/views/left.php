
<ul class="nav nav-tabs nav-stacked">
<?php $module = Yii::$app->controller->module->id;
    $controller = Yii::$app->controller->id;
?>
    <?php
        if($module == 'content') {
            ?>
            <li>
                <a href="/content/category/index">分类管理</a>
            </li>
            <li>
                <a href="/content/extend/index">类别属性</a>
            </li>
        <?php
        }
    ?>
    <?php
    if($module == 'goods') {
        ?>
        <li>
            <a href="/goods/goods/index?type=1">课程管理</a>
        </li>
        <li>
            <a href="/goods/goods/index?type=2">留学</a>
        </li>
        <li>
            <a href="/goods/goods/index?type=3">英语</a>
        </li>
        <li>
            <a href="/goods/goods/index?type=4">书籍</a>
        </li>
        <li>
            <a href="/goods/goods/index?type=5">会员</a>
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
            <a href="/home/hot-sell/index">促销活动</a>
        </li>
    <?php
    }
    ?>
</ul>
