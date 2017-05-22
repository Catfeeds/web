
<div class="span10" id="datacontent">

    <ul class="breadcrumb">
        <li><a href="">设置模块</a></li>
    </ul>
    <ul class="nav">
        <li class="dropdown pull-right">
            <a class="dropdown-toggle" href="/home/feast/add">添加节日特价</a>
        </li>
    </ul>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="javascript:;" >节日特价</a>
        </li>
    </ul>
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th>ID</th>
                <th>名称</th>
                <th>折扣</th>
                <th>开始时间</th>
                <th>结束时间</th>
                <th>类型</th>
                <th>创建时间</th>
                <th >操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($feast as $v) {
                ?>
                <tr>
                    <td><span><?php echo $v['id']?></span></td>
                    <td><span><?php echo $v['name']?></span></td>
                    <td><span><?php echo $v['percent']?></span></td>
                    <td><span><?php echo date("Y-m-d H:i:s",$v['startTime'])?></span></td>
                    <td><span><?php echo date("Y-m-d H:i:s",$v['endTime'])?></span></td>
                    <td><span><?php echo $v['type']?></span></td>
                    <td><span><?php echo date("Y-m-d",$v['createTime'])?></span></td>
                    <td><span> <a href="/home/feast/update?id=<?php echo $v['id']?>">修改</a> <a href="/home/feast/delete?id=<?php echo $v['id']?>">删除</a></span></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    <div class="pagination pagination-right">
    </div>
</div>

