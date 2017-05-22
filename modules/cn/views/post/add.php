<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--阻止浏览器缓存-->
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
    <meta http-equiv="expires" content="0">
    <!-- Basic Page Needs
     ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="GMAT网课，GMAT培训，托福网课，托福培训，雅思网课，雅思培训，零中介留学，美国留学，出国留学，留学申请，留学文书、海外实习">
    <meta name="description" content="雷哥网社区-我们就爱分享知识！申友旗下一站式互联网留学备考智能服务平台。">
    <meta name="title" content="">
    <meta name="author" content="">
    <meta name="Copyright" content="">
    <meta name="description" content="">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- 让IE浏览器用最高级内核渲染页面 还有用 Chrome 框架的页面用webkit 内核
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
    <!-- IOS6全屏 Chrome高版本全屏
    ================================================== -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <!-- 让360双核浏览器用webkit内核渲染页面
    ================================================== -->
    <meta name="renderer" content="webkit">
    <link rel="stylesheet" href="/cn/css/reset.css">
    <link rel="stylesheet" href="/cn/css/common.css">
    <link rel="stylesheet" href="/cn/css/swipebox.css">
    <link rel="stylesheet" href="/cn/css/main.css">
    <link rel="stylesheet" href="/cn/css/animate.min.css">
    <link rel="stylesheet" href="/cn/css/article_ueditor.css">
    <script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>
    <!-- 编辑器公式插件 -->
    <script src="/cn/js/jquery-1.12.2.min.js"></script>
    <script src="/cn/js/jquery.swipebox.js"></script>
    <script src="/cn/js/jquery.SuperSlide.2.1.1.js"></script>
    <title>发布帖子</title>
</head>
<body class="bg-f">
<!--模态框-->
<section class="moduleRect">
    <div class="w12 tm">
        <div class="rectWrap inb">
            <p class="close-2">x</p>
            <div class="clearfix moduleBtn">
                <span style="margin-right: 15px;" class="fl" onclick="upFiles()">上传资料</span>
                <span class="fr" onclick="upFilesAudio()">上传音频</span>
            </div>
        </div>
    </div>
</section>

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
            var str = '';
            for(var i=0;i<arg.length;i++){
                str +='<li>';
                str +='<img src="/cn/images/cloud_1.png" alt="">';
                str +='<span class="file_name">'+arg[i].title+'</span>';
                str +='<img class="remove_btn" src="/cn/images/remove_1.png" alt="" onclick="deleteFile(this)">';
                str +='<input class="datum" type="hidden" name="data[datum][]" value="'+arg[i].url+'">';
                str +='<input class="datumTitle" type="hidden" name="data[datumTitle][]" value="'+arg[i].title+'">';
                str +='</li>';
            }
            $('.upload_file_wrap').append(str);
        });
    });

    //弹出图片上传的对话框
//    function upImage()
//    {
//        var myImage = o_ueditorupload.getDialog("insertimage");
//        myImage.open();
//    }
    //弹出文件上传的对话框
        function upFiles()
        {
            var myFiles = o_ueditorupload.getDialog("attachment");
            myFiles.open();
        }

</script>
<script type="text/plain" id="j_ueditorupload"></script>
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
            $('.imageFile').val(arg[0].src);

        });

        /* 文件上传监听
         * 需要在ueditor.all.min.js文件中找到
         * d.execCommand("insertHtml",l)
         * 之后插入d.fireEvent('afterUpfile',b)
         */
        o_ueditorupload1.addListener('afterUpfile', function (t, arg)
        {
            var str = '';
            for(var i=0;i<arg.length;i++){
                str +='<li>';
                str +='<img src="/cn/images/cloud_1.png" alt="">';
                str +='<span class="file_name">'+arg[i].title+'</span>';
                str +='<img class="remove_btn" src="/cn/images/remove_1.png" alt="" onclick="deleteFile(this)">';
                str +='<input class="radio" type="hidden" name="data[radio][]" value="'+arg[i].url+'">';
                str +='<input class="radioTitle" type="hidden" name="data[radioTitle][]" value="'+arg[i].title+'">';
                str +='</li>';
            }
            $('.upload_file_wrap').append(str);
        });
    });

    //弹出图片上传的对话框
    //    function upImage()
    //    {
    //        var myImage = o_ueditorupload.getDialog("insertimage");
    //        myImage.open();
    //    }
    //弹出文件上传的对话框
    function upFilesAudio()
    {
        var myFiles = o_ueditorupload1.getDialog("attachment");
        myFiles.open();
    }

</script>
<script type="text/plain" id="j_ueditorupload1"></script>
<!--搜索-->
<?php use app\commands\front\NavWidget; ?>
<?php NavWidget::begin(); ?>
<?php NavWidget::end(); ?>
<!--当前位置-->
<section>
    <div class="w12 location">
        <a href="/">首页</a>&nbsp;>&nbsp;<em>发布新帖</em>
    </div>
