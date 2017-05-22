
<div class="span10" id="datacontent">
    <form action="/home/module/add-category" method="post" class="form-horizontal">
        <fieldset>
                <div class="control-group">
                    <label for="modulename" class="control-label">关联分类</label>
                    <div class="controls">
                        <select style="width: 400px" id="contentcatid" msg="您必须选择一个分类"
                                data-options="url:'/home/api/module-category?id=<?php echo $id?>',method:'get',cascadeCheck:false" multiple class="vice easyui-combotree">
                        </select><br/><br/>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input name="id" type="hidden" value="<?php echo $id?>">
                        <input name="relateCategory" type="hidden" value="<?php echo $relateCategory?>">
                        <input type="submit"  class="btn btn-primary" value="提交">
                    </div>
                </div>
        </fieldset>
    </form>
</div>
<script>
    $('.vice').combotree({
        onCheck:function(newValue,oldValue){
            var nodes = $('.vice').combotree('getValues');
            $("input[name='relateCategory").val(nodes);
        }
    });
</script>
