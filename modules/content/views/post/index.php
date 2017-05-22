<script type="text/javascript" src="/My97DatePicker/WdatePicker.js"></script>
<div class="row control-tit wrapper border-bottom white-bg">
    <span>帖子管理</span>
    <a class="addRole" href="/content/post/add">添加帖子</a>
</div>
<div class="wrapper wrapper-content">
    <form action="/content/post/index" method="get">
        <div>
            用户UID：<input type="text" name="uid" value="<?php echo isset($_GET['uid'])?$_GET['uid']:'' ?>">
            标题：<input type="text" name="title" value="<?php echo isset($_GET['title'])?$_GET['title']:'' ?>">
            时间：<input type="text" class="input-small Wdate" onclick="WdatePicker()" size="10"  name="beginTime" value="<?php echo isset($_GET['beginTime'])?$_GET['beginTime']:'' ?>">--<input class="input-small Wdate" onclick="WdatePicker()"  size="10" type="text" name="endTime" value="<?php echo isset($_GET['endTime'])?$_GET['endTime']:'' ?>">
            分类：<input name="type" class="easyui-combotree" value="<?php echo isset($_GET['type'])?$_GET['type']:'' ?>" data-options="url:'/content/api/tree?pid=0&id=<?php echo $parent['id'] ?>',method:'get'" style="width:200px;">
            <input type="submit" value="搜索">
        </div>
    </form>
    <div>
        <table class="table-container" style="width: 100%">
            <th>用户ID</th>
            <th>标题</th>
            <th>图片</th>
            <th>发帖时间</th>
            <th>分类</th>
            <th>热门</th>
            <th>操作</th>
            <?php foreach($data['data'] as $v){ ?>
                <tr>
                    <td><?php echo $v['uid'] ?></td>
                    <td><?php echo $v['title'] ?></td>
                    <td><?php echo $v['imageContent'] ?></td>
                    <td><?php echo date('Y-m-d H:i:s',$v['createTime']) ?></td>
                    <td><?php echo $v['class'] ?></td>
                    <td><?php if($v['hot']==1){ ?><a href="/content/post/hot?id=<?php echo $v['id'] ?>">取消热门</a><?php }else{ ?><a href="/content/post/hot?id=<?php echo $v['id'] ?>">设置热门</a><?php } ?></td>
                    <td><a href="/content/post/post-reply?id=<?php echo $v['id'] ?>">查看回复</a>---<a href="/content/post/update?id=<?php echo $v['id'] ?>">修改</a>---<a href="/content/post/delete?id=<?php echo $v['id'] ?>">删除</a> </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <div>
            <ul>
                <?php echo  $data['pageStr'] ?>
            </ul>
        </div>
    </div>
</div>

