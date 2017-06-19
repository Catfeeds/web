

<div class="span10" id="datacontent">

    <ul class="breadcrumb">
        <li><a href="">商品模块</a></li>
    </ul>
    <ul class="nav">
        <li class="dropdown pull-right">
            <a class="dropdown-toggle" href="/goods/goods/add">添加商品</a>
        </li>
    </ul>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="javascript:;" >商品管理</a>
        </li>
    </ul>
    <form action="/goods/goods/index/" method="get" class="form-horizontal">
        <table class="table">
            <tr>
                <td>
                    分类：
                </td>
                <td>
                    <select style="width: 400px" id="contentcatid" msg="您必须选择一个分类"
                            url='/content/api/pid?type=<?php echo $_GET['type']?>'
                            class="main autocombox input-medium easyui-combotree">
                    </select><br/><br/>
                    <input type="hidden" name="catId" value="<?php echo isset($_GET['catId'])?$_GET['catId']:''?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="type" value="<?php echo $_GET['type']?>">
                    <button class="btn btn-primary" type="submit">提交</button>
                </td>
                <td></td>
            </tr>
        </table>
    </form>
    <form action="/content/content/sort" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th>排序</th>
                <th>ID</th>
                <th>名称</th>
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
                    <td><span><input style="width: 30px;" type="text" onkeyup="changeSort(<?php echo $v['id']?>,'<?php echo $table?>',this)" value="<?php echo $v['sort']?>" name="sort"></span></td>
                    <td><span><?php echo $v['id']?></span></td>
                    <td><span><?php echo $v['name']?></span></td>
                    <td><span><?php echo $v['catName']?></span></td>
                    <td><span><?php echo $v['price']?></span></td>
                    <td><span><?php echo $v['status']==1?'下架':'上架'?></span></td>
                    <td><span><a href="/goods/goods/goods-status?id=<?php echo $v['id']?>"><?php echo $v['status']==1?'上架':'下架'?></a> <a href="javascript:;" onclick="flowerUpdate(<?php echo $v['status'];?>,<?php echo $v['id'];?>)">修改</a> <a href="/goods/goods/video?id=<?php echo $v['id']?>&type=<?php echo $_GET['type'] ?>">SDK</a></span></td>
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
    <?php
if(isset($_GET['catId'])){
?>
    $('.main').tree({
        onLoadSuccess: function (newValue, oldValue) {
            $('.main').combotree('setValue', <?php echo $_GET['catId']?>);
        }
    })
    <?php
    }
    ?>
    function flowerUpdate(_status,_id){
        if(_status==2){
            alert("请先下架");
        }else{
            location.href="/goods/goods/update?id="+_id;
        }
    }

    $('.main').combotree({
        onClick: function (node) {
            $("input[name='catId']").val(node.id);
        }
    })
</script>

