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
    <script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>
    <script type="text/javascript" src="/easyui/jquery.min.js"></script>
    <script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>
    <!-- 编辑器公式插件 -->
    <!-- 树形菜单选择 -->
    <link rel="stylesheet" type="text/css" href="/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="/easyui/themes/icon.css">
    <script type="text/javascript" src="/easyui/jquery.easyui.min.js"></script>
</head>
<body>
<?php use app\commands\background\NavWidget;?>
<?php NavWidget::begin();?>
<?php NavWidget::end();?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
        <?php use app\commands\background\LeftWidget;?>
        <?php LeftWidget::begin();?>
        <?php LeftWidget::end();?>
        <!-- $content变量的值 就是子页面渲染之后的代码。也就是说子页面中的内容将输出到这个地方-->
        </div>
        <?= $content ?>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    function changeSort(_id,_table,_this){
        var sort = $(_this).val();
        $.post("/home/api/change-sort",{id:_id,table:_table,sort:sort},function(re){
            if(re.code == 0){
                alert('排序失败')
            }
        },'json')
    }
</script>

