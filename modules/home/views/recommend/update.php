
        <div class="span10" id="datacontent">
            <ul class="breadcrumb">
                <li class="active">修改热销</li>
            </ul>
            <form action="/home/hot-sell/update" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label for="modulename" class="control-label">商品Id</label>
                        <div class="controls">
                            <input type="text" id="input1" value="<?php echo $data['goodsId']?>" name="data[goodsId]">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">类型</label>
                        <div class="controls">
                            <select  name="data[type]">
                                <option <?php echo isset($data['type'])&&$data['type'] == 1?"selected":''?> value="1">课程分类</option>
                                <option <?php echo isset($data['type'])&&$data['type'] == 2?"selected":''?> value="2">留学分类</option>
                                <option <?php echo isset($data['type'])&&$data['type'] == 3?"selected":''?> value="3">英语分类</option>
                                <option <?php echo isset($data['type'])&&$data['type'] == 4?"selected":''?> value="4">书籍分类</option>
                                <option <?php echo isset($data['type'])&&$data['type'] == 5?"selected":''?> value="5">会员分类</option>
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



