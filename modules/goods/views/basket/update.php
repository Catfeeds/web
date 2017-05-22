<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>
        <div class="span10" id="datacontent">
            <ul class="breadcrumb">
                <li class="active">修改鲜花</li>
            </ul>
            <form action="/goods/cake/update" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label for="modulename" class="control-label">分类</label>
                        <div class="controls">
                            <ul>
                                <?php
                                foreach($category as $v) {
                                    ?>
                                    <li>
                                        <span><?php echo $v['name']?>:</span>
                                        <?php
                                        foreach($v['children'] as $val) {
                                            ?>
                                            <input type="checkbox" name="data[catId][]" <?php echo strstr($catStr,$val['id'])?'checked':''?> id="" value="<?php echo $val['id']?>"/>
                                            <label for=""><?php echo $val['name']?></label>
                                        <?php
                                        }
                                        ?>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="modulename" class="control-label">鲜花名称</label>
                        <div class="controls">
                            <input type="text" id="input1" name="data[name]" value="<?php echo $data['name']?>" datatype="name" needle="needle" msg="您必须输入中英文字符的分类名称">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="moduledescribe" class="control-label">展示图片</label>

                        <div class="controls">
                            <div style="margin-bottom: 10px" id="InputsWrapper">
                                  <span>
                                      <img class="defaultImage" width="150px" height="200px" src="<?php echo $data['defaultImage']?>" alt=""/>
                                  </span>
                                <br>
                                <br>
                            </div>
                            <input type="hidden" class="imageFile" name="data[defaultImage]" value="<?php echo $data['defaultImage']?>" placeholder="图片地址">
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
                    <div class="control-group">
                        <label for="moduledescribe" class="control-label">列表图片</label>

                        <div class="controls">
                            <div style="margin-bottom: 10px" id="InputsWrapper">
                                  <span class="imageList">
                                        <?php
                                            foreach($data['imageArr'] as $v) {
                                                ?>
                                                <img class="imageStr" width="150px" height="200px" src="<?php echo $v?>" alt=""/>
                                            <?php
                                            }
                                      ?>
                                  </span>
                                <br>
                                <br>
                            </div>
                            <input type="hidden" class="imageFileList" name="data[imageStr]" value="<?php echo $data['imageStr']?>" placeholder="图片地址">
                            <a href="#" class="btn btn-info" onclick="upImage2();">上传图片</a>
                        </div>
                    </div>
                    <script type="text/javascript">
                        //实例化编辑器
                        var o_ueditorupload1 = UE.getEditor('j_ueditorupload1',
                            {
                                autoHeightEnabled:false
                            });
                        o_ueditorupload1.ready(function ()
                        {

                            o_ueditorupload1.hide();//隐藏编辑器

                            //监听图片上传
                            o_ueditorupload1.addListener('beforeInsertImage', function (t,arg)
                            {
                                var imageStr = "";
                                var imageList = "";
                                for(var i=0;i < arg.length;i++){
                                    imageStr += arg[i].src+'-';
                                    imageList += '<img class="imageStr" width="150px" height="200px" src="'+arg[i].src+'" alt=""/>';
                                }
                                imageStr = imageStr.substr(0,imageStr.length-1);
                                $('.imageFileList').val(imageStr);
                                $('.imageList').html(imageList);

                            });

                            /* 文件上传监听
                             * 需要在ueditor.all.min.js文件中找到
                             * d.execCommand("insertHtml",l)
                             * 之后插入d.fireEvent('afterUpfile',b)
                             */
                            o_ueditorupload1.addListener('afterUpfile', function (t, arg)
                            {

                            });
                        });

                        //弹出图片上传的对话框
                        function upImage2()
                        {
                            var myImage = o_ueditorupload1.getDialog("insertimage");
                            myImage.open();
                        }
                        //弹出文件上传的对话框
                        //    function upFiles()
                        //    {
                        //        var myFiles = o_ueditorupload1.getDialog("attachment");
                        //        myFiles.open();
                        //    }

                    </script>
                    <script type="text/plain" id="j_ueditorupload1"></script>
                    <div class="control-group">
                        <label for="modulename" class="control-label">花材描述</label>
                        <div class="controls">
                            <textarea name="data[flowerDes]"><?php echo $data['flowerDes']?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">包装</label>
                        <div class="controls">
                            <textarea name="data[pack]"><?php echo $data['pack']?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">价格</label>
                        <div class="controls">
                            <input type="text" id="input1" value="<?php echo $data['price']?>" name="data[price]">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">花语</label>
                        <div class="controls">
                            <input type="text" id="input1" value="<?php echo $data['flowerLanguage']?>" name="data[flowerLanguage]">
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="catdes" class="control-label">鲜花描述</label>
                        <div class="controls">
                            <textarea  id="editor" name="data[description]"><?php echo $data['description']?></textarea>
                            <span class="help-block">对这个分类进行描述</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="hidden" name="id" value="<?php echo $id?>"/>
                            <input type="submit" class="btn btn-primary" value="提交">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

<script type="text/javascript">
    var editor = UE.getEditor('editor');
</script>
