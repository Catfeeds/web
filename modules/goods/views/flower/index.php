

<div class="span10" id="datacontent">

    <ul class="breadcrumb">
        <li><a href="">分类模块</a></li>
    </ul>
    <ul class="nav">
        <li class="dropdown pull-right">
            <a class="dropdown-toggle" href="/goods/flower/add">添加鲜花</a>
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
                <th>排序</th>
                <th>ID</th>
                <th>名称</th>
                <th>编号</th>
                <th>分类</th>
                <th>价格</th>
                <th>状态</th>
                <th >操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($data as $v) {
                ?>
                <tr>
                    <td><span><input style="width: 30px;" type="text" onkeyup="changeSort(<?php echo $v['id']?>,'flower',this)" value="<?php echo $v['sort']?>" name="sort"></span></td>
                    <td><span><?php echo $v['id']?></span></td>
                    <td><span><?php echo $v['name']?></span></td>
                    <td><span><?php echo $v['goodsNumber']?></span></td>
                    <td><span><?php echo $v['catName']?></span></td>
                    <td><span><?php echo $v['price']?></span></td>
                    <td><span><?php echo $v['status']==1?'下架':'上架'?></span></td>
                    <td><span><a href="/goods/flower/flower-status?id=<?php echo $v['id']?>"><?php echo $v['status']==1?'上架':'下架'?></a> <a href="javascript:;" onclick="flowerUpdate(<?php echo $v['status'];?>,<?php echo $v['id'];?>)">修改</a></span></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
        <input type="hidden" name="url" value="<?php echo Yii::$app->request->getUrl()?>">

    </form>
    <div class="pagination pagination-right">
        <?php use yii\widgets\LinkPager;?>
        <?php echo LinkPager::widget([
            'pagination' => $pageStr,
        ])?>
    </div>
</div>

<script type="text/javascript">
    function flowerUpdate(_status,_id){
        if(_status==2){
            alert("请先下架");
        }else{
            location.href="/goods/flower/update?id="+_id;
        }
    }
</script>
