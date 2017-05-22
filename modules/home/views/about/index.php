
        <div class="span10" id="datacontent">
            <ul class="breadcrumb">
                <li class="active">添加轮播图</li>
            </ul>
            <form action="/home/about/index" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label for="moduledescribe" class="control-label">展示图片</label>

                        <div class="controls">
                            <div style="margin-bottom: 10px" id="InputsWrapper">
                                  <span>
                                      <img class="defaultImage" width="150px" height="200px" src="<?php echo $data['image']?>" alt=""/>
                                  </span>
                                <br>
                                <br>
                            </div>
                            <input type="hidden" class="imageFile" name="data[image]" value="<?php echo $data['image']?>" placeholder="图片地址">
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
                        <label for="modulename" class="control-label">链接地址</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $data['url']?>" id="input1" name="data[url]">
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



