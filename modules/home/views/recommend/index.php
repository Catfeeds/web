<div class="span10" id="datacontent">

    <ul class="breadcrumb">
        <li><a href="">首页模块</a></li>
    </ul>
    <ul class="nav">
        <li class="dropdown pull-right">
            <a class="dropdown-toggle" href="/home/recommend/add">添加推荐商品</a>
        </li>
    </ul>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="javascript:;" >顶部模块</a>
        </li>
    </ul>
    <form action="/content/content/sort" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th>ID</th>
                <th>花名</th>
                <th>鲜花ID</th>
                <th >操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($recommend as $v) {
                ?>
                <tr>
                    <td><span><?php echo $v['id']?></span></td>
                    <td><span><?php echo $v['name']?></span></td>
                    <td><span><?php echo $v['flowerId']?></span></td>
                    <td><span> <a href="/home/recommend/update?id=<?php echo $v['id']?>">修改</a> <a href="/home/recommend/delete?id=<?php echo $v['id']?>">删除</a></span></td>
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