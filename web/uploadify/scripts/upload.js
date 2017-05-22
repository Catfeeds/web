//上传文件后预览
var cloud = {};
cloud.Upload =  {
    previewImg : function(param){
        //参数操作
        var params = $.extend(
            {
                buttonClass     : "",                       //按钮样式
                file_dom        : "",                       //文件域
                preview_dom     : "",                       //预览图存放位置
                file_type       : "image",                  //上传文件类型，决定预览图的显示
                file_ext        : "*.jpg;*.jpeg;*.png;*.gif;*.bmp", //可上传文件的后缀
                upload_folder   : "",                       //上传文件夹名
                uploader        : '?r=upload/add',          //访问 UploadifyController -> actionAdd 执行上传
                url_input       : "",                       //图片存储地址将写到的input
                width           : "100%",
                height          : "100%",
                size            : 2                         //允许上传文件大小(M)
            }, //默认设置
            param
        );
        cloud.Upload.startUploadify(params);

    },
    documents : function(param){
        var params = $.extend(
            {
                buttonClass   : "",                         //按钮样式
                file_dom      : "",                         //文件域
                preview_dom   : "",                         //文件夹名预览存放位置
                file_type     : "doc",                      //上传文件类型，决定预览图的显示
                file_ext      : "*.txt;*.docx;*.doc;*.wps", //可上传文件的后缀
                upload_folder : "",                         //上传文件夹名
                uploader      : '?r=upload/add-file',
                url_input     : "",                         //存储地址将写到的input
                width         : "100%",
                height        : "100%",
                size          : 5                           //允许上传文件大小(M)
            }, //默认设置
            param
        );
        cloud.Upload.startUploadify(params);
    },
    startUploadify:function(params){
        //插件配制
        $(params.file_dom).uploadify({
            // debug:true,
            queueID  : 'hide',
            formData     : {
                upload_folder : params.upload_folder
            },
            swf      : '/uploadify/scripts/uploadify.swf',
            buttonImage : '/uploadify/scripts/browse-btn.png', // /resources/extensions/uploadify/browse-btn.png
            uploader : params.uploader,
            width : 75,  //浏览按钮宽
            height : 26, //浏览按钮高
            auto:true,   //是否自动上传
            fileTypeDesc : '请选择'+params.file_ext+'格式的文件' ,   //这个属性值必须设置fileExt属性后才有效，用来设置选择文件对话框中的提示文本
            fileTypeExts : params.file_ext ,  //设置可以选择的文件的类型，格式如：'*.doc;*.pdf;*.rar' 。
            fileSizeLimit : params.size*1024, //允许上传文件大小
            multi:false, //是否可以选择多个文件
            queueSizeLimit : 1, //上传文件个数
            overrideEvents:['onSelectError','onDialogClose'],
            onSelectError : function(file, errorCode, errorMsg) {
                switch (errorCode) {
                    case -100:
                        alert("对不起,您最多只能传" + $(params.file_dom).uploadify('settings', 'queueSizeLimit') + "个文件！");
                        break;
                    case -110:
                        alert("文件 [<span style='color:red'>" + file.name + "</span>] 大小超出" + $(params.file_dom).uploadify('settings', 'fileSizeLimit') + ",请处理后上传！");
                        break;
                    case -120:
                        alert("文件 [<span style='color:red'>" + file.name + "</span>] 大小异常！");
                        break;
                    case -130:
                        alert("文件 [<span style='color:red'>" + file.name + "</span>] 的类型不正确！");
                        break;
                }

            },
            'onUploadSuccess' : function(fileInfo,responseDatas) {
                datas = eval(responseDatas)[0];
                // console.log(datas);
                var _img = '';

                switch( params.file_type ){
                    case 'image' :
                        _img = '<img src="'+datas['preview_url']+'" style="width:'+params.width+';height:'+params.height+'"/>';
                        break;
                    case 'pdf':
                        _img = '<img src="/resources/images/pdf_ico.png"/>';
                        break;
                    case 'doc':
                        var tips = $(params.preview_dom).attr('data-tips');
                        if (params.name_input) {
                            $(params.name_input).val(datas['old_file_name']);
                        }
                        _img = (tips ? tips : '') + datas['old_file_name'];
                        break;
                }
                $(params.preview_dom).html(_img);
                $(params.url_input).val(datas['save_url']);
            }
        });
    }
};