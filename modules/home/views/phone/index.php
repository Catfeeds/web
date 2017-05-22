
        <div class="span10" id="datacontent">
            <ul class="breadcrumb">
                <li class="active">联系电话</li>
            </ul>
            <form action="/home/phone/index" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label for="modulename" class="control-label">联系电话</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $data['phone']?>" id="input1" name="data[phone]">
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