</section>
<section>
    <div class="w12 clearfix">
            <div class="fl ueditor_wrap">
            <div class="bg-g r-tit" style="font-size: 14px;margin: 0;">
                <img class="ic_reply" src="/cn/images/ic_reply.png" alt="">发帖类型
            </div>
            <div class="select_list">
                <?php
                foreach($firstCategory as $v) {
                    ?>
                        <select onchange="getLastCat(this)" class="changeSelect" name="data[catId]">
                            <?php
                                foreach($v as $val) {
                                    ?>
                                    <option  value="<?php echo $val['id']?>"><?php echo $val['name']?></option>
                                <?php
                                }
                            ?>
                    </select>
                    <?php
                }
                ?>
            </div>
            <script type="text/javascript">
                function getLastCat(_this){
                    var _id = $(_this).val();
                    $.post("/cn/api/change-cat",{id:_id},function(re){
                        var str="";
                        for(var j=0;j<re.length;j++){
                            str +='<select onclick="getLastCat(this)" class="changeSelect" name="data[catId]">';
                            for(var i=0;i<re[j].length;i++){
                                str += '<option value="'+re[j][i].id+'">'+re[j][i].name+'</option>';
                            }
                            str +='</select>'
                        }
                        $(_this).nextAll('.changeSelect').remove();
                        $('.select_list').append(str);
                    },'json')
                }
            </script>
            <div class="ueditor_int">
                <input class="postTitle" name="data[title]" type="text" placeholder="请填写标题">

            </div>
            <!--编辑器 占位图-->
            <div>
                <textarea id="editor" name="data[content]"></textarea>
            </div>
            <!--上传的文件-->
            <div class="upload_file">
                <div class="fl relative">
                    <span class="upload_btn">上传文件</span>
                    <ul class="upload_file_wrap">

                    </ul>
                </div>
                <div onclick="addPost()" class="push_btn fr">发表</div>
            </div>
        </div>

        <!--热门课程推荐-->
        <div class="hot-wrap fr tm">
            <div class="r-tit bg-g">热门课程推荐</div>
            <div class="recommend-wrap">
                <div class="boxWrap slideBox-1">
                    <div class="hd">
                        <ul></ul>
                    </div>
                    <ul class="banner">
                        <li><a href="#"><img src="/cn/images/r-2.png" alt=""></a></li>
                        <li><a href="#"><img src="/cn/images/r-2.png" alt=""></a></li>
                        <li><a href="#"><img src="/cn/images/r-2.png" alt=""></a></li>
                    </ul>
                </div>
                <div class="boxWrap slideBox-1">
                    <div class="hd">
                        <ul></ul>
                    </div>
                    <ul class="banner">
                        <li><a href="#"><img src="/cn/images/r-2.png" alt=""></a></li>
                        <li><a href="#"><img src="/cn/images/r-2.png" alt=""></a></li>
                        <li><a href="#"><img src="/cn/images/r-2.png" alt=""></a></li>
                    </ul>
                </div>
                <div class="boxWrap slideBox-1">
                    <div class="hd">
                        <ul></ul>
                    </div>
                    <ul class="banner">
                        <li><a href="#"><img src="/cn/images/r-2.png" alt=""></a></li>
                        <li><a href="#"><img src="/cn/images/r-2.png" alt=""></a></li>
                        <li><a href="#"><img src="/cn/images/r-2.png" alt=""></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
</body>
<script type="text/javascript">
    function deleteFile(_this){
        $(_this).closest('li').remove();
    }
    //    课程推荐
    jQuery(".slideBox-1").slide({
        mainCell: ".banner",
        titCell: ".hd ul",
        effect: "leftLoop",
        autoPage: "<li></li>",
        autoPlay: true
    });
    var h1=window.innerHeight;
    var h2=h1/3;
    $('.rectWrap').css({"marginTop":h2});
    $('.upload_btn').click(function(){
       $('.moduleRect').fadeIn();
    });
    $('.close-2').click(function(){
       $('.moduleRect').fadeOut();
    });

    $('.moduleBtn span').click(function(){
        $('.moduleRect').fadeOut()
    });
    //实例化编辑器
    var sso_ueditorupload = UE.getEditor('editor',
        {
//            toolbars: [[
//                'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|','customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
//                'simpleupload', 'insertimage', '|',
//                'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
//                'print', 'preview', 'searchreplace'
//            ]],
            initialFrameHeight: 320
        });

    function addPost(){
        var catId = $('.changeSelect:last').val();
        if(catId==""){
            alert('请选择分类');
            return false;
        }
        var title = $('.postTitle').val();
        if(title==""){
            alert('请填写标题');
            return false;
        }
        var content = sso_ueditorupload.getContent();
        if(content==""){
            alert('请输入内容');
            return false;
        }
        var radio = new Array();
        $('.radio').each(function(){
            radio.push($(this).val());
        })
        var radioTitle = new Array();
        $('.radioTitle').each(function(){
            radioTitle.push($(this).val());
        })
        var datum = new Array();
        $('.datum').each(function(){
            datum.push($(this).val());
        })
        var datumTitle = new Array();
        $('.datumTitle').each(function(){
            datumTitle.push($(this).val());
        })
        $.post("/cn/api/add-post",{catId:catId,title:title,content:content,radio:radio,datum:datum,radioTitle:radioTitle,datumTitle:datumTitle},function(re){
            alert(re.message);
            if(re.code == 1){
                if(re.type == 1){
                    location.href = "/post/details/"+re.id+".html";
                }else{
                    location.href = "/gossip/details/"+re.id+".html";
                }
            }
        },'json')

    }
</script>
</html>