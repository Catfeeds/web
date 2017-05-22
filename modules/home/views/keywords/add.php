
        <div class="span10" id="datacontent">
            <ul class="breadcrumb">
                <li class="active">添加导航</li>
            </ul>
            <form action="/home/keywords/add" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label for="modulename" class="control-label">关键字</label>
                        <div class="controls">
                            <input type="text" id="input1" name="data[name]">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">链接地址</label>
                        <div class="controls">
                            <input type="text" id="input1" name="data[url]">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">展示类型</label>
                        <div class="controls">
                            <select name="data[type]">
                                <option  value="1">黑</option>
                                <option  value="2">白</option>
                                <option  value="3">红</option>
                            </select>
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

