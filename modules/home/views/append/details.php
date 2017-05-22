
<div class="span10" id="datacontent">

    <ul class="breadcrumb">
        <li><a href="">设置模块</a></li>
    </ul>
    <ul class="nav">
        <li class="dropdown pull-right">
            <a class="dropdown-toggle" href="/home/append/add-details?id=<?php echo $id?>">添加详情</a>
        </li>
    </ul>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="javascript:;" >附件组件详情</a>
        </li>
    </ul>
    <form action="/content/top/sort" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th>排序</th>
                <th>ID</th>
                <th>名称</th>
                <th>价格</th>
                <th>创建时间</th>
                <th >操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($appendDetails as $v) {
                ?>
                <tr>
                    <td><span><input style="width: 30px;" type="text" onkeyup="changeSort(<?php echo $v['id']?>,'append_details',this)" value="<?php echo $v['sort']?>" name="sort"></span></td>
                    <td><span><?php echo $v['id']?></span></td>
                    <td><span><?php echo $v['name']?></span></td>
                    <td><span><?php echo $v['price']?></span></td>
                    <td><span><?php echo date("Y-m-d",$v['createTime'])?></span></td>
                    <td><span><a href="/home/append/update-details?id=<?php echo $v['id']?>">修改</a> <a href="/home/append/delete-details?id=<?php echo $v['id']?>">删除</a></span></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </form>
    <div class="pagination pagination-right">
    </div>
</div>

