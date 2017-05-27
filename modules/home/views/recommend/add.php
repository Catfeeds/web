
        <div class="span10" id="datacontent">
            <ul class="breadcrumb">
                <li class="active">特别推荐</li>
            </ul>
            <form action="/home/recommend/add" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label for="modulename" class="control-label">商品Id</label>
                        <div class="controls">
                            <input type="text" id="input1" name="data[goodsId]">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">类型</label>
                        <div class="controls">
                            <select  name="data[type]">
                                <option  value="1">课程分类</option>
                                <option  value="2">留学分类</option>
                                <option  value="3">英语分类</option>
                                <option  value="4">书籍分类</option>
                                <option  value="5">会员分类</option>
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

