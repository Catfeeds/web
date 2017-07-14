<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="title" content="网校后台在线后台">
    <meta name="description" content="网校后台在线后台">
    <meta name="keywords" content="网校后台在线后台">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>网校后台</title>
    <!-- Le styles -->
    <link href="/css/coreCss/bootstrap-combined.min.css" rel="stylesheet">
    <link href="/css/coreCss/layoutit.css" rel="stylesheet">
    <link href="/css/coreCss/plugin.css" rel="stylesheet">
    <script type="text/javascript" src="/easyui/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="/easyui/jquery.min.js"></script>
</head>
<body>

<div class="navbar navbar-inverse">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a href="/" target="_blank" class="brand"><img src="/css/coreCss/img/favicon.png">512花店</a>
            <div class="nav-collapse navbar-responsive-collapse collapse">
                <ul class="nav">
                    <li class="<?php if (Yii::$app->controller->id == 'category') echo 'active'?>">
                        <a href="/basic/category/purpose">分类模块</a>
                    </li>
                    <li class="<?php if (Yii::$app->controller->id == 'flower') echo 'active'?>">
                        <a href="/flower/flower/index">鲜花模块</a>
                    </li>
                </ul>
                <ul class="nav pull-right">
                    <li>
                        <a href="/user/login/login-out">退出管理</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
            <ul class="nav nav-tabs nav-stacked">
                <li class="<?php if (Yii::$app->controller->action->id == 'purpose') echo 'active'?>">
                    <a href="/basic/category/purpose">用途管理</a>
                </li>
                <li class="<?php if (Yii::$app->controller->action->id == 'flower') echo 'active'?>">
                    <a href="/basic/category/flower">花材管理</a>
                </li>
                <li class="<?php if (Yii::$app->controller->action->id == 'object') echo 'active'?>">
                    <a href="/basic/category/object">对象管理</a>
                </li>
                <li class="<?php if (Yii::$app->controller->action->id == 'flower-num') echo 'active'?>">
                    <a href="/basic/category/flower-num">支数管理</a>
                </li>
                <li class="<?php if (Yii::$app->controller->action->id == 'price-category') echo 'active'?>">
                    <a href="/basic/category/price-category">价格管理</a>
                </li>
            </ul>
        </div>

<div class="span10" id="datacontent">

    <ul class="breadcrumb">
        <li><a href="">分类模块</a></li>
    </ul>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="javascript:;" >对象管理</a>
        </li>
    </ul>
    <form action="/content/content/sort" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th>ID</th>
                <th>名称</th>
                <th >操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($object as $v) {
                ?>
                <tr>
                    <td><span><?php echo $v['id']?></span></td>
                    <td><span><?php echo $v['name']?></span></td>
                    <td><span><a href="">修改</a> <a href>删除</a></span></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
        <input type="hidden" name="url" value="<?php echo Yii::$app->request->getUrl()?>">

    </form>
    <div class="pagination pagination-right">
    <div class="pagination pagination-right">
        <ul></ul>
    </div>
</div>
    </div>
</div>
</body>
</html>
