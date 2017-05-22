
<div class="span10" id="datacontent">

    <ul class="breadcrumb">
        <li><a href="">分类模块</a></li>
    </ul>
    <ul class="nav">
        <li class="dropdown pull-right">
            <a class="dropdown-toggle" href="/home/top/add">添加排行榜</a>
        </li>
    </ul>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="javascript:;" >排行榜管理</a>
        </li>
    </ul>
    <form action="/content/top/sort" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th>排序</th>
                <th>ID</th>
                <th>名称</th>
                <th>图片</th>
                <th>价格</th>
                <th>链接</th>
                <th>数量</th>
                <th>鲜花Id</th>
                <th>创建时间</th>
                <th >操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($top as $v) {
                ?>
                <tr>
                    <td><span><input style="width: 30px;" type="text" onkeyup="changeSort(<?php echo $v['id']?>,'top',this)" value="<?php echo $v['sort']?>" name="sort"></span></td>
                    <td><span><?php echo $v['id']?></span></td>
                    <td><span><?php echo $v['name']?></span></td>
                    <td><span><img height="10" width="100" src="<?php echo $v['image']?>"></span></td>
                    <td><span><?php echo $v['price']?></span></td>
                    <td><span><?php echo $v['url']?></span></td>
                    <td><span><?php echo $v['number']?></span></td>
                    <td><span><?php echo $v['flowerId']?></span></td>
                    <td><span><?php echo date("Y-m-d",$v['createTime'])?></span></td>
                    <td><span> <a href="/home/top/update?id=<?php echo $v['id']?>">修改</a> <a href="/home/top/delete?id=<?php echo $v['id']?>">删除</a></span></td>
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

