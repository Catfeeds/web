
        <div class="span10" id="datacontent">
            <ul class="breadcrumb">
                <li class="active">添加置顶分类</li>
            </ul>
            <form action="/home/module/add" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label for="modulename" class="control-label">模块名称</label>
                        <div class="controls">
                            <input type="text"  name="data[name]" value="" placeholder="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="moduledescribe" class="control-label">左边图片</label>

                        <div class="controls">
                            <div style="margin-bottom: 10px" id="InputsWrapper">
                                  <span>
                                      <img class="defaultImage" width="150px" height="200px" src="" alt=""/>
                                  </span>
                                <br>
                                <br>
                            </div>
                            <input type="hidden" class="imageFile" name="data[left][image]" value="" placeholder="图片地址">
                            <a href="javascript:;" class="btn btn-info" onclick="upImage();">上传图片</a>
                            <div>
                                <input type="text"  name="data[left][url]" value="" placeholder="链接地址">
                            </div>
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
                        <label for="moduledescribe" class="control-label">中间图片</label>

                        <div class="controls">
                            <div style="margin-bottom: 10px" id="InputsWrapper">
                                  <span>
                                      <img class="defaultLeftImage" width="150px" height="200px" src="" alt=""/>
                                  </span>
                                <br>
                                <br>
                            </div>
                            <input type="hidden" class="imageLeftFile" name="data[middle][image]" value="" placeholder="图片地址">
                            <a href="javascript:;" class="btn btn-info" onclick="upImage1();">上传图片</a>
                            <div>
                                <input type="text"  name="data[middle][url]" value="" placeholder="链接地址">
                            </div>
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
                                $('.imageLeftFile').val(arg[0].src);
                                $('.defaultLeftImage').attr('src',arg[0].src);

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
                        function upImage1()
                        {
                            var myImage = o_ueditorupload1.getDialog("insertimage");
                            myImage.open();
                        }
                        //弹出文件上传的对话框
                        //    function upFiles()
                        //    {
                        //        var myFiles = o_ueditorupload.getDialog("attachment");
                        //        myFiles.open();
                        //    }

                    </script>
                    <script type="text/plain" id="j_ueditorupload1"></script>
                    <div class="control-group">
                        <label for="moduledescribe" class="control-label">右边图片</label>

                        <div class="controls">
                            <div style="margin-bottom: 10px" id="InputsWrapper">
                                  <span>
                                      <img class="defaultRightImage" width="150px" height="200px" src="" alt=""/>
                                  </span>
                                <br>
                                <br>
                            </div>
                            <input type="hidden" class="imageRightFile" name="data[right][image]" value="" placeholder="图片地址">
                            <a href="javascript:;" class="btn btn-info" onclick="upImage2();">上传图片</a>
                            <div>
                                <input type="text"  name="data[right][url]" value="" placeholder="链接地址">
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        //实例化编辑器
                        var o_ueditorupload2 = UE.getEditor('j_ueditorupload2',
                            {
                                autoHeightEnabled:false
                            });
                        o_ueditorupload2.ready(function ()
                        {

                            o_ueditorupload2.hide();//隐藏编辑器

                            //监听图片上传
                            o_ueditorupload2.addListener('beforeInsertImage', function (t,arg)
                            {
                                $('.imageRightFile').val(arg[0].src);
                                $('.defaultRightImage').attr('src',arg[0].src);

                            });

                            /* 文件上传监听
                             * 需要在ueditor.all.min.js文件中找到
                             * d.execCommand("insertHtml",l)
                             * 之后插入d.fireEvent('afterUpfile',b)
                             */
                            o_ueditorupload2.addListener('afterUpfile', function (t, arg)
                            {

                            });
                        });

                        //弹出图片上传的对话框
                        function upImage2()
                        {
                            var myImage = o_ueditorupload2.getDialog("insertimage");
                            myImage.open();
                        }
                        //弹出文件上传的对话框
                        //    function upFiles()
                        //    {
                        //        var myFiles = o_ueditorupload.getDialog("attachment");
                        //        myFiles.open();
                        //    }

                    </script>
                    <script type="text/plain" id="j_ueditorupload2"></script>
                    <div class="control-group">
                        <label for="modulename" class="control-label">位置</label>
                        <div class="controls">
                            <select name="data[location]">
                                <option value="1">上</option>
                                <option value="2">下</option>
                                <option value="3">中</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modulename" class="control-label">类型</label>
                        <div class="controls">
                            <select name="data[type]">
                                    <option value="1">特殊</option>
                                    <option value="2">普通</option>
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


