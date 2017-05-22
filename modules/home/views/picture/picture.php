
<div class="span10" id="datacontent">

    <ul class="breadcrumb">
        <li><a href="">分类模块</a></li>
    </ul>
    <ul class="nav">
        <li class="dropdown pull-right">
            <a class="dropdown-toggle" href="/home/picture/add">添加轮播图</a>
        </li>
    </ul>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="javascript:;" >鲜花管理</a>
        </li>
    </ul>
    <form action="/content/content/sort" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th>ID</th>
                <th>图片</th>
                <th>链接</th>
                <th>创建时间</th>
                <th >操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($picture as $v) {
                ?>
                <tr>
                    <td><span><?php echo $v['id']?></span></td>
                    <td><span><img height="10" width="100" src="<?php echo $v['image']?>"></span></td>
                    <td><span><?php echo $v['url']?></span></td>
                    <td><span><?php echo date("Y-m-d",$v['createTime'])?></span></td>
                    <td><span> <a href="/home/picture/update?id=<?php echo $v['id']?>">修改</a> <a href="/home/picture/delete?id=<?php echo $v['id']?>">删除</a></span></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
        <input type="hidden" name="url" value="<?php echo Yii::$app->request->getUrl()?>">

    </form>
    <div class="pagination pagination-right">
    </div>
</div>

