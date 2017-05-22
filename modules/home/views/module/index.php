

<div class="span10" id="datacontent">

    <ul class="breadcrumb">
        <li><a href="/head/module/index">设置模块</a></li>
    </ul>
    <ul class="nav">
        <li class="dropdown pull-right">
            <a class="dropdown-toggle" href="/home/module/add">添加模块</a>
        </li>
    </ul>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="javascript:;" >模块列表</a>
        </li>
    </ul>
    <form action="/content/content/sort" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th>排序</th>
                <th>ID</th>
                <th>名称</th>
                <th>位置</th>
                <th>状态</th>
                <th>创建时间</th>
                <th >操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($data as $v) {
                ?>
                <tr>
                    <td><span><input style="width: 30px;" type="text" onkeyup="changeSort(<?php echo $v['id']?>,'modules',this)" value="<?php echo $v['sort']?>" name="sort"></span></td>
                    <td><span><?php echo $v['id']?></span></td>
                    <td><span><?php echo $v['name']?></span></td>
                    <td><span><?php
                            if( $v['location'] == 1) {echo "上";}
                            elseif($v['location'] == 2){ echo "下";}
                            else{echo "中";}
                            ?></span></td>
                    <td><span><?php echo $v['status'] == 1?"上线":"下线"?></span></td>
                    <td><span><?php echo date("Y-m-d",$v['createTime'])?></span></td>
                    <td><span><a href="/home/module/status?id=<?php echo $v['id']?>"><?php echo $v['status'] == 1?"下线":"上线"?></a> <a href="/home/module/add-flower?id=<?php echo $v['id']?>">添加商品</a> <a href="/home/module/add-category?id=<?php echo $v['id']?>">添加链接分类</a>
                           <a href="/home/module/update?id=<?php echo $v['id']?>">修改</a> <a href="/home/module/delete?id=<?php echo $v['id']?>">删除</a></span></td>
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

