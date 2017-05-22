
        <div class="span10" id="datacontent">
            <ul class="breadcrumb">
                <li class="active">修改导航</li>
            </ul>
            <form action="/home/keywords/update" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label for="modulename" class="control-label">导航名称</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $data['name']?>" id="input1" name="data[name]">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">链接地址</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $data['url']?>" id="input1" name="data[url]">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">展示类型</label>
                        <div class="controls">
                            <select name="data[type]">
                                <option <?php echo $data['type'] == 1?"selected":''?>  value="1">黑</option>
                                <option <?php echo $data['type'] == 2?"selected":''?>  value="2">白</option>
                                <option <?php echo $data['type'] == 3?"selected":''?>  value="3">红</option>
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



