
        <div class="span10" id="datacontent">
            <ul class="breadcrumb">
                <li class="active">添加节日特价</li>
            </ul>
            <form action="/home/feast/add" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label for="modulename" class="control-label">名称</label>
                        <div class="controls">
                            <input type="text" id="input1" name="data[name]">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">折扣</label>
                        <div class="controls">
                            <input type="text" id="input1" name="data[percent]">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">开始时间</label>
                        <div class="controls">
                            <input type="text" class="Wdate" onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" id="input1" name="data[startTime]">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">结束时间</label>
                        <div class="controls">
                            <input type="text" class="Wdate" onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" id="input1" name="data[endTime]">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">种类</label>
                        <div class="controls">
                            <select name="data[type]">
                                <option  value="1">鲜花</option>
                                <option  value="2">花篮</option>
                                <option  value="3">蛋糕</option>
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

