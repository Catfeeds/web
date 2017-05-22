<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="title" content="小申教育在线后台">
    <meta name="description" content="小申教育在线后台">
    <meta name="keywords" content="小申教育在线后台">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>小申教育</title>
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
                    <ul class="nav">
                        <li class="<?php if (Yii::$app->controller->id == 'category') echo 'active'?>">
                            <a href="/basic/category/purpose">分类模块</a>
                        </li>
                        <li class="<?php if (Yii::$app->controller->id == 'flower') echo 'active'?>">
                            <a href="/flower/flower/index">鲜花模块</a>
                        </li>
                    </ul>
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
    <div class="span10" id="datacontent">

    <ul class="breadcrumb">
        <li class="active">添加分类</li>
    </ul>


<form action="/basic/category/add" method="post" class="form-horizontal">
    <fieldset>
        <div class="control-group">
        <label for="modulename" class="control-label">分类名称</label>
            <div class="controls">
                <input type="text" id="input1" name="name" value="<?php echo isset($data['name'])?$data['name']:''?>" datatype="userName" needle="needle" msg="您必须输入中英文字符的分类名称">
                <span class="help-block">请输入模块名称</span>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <input name="id" type="hidden" value="<?php echo isset($id) ? $id : '' ?>">
                <input name="type" type="hidden" value="<?php echo $type ?>">
                <input name="typeName" type="hidden" value="<?php echo $typeName ?>">
                <input type="submit" class="btn btn-primary" value="提交">
            </div>
        </div>
    </fieldset>
</form>
</div>

</div>
</div>
</body>
</html>
