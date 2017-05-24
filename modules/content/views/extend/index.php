
<div class="span10" id="datacontent">

    <ul class="breadcrumb">
        <li><a href="">内容模块</a></li>
    </ul>
    <ul class="nav">
        <li class="dropdown pull-right">
            <a class="dropdown-toggle" href="/content/extend/add">添加属性</a>
        </li>
    </ul>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="javascript:;" >类型属性</a>
        </li>
    </ul>
    <form action="/content/top/sort" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th>排序</th>
                <th>ID</th>
                <th>名称</th>
                <th>值</th>
                <th>类型</th>
                <th >操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($extend as $v) {
                ?>
                <tr>
                    <td><span><input style="width: 30px;" type="text" onkeyup="changeSort(<?php echo $v['id']?>,'extend',this)" value="<?php echo $v['sort']?>" name="sort"></span></td>

                    <td><span><?php echo $v['id']?></span></td>
                    <td><span><?php echo $v['name']?></span></td>
                    <td><span><?php echo $v['value']?></span></td>
                    <td><span><?php echo $v['type']?></span></td>
                    <td><span> <a href="/content/extend/update?id=<?php echo $v['id']?>">修改</a> <a href="/content/extend/delete?id=<?php echo $v['id']?>">删除</a></span></td>
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

