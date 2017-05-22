<link rel="stylesheet" href="/cn/css/header.css">
<?php
    $loginOut = Yii::$app->session->get('loginOut');
    if($loginOut){
        echo $loginOut;
        Yii::$app->session->remove('loginOut');
    }
?>
<!--头部灰色条-->
<div class="greyNav">
    <div class="inGrey">
        <div class="leftNav">
            <ul>
                <li>
                    <img src="/cn/images-common/index_kevinIcon.png" alt="图标"/>
                </li>
                <li><a href="http://www.gmatonline.cn/">GMAT</a></li>
                <li><a href="http://www.toeflonline.cn/" >TOEFL</a></li>
                <li><a href="http://ielts.gmatonline.cn/">IELTS</a></li>
                <li><a href="http://smartapply.gmatonline.cn/">留学</a></li>
                <li>|</li>
                <li><span>400-1816-180</span></li>
                <li><a href="tencent://message/?uin=1746295647&Site=www.cnclcy&Menu=yes">在线咨询</a></li>
            </ul>
        </div>
        <div class="fl nav-de">互联网一站式托福备考平台</div>
        <div class="rightLogin">
            <?php
            if(!$uid) {
            ?>
            <div class="loginBefore">
                <input type="button" value="登陆" onclick="userLogin()"/>
                <input type="button" value="注册" onclick="userRegister()"/>
            </div>
            <?php
            }else {
            ?>
            <!--登陆之后展示-->
            <div class="loginAfter">
                <div class="whiteDiv"><img src="<?php echo '/cn/img/noavatar_big.gif' ?>" alt="用户头像"></div>
                <div class="leftFont">
                    <span><?php echo $userData['nickname']?$userData['nickname']:$userData['username']?>
<!--                        （--><?php //echo Yii::$app->params['levelName'][$userData['level']]?><!--）-->
                    </span>
                    <i class="fa fa-angle-down"></i>
                </div>
                <div class="clearB"></div>
                <!--下拉-->
                <div class="xiala-con">
                    <ul>
                        <li><a href="/cn/user/index">个人中心</a></li>
                        <li><a href="javascript:void(0);"  onclick="loginOut(this)">退出</a></li>
                    </ul>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <!--        app下载-->
        <div class="appDownload">
            <span title="app下载" class="tit_t">APP <b></b></span>
            <div class="pull_down">
                <ul>
                    <li>
                        <div class="first_layer">
                            <img src="/cn/images-common/gmatapp_logo.jpg" alt="app logo图标"/>
                            <span>雷哥GMAT</span>
                        </div>
                        <div class="code_box">
                            <img src="/cn/images-common/leigeQrCode.png" alt="app二维码图片"/>
                        </div>
                    </li>
                    <li>
                        <div class="first_layer">
                            <img src="/cn/images-common/toeflapp_logo.jpg" alt="app logo图标"/>
                            <span>雷哥托福</span>
                        </div>
                        <div class="code_box">
                            <img src="/cn/images-common/toeflQrCode.jpg" alt="app二维码图片"/>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!--        app下载 end-->
        <div class="clearBr"></div>
    </div>
</div>

<?php
$controller = Yii::$app->controller->id;
    if($controller != 'user') {
        ?>
        <section>
            <div class="w12 search clearfix bg-f">
                <div class="fl"><a href="/"><img src="/cn/images/t-1.png" alt=""></a></div>
                <div class="search-wrap fr">
                    <div class="inb ic-1" onclick="searchList()"><img src="/cn/images/ic-1.png" alt=""></div>
                    <input class="search-int" type="text">
                </div>
            </div>
        </section>
    <?php
    }
?>

<script type="text/javascript">
    function searchList(){
        var keywords = $('.search-int').val();
        if(keywords == ''){
            alert('请输入关键字');
        }else{
            location.href="/search/"+keywords+'.html';
        }
    }

    /**
     * 登录框
     */
    function userLogin(){
//        $('.maskLayer').show();
//        $('.login').show();
        location.href="http://login.gmatonline.cn/cn/index?source=8&url=<?php echo Yii::$app->request->hostInfo.Yii::$app->request->getUrl()?>"

    }
    /**
     * 注册框
     */
    function userRegister(){
        location.href="http://login.gmatonline.cn/cn/index/register?source=8&url=<?php echo Yii::$app->request->hostInfo.Yii::$app->request->getUrl()?>"
    }
    /**
     * 用户退出
     */
    function loginOut(_this){
        $.post('/cn/api/login-out',{},function(re){
            var controller = $(_this).attr('data-value');
            var action = $(_this).attr('data-title');
            if(controller == 'person'){
                window.location.href="/"
            }else{
                window.location.reload()
            }
        },'json')
    }

</script>

