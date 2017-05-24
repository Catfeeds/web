
        <div class="span10" id="datacontent">
            <ul class="breadcrumb">
                <li class="active">修改热销</li>
            </ul>
            <form action="/home/hot-sell/update" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label for="modulename" class="control-label">名称</label>
                        <div class="controls">
                            <input type="text" id="input1" value="<?php echo $data['name']?>" name="data[name]">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">连接</label>
                        <div class="controls">
                            <input type="text" id="input1" value="<?php echo $data['url']?>" name="data[url]">
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



