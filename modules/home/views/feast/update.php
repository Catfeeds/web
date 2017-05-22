
        <div class="span10" id="datacontent">
            <ul class="breadcrumb">
                <li class="active">添加轮播图</li>
            </ul>
            <form action="/home/feast/update" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label for="modulename" class="control-label">名称</label>
                        <div class="controls">
                            <input type="text" id="input1" value="<?php echo $data['name']?>" name="data[name]">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">折扣</label>
                        <div class="controls">
                            <input type="text" id="input1" value="<?php echo $data['percent']?>" name="data[percent]">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">开始时间</label>
                        <div class="controls">
                            <input type="text" value="<?php echo date("Y-m-d H:i:s",$data['startTime'])?>" class="Wdate" onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" id="input1" name="data[startTime]">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">结束时间</label>
                        <div class="controls">
                            <input type="text" value="<?php echo date("Y-m-d H:i:s",$data['endTime'])?>" class="Wdate" onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" id="input1" name="data[endTime]">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">种类</label>
                        <div class="controls">
                            <select name="data[type]">
                                <option <?php echo $data['type'] == 1?"selected":''?>  value="1">鲜花</option>
                                <option <?php echo $data['type'] == 2?"selected":''?>  value="2">花篮</option>
                                <option <?php echo $data['type'] == 3?"selected":''?>  value="3">蛋糕</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="hidden" value="<?php echo $id?>" id="input1" name="id">
                            <input type="submit" class="btn btn-primary" value="提交">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>



