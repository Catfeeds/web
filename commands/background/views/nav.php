
<div class="navbar navbar-inverse">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a href="/" target="_blank" class="brand"><img src="/css/coreCss/img/favicon.png">小申教育</a>
            <div class="nav-collapse navbar-responsive-collapse collapse">
                <ul class="nav">
                    <ul class="nav">
                        <li class="<?php if (Yii::$app->controller->module->id == 'content') echo 'active'?>">
                            <a href="/content/category/index">分类模块</a>
                        </li>
                        <li class="<?php if (Yii::$app->controller->module->id == 'goods') echo 'active'?>">
                            <a href="/goods/goods/index?type=1">商品模块</a>
                        </li>
                        <li class="<?php if (Yii::$app->controller->module->id == 'home') echo 'active'?>">
                            <a href="/home/picture/picture">设置模块</a>
                        </li>
                        <li class="<?php if (Yii::$app->controller->module->id == 'collection') echo 'active'?>">
                            <a href="/collection/collection/index">信息采集</a>
                        </li>
                    </ul>
                </ul>
                <ul class="nav pull-right">
                    <li>
                        <a href="/basic/index/index" >后台首页</a>
                    </li>
                    <li>
                        <a href="/user/login/html">生成静态页</a>
                    </li>
                    <li>
                        <a href="/user/login/login-out">退出管理</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>

