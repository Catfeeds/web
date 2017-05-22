

<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="">页面模块</a></li>
    </ul>

    <form action="/home/module/add-flower/" method="get" class="form-horizontal">
        <table class="table">
            <tr>
                <td>
                    鲜花ID：
                </td>
                <td>
                    <input name="flowerId" class="input-small" size="25" type="text" class="number" value="<?php echo isset($_GET['flowerId'])?$_GET['flowerId']:''?>"/>
                </td>
                <td>
                    录入时间：
                </td>
                <td>
                    <input class="input-small Wdate" onclick="WdatePicker()" type="text" size="10"  name="beginTime" value="<?php echo isset($_GET['beginTime'])?$_GET['beginTime']:''?>"/> - <input class="input-small Wdate" onclick="WdatePicker()"  size="10" type="text" name="endTime"  value="<?php echo isset($_GET['endTime'])?$_GET['endTime']:''?>"/>
                </td>
                <td>
                    鲜花名称：
                </td>
                <td>
                    <input name="name" class="input-small" size="25" type="text" class="name" value="<?php echo isset($_GET['name'])?$_GET['name']:''?>"/>
                </td>
                <input name="id" class="input-small" size="25" type="hidden" value="<?php echo $id?>"/>
            </tr>
            <tr>
                <td>
                    <button class="btn btn-primary" type="submit">提交</button>
                </td>
                <td></td>
            </tr>
        </table>
    </form>
    <form action="/content/content/sort" method="post">
        <table border="1"class="table table-hover add_defined">
            <thead>
            <tr>
                <th>ID</th>
                <th>名称</th>
                <th>编号</th>
                <th>分类</th>
                <th>价格</th>
                <th >操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($allFlower as $v) {
                ?>
                <tr>
                    <td><span><?php echo $v['id']?></span></td>
                    <td><span><?php echo $v['name']?></span></td>
                    <td><span><?php echo $v['goodsNumber']?></span></td>
                    <td><span><?php echo $v['catName']?></span></td>
                    <td><span><?php echo $v['price']?></span></td>
                    <td><span><a href="javascript:;" onclick="addModuleFlower(<?php echo $id?>,<?php echo $v['id']?>)">加入</a>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
        <script type="text/javascript">
            function addModuleFlower(moduleId,flowerId){
                $.post("/home/api/add-module-flower",{moduleId:moduleId,flowerId:flowerId},function(re){
                    if(re.code == 1){
                        location.reload();
                    }else{
                        alert("加入失败");
                    }
                },"json")
            }
        </script>
        <input type="hidden" name="url" value="<?php echo Yii::$app->request->getUrl()?>">
    </form>
    <div class="pagination pagination-right">
        <?php use yii\widgets\LinkPager;?>
        <?php echo LinkPager::widget([
            'pagination' => $pageStr,
        ])?>
    </div>
    <div style="height:20px;background: rosybrown"></div>

    <table border="1" class="table table-hover add_defined">
            <thead>
            <tr>
                <th>ID</th>
                <th>鲜花ID</th>
                <th>名称</th>
                <th>编号</th>
                <th>分类</th>
                <th>价格</th>
                <th >操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($data as $v) {
                ?>
                <tr>
                    <td><span><?php echo $v['mid']?></span></td>
                    <td><span><?php echo $v['id']?></span></td>
                    <td><span><?php echo $v['name']?></span></td>
                    <td><span><?php echo $v['goodsNumber']?></span></td>
                    <td><span><?php echo $v['catName']?></span></td>
                    <td><span><?php echo $v['price']?></span></td>
                    <td><span><a href="javascript:;" onclick="deleteModuleFlower(<?php echo $v['mid']?>)">删除</a>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
        <script type="text/javascript">
            function deleteModuleFlower(id){
                $.post("/home/api/delete-module-flower",{id:id},function(re){
                    if(re.code == 1){
                        location.reload();
                    }else{
                        alert("加入失败");
                    }
                },"json")
            }
        </script>
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
