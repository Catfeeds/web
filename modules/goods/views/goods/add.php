<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>
        <div class="span10" id="datacontent">
            <ul class="breadcrumb">
                <li class="active">添加商品</li>
            </ul>
            <form action="/goods/goods/add" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label for="modulename" class="control-label">分类</label>
                        <div class="controls goodsCategory">
                            <select onchange="getNextCategory(this)" name="data[catId]">
                                <option value="0">请选择分类</option>
                                <?php
                                    foreach($category as $v) {
                                        ?>
                                        <option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <script type="text/javascript">
                        function getNextCategory(_this){
                            var id = $(_this).val();
                            if(id == 0){
                                alert('请选择分类');return false;
                            }
                            var str = "";
                            $.post('/goods/api/category',{id:id},function(re){
                                if(re.length>0){
                                    str +='<select onchange="getNextCategory(this)" name="data[catId]">';
                                    for(var i=0;i<re.length;i++){
                                        str +='<option value="'+re[i].id+'">'+re[i].name+'</option>';
                                    }
                                    str += '</select>';
                                }
                                $(_this).nextAll().remove();
                                $('.goodsCategory').append(str);
                            },'json')
                        }
                    </script>
                    <div class="control-group">
                        <label for="modulename" class="control-label">商品名称</label>
                        <div class="controls">
                            <input type="text" id="input1" name="data[name]" value="" datatype="name" needle="needle" msg="您必须输入中英文字符的分类名称">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="moduledescribe" class="control-label">展示图片</label>

                        <div class="controls">
                            <div style="margin-bottom: 10px" id="InputsWrapper">
                                  <span>
                                      <img class="defaultImage" width="150px" height="200px" src="" alt=""/>
                                  </span>
                                <br>
                                <br>
                            </div>
                            <input type="hidden" class="imageFile" name="data[image]" value="" placeholder="图片地址">
                            <a href="javascript:;" class="btn btn-info" onclick="upImage();">上传图片</a>
                        </div>
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
                                $('.defaultImage').attr('src',arg[0].src);

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
                    <?php
                        foreach($extend as $v) {
                            ?>
                            <div class="control-group">
                                <label for="modulename" class="control-label"><?php echo $v['name']?></label>

                                <div class="controls">
                                    <input type="text" id="input1" name="data[<?php echo $v['value']?>]">
                                </div>
                            </div>
                        <?php
                        }
                    ?>

                    <div class="control-group">
                        <label for="modulename" class="control-label">浏览量</label>
                        <div class="controls">
                            <input type="text" id="input1" name="data[view]">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">价格</label>
                        <div class="controls">
                            <input type="text" id="input1" name="data[price]">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">原价</label>
                        <div class="controls">
                            <input type="text" id="input1" name="data[sales]">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">试听链接</label>
                        <div class="controls">
                            <input type="text" id="input1" name="data[url]">
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="catdes" class="control-label">商品描述</label>
                        <div class="controls">
                            <textarea  id="editor" name="data[description]"></textarea>
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

<script type="text/javascript">
    var editor = UE.getEditor('editor');
</script>
