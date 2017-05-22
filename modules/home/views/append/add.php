
        <div class="span10" id="datacontent">
            <ul class="breadcrumb">
                <li class="active">添加排行榜</li>
            </ul>
            <form action="/home/append/add" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label for="modulename" class="control-label">名称</label>
                        <div class="controls">
                            <input type="text" id="input1" name="data[name]">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">单位</label>
                        <div class="controls">
                            <input type="text" id="input1" name="data[unit]">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="submit" class="btn btn-primary" value="提交">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

