

<div class="span10" id="datacontent">

    <ul class="breadcrumb">
        <li><a href="">信息采集</a></li>
    </ul>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="javascript:;" >领取课程用户信息</a>
        </li>
    </ul>
    <form action="/content/content/sort" method="post">
        <table class="table table-hover add_defined">
            <thead>
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>电话号码</th>
                <th>领取时间</th>
                <th >操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($data as $v) {
                ?>
                <tr>
                    <td><span><?php echo $v['name']?></span></td>
                    <td><span><?php echo $v['phone']?></span></td>
                    <td><span><?php echo $v['createTime']?></span></td>
                    <td><span><a href="javascript:;" >删除</a></span></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>

    </form>
    <div class="pagination pagination-right">
        <?php use yii\widgets\LinkPager;?>
        <?php echo LinkPager::widget([
            'pagination' => $page,
        ])?>
    </div>
</div>

