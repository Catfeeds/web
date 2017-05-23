<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>
<div class="span10" id="datacontent">
    <ul class="breadcrumb">
        <li><a href="/content/index/index">内容模块</a> <span class="divider">/</span></li>
        <li><a href="/content/category/index">分类管理</a> <span class="divider">/</span></li>
        <li class="active">添加分类</li>
    </ul>
    <form action="/content/category/add" method="post" class="form-horizontal">
        <fieldset>
            <div class="control-group">
                <label for="modulename" class="control-label">分类类型</label>
                <div class="controls">
                    <select onchange="getPidCategory(this)" name="data[type]">
                        <option value="0">选择分类类型</option>
                        <option <?php echo isset($data['type'])&&$data['type'] == 1?"selected":''?> value="1">课程分类</option>
                        <option <?php echo isset($data['type'])&&$data['type'] == 2?"selected":''?> value="2">留学分类</option>
                        <option <?php echo isset($data['type'])&&$data['type'] == 3?"selected":''?> value="3">英语分类</option>
                        <option <?php echo isset($data['type'])&&$data['type'] == 4?"selected":''?> value="4">书籍分类</option>
                        <option <?php echo isset($data['type'])&&$data['type'] == 5?"selected":''?> value="5">会员分类</option>
                    </select>
                </div>
            </div>

            <?php
                if(isset($id)) {
                    ?>
                    <div class="control-group pcat">
                        <label for="modulename" class="control-label">父级分类</label>
                        <div class="controls">
                        <select onchange="getPidCategory(this)" name="data[pid]">
                        <option value="0">一级分类</option>
                        <?php
                            foreach($category as $v) {
                                ?>
                                <option <?php echo isset($data['pid'])&&$data['pid'] == $v['id']?"selected":''?> value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
                            <?php
                            }
                        ?>
                            </select>
                    </div>
                        </div>
                <?php
                }else {
                    ?>
                    <div class="control-group pcat">

                    </div>
                <?php
                }
            ?>
            <div class="control-group">
                <label for="modulename" class="control-label">分类名称</label>
                <div class="controls">
                    <input type="text" id="input1" name="data[name]" value="<?php echo isset($data['name'])?$data['name']:''?>" datatype="userName" needle="needle" msg="您必须输入中英文字符的分类名称">
                    <span class="help-block">请输入分类名称</span>
                </div>
            </div>
            <div class="control-group">
                <label for="moduledescribe" class="control-label">分类图片</label>
                <div class="controls">
                    <div style="margin-bottom: 10px" id="InputsWrapper">
                                  <span>
                                      <input type="text" class="imageFile"   name="data[image]" value="<?php echo isset($data['image'])?$data['image']:''?>" placeholder="图片地址">
                                  </span>
                        <br>
                        <br>
                    </div>
                    <a href="#" class="btn btn-info" onclick="upImage();">上传图片</a>
                </div>
            </div>
            <div class="control-group">
                <label for="modulename" class="control-label">是否有SDK</label>
                <div class="controls" id="checkbox_digui">
                    <input type="radio" <?php echo isset($data['sdk']) && $data['sdk'] ==1?"checked":""?> name="data[sdk]" value="1"/> 有&nbsp;&nbsp;&nbsp;
                    <input type="radio" <?php echo isset($data['sdk']) && $data['sdk']==2?"checked":""?> name="data[sdk]" value="2"/> 无
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <input name="id" type="hidden" value="<?php echo isset($id)?$id:''?>">
                    <input type="submit"  class="btn btn-primary" value="提交">
                </div>
            </div>
        </fieldset>
    </form>
</div>
<script type="text/javascript">
    //实例化编辑器
    var o_ueditorupload = UE.getEditor('j_ueditorupload',
        {
            autoHeightEnabled:false
        });
    o_ueditorupload.ready(function ()
    {

        o_ueditorupload.hide();//隐藏编辑器

        //监听图片上传
        o_ueditorupload.addListener('beforeInsertImage', function (t,arg)
        {
            $('.imageFile').val(arg[0].src);

        });

        /* 文件上传监听
         * 需要在ueditor.all.min.js文件中找到
         * d.execCommand("insertHtml",l)
         * 之后插入d.fireEvent('afterUpfile',b)
         */
        o_ueditorupload.addListener('afterUpfile', function (t, arg)
        {

        });
    });

    //弹出图片上传的对话框
    function upImage()
    {
        var myImage = o_ueditorupload.getDialog("insertimage");
        myImage.open();
    }
    //弹出文件上传的对话框
    //    function upFiles()
    //    {
    //        var myFiles = o_ueditorupload.getDialog("attachment");
    //        myFiles.open();
    //    }

</script>
<script type="text/plain" id="j_ueditorupload"></script>
<script type="text/javascript">
    function getPidCategory(_this){
        var type = $(_this).val();
        var str = '<label for="modulename" class="control-label">父级分类</label> <div class="controls"> <select name="data[pid]" style="width: 400px" ><option value="0">一级分类</option>'
        $.post("/content/api/cat",{type:type},function(re){
            for(var i=0;i<re.length;i++){
                str += '<option value="'+re[i].id+'">'+re[i].name+'</option>';
            }
            str += '</select></div>'
            $(".pcat").html(str);
        },'json')
    }
</script>
