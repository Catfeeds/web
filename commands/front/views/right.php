<link rel="stylesheet" href="/cn/css/common-topic.css">
<script src="/cn/js/topic.js"></script>
<div class="right fr">
    <!--签到-->
    <div class="bg-f rc-1">
        <div class="sign-wrap">
            <div class="inb sign-ic">
                <img src="/cn/images/ic-4.png" alt="">
                <span>签到</span>
            </div>
            <div class="inb sign-info tm">
                <p class="sign-num">今日签到人数<br><?php echo $signCount ?></p>
                <?php
                $uid = Yii::$app->session->get('uid');
                if ($uid) {
                    $time = date("Y-m-d");
                    $sign = \app\modules\cn\models\User::find()->where("uid=$uid AND lastSignIn='$time'")->one();
                    if ($sign) {
                        $sign = 1;
                    } else {
                        $sign = 0;
                    }
                } else {
                    $sign = 0;
                }
                ?>
                <?php
                if ($sign == 1) {
                    ?>
                    <a href="javascript:;">你已签到</a>
                    <?php
                } else {
                    ?>
                    <a onclick="signIn()" href="javascript:;">你还未签到</a>
                    <?php
                }
                ?>
            </div>
            <script type="text/javascript">
                function signIn() {
                    $.post('/cn/api/sign-in', {}, function (re) {
                        if (re.code == 0) {
                            location.href = "http://login.gmatonline.cn/cn/index?source=8&url=<?php echo Yii::$app->request->hostInfo . Yii::$app->request->getUrl()?>"
                        }
                        if (re.code == 1) {
                            alert(re.message);
                            location.reload();
                        }
                        if (re.code == 2) {
                            alert(re.message);
                        }
                    }, 'json')
                }
            </script>
        </div>
    </div>
    <!--发帖-->
    <div class="bg-f rc-2">
        <a href="/add.html">
            <div class="publish-btn">
                <img src="/cn/images/ic-5.png" alt="">
                <span class="inb">发布新帖</span>
            </div>
        </a>
    </div>
    <div class="bg-f rc-2 qBt">
        <a href="javascript:;">
            <div class="publish-btn" style="background: #fb9337;">
                <img src="/cn/images/ask.png" style="width: 69px" alt="">
                <a href="<?php echo isset($uid)?'javascript:void(0);':'http://login.gmatonline.cn/cn/index?source=8&url='.Yii::$app->request->hostInfo . Yii::$app->request->getUrl(); ?>"><span class="inb" style="width: 96px">提问</span></a>
            </div>
        </a>
    </div>
    <!--热门板块-->
    <div class="hot-wrap bg-f tm">
        <div class="r-tit">热门板块</div>
        <ul class="hot-list clearfix">
            <?php foreach ($hotPlate as $key => $v) { ?>
                <li>
                    <a href="<?php echo isset($v['url']) ? $v['url'] : '#' ?>">
                        <div class="hot-module">
                            <div class="hot-icon inb"><img
                                    src="<?php echo isset($v['image']) ? $v['image'] : '/cn/images/hot-' . $key . '+1.png' ?>"
                                    alt=""></div>
                            <p class="hot-name inb"><?php echo $v['name'] ?></p>
                        </div>
                    </a>
                </li>
                <?php
            }
            ?>
            <!--                    <li>-->
            <!--                        <a href="#">-->
            <!--                            <div class="hot-module">-->
            <!--                                <div class="hot-icon inb"><img src="/cn/images/hot-2.png" alt=""></div>-->
            <!--                                <p class="hot-name inb">资料下载</p>-->
            <!--                            </div>-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <a href="#">-->
            <!--                            <div class="hot-module">-->
            <!--                                <div class="hot-icon inb"><img src="/cn/images/hot-3.png" alt=""></div>-->
            <!--                                <p class="hot-name inb">备考规则</p>-->
            <!--                            </div>-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <a href="#">-->
            <!--                            <div class="hot-module">-->
            <!--                                <div class="hot-icon inb"><img src="/cn/images/hot-4.png" alt=""></div>-->
            <!--                                <p class="hot-name inb">机经课程</p>-->
            <!--                            </div>-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <a href="#">-->
            <!--                            <div class="hot-module">-->
            <!--                                <div class="hot-icon inb"><img src="/cn/images/hot-5.png" alt=""></div>-->
            <!--                                <p class="hot-name inb">数学机经</p>-->
            <!--                            </div>-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <a href="#">-->
            <!--                            <div class="hot-module">-->
            <!--                                <div class="hot-icon inb"><img src="/cn/images/hot-6.png" alt=""></div>-->
            <!--                                <p class="hot-name inb">阅读机经</p>-->
            <!--                            </div>-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <a href="#">-->
            <!--                            <div class="hot-module">-->
            <!--                                <div class="hot-icon inb"><img src="/cn/images/hot-7.png" alt=""></div>-->
            <!--                                <p class="hot-name inb">SC解析</p>-->
            <!--                            </div>-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <a href="#">-->
            <!--                            <div class="hot-module">-->
            <!--                                <div class="hot-icon inb"><img src="/cn/images/hot-8.png" alt=""></div>-->
            <!--                                <p class="hot-name inb">CR解析</p>-->
            <!--                            </div>-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <a href="#">-->
            <!--                            <div class="hot-module">-->
            <!--                                <div class="hot-icon inb"><img src="/cn/images/hot-9.png" alt=""></div>-->
            <!--                                <p class="hot-name inb">课程下载</p>-->
            <!--                            </div>-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <a href="#">-->
            <!--                            <div class="hot-module">-->
            <!--                                <div class="hot-icon inb"><img src="/cn/images/hot-10.png" alt=""></div>-->
            <!--                                <p class="hot-name inb">题目答疑</p>-->
            <!--                            </div>-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <a href="#">-->
            <!--                            <div class="hot-module">-->
            <!--                                <div class="hot-icon inb"><img src="/cn/images/hot-11.png" alt=""></div>-->
            <!--                                <p class="hot-name inb">托福听力</p>-->
            <!--                            </div>-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <a href="#">-->
            <!--                            <div class="hot-module">-->
            <!--                                <div class="hot-icon inb"><img src="/cn/images/hot-12.png" alt=""></div>-->
            <!--                                <p class="hot-name inb">托福口语</p>-->
            <!--                            </div>-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <a href="#">-->
            <!--                            <div class="hot-module">-->
            <!--                                <div class="hot-icon inb"><img src="/cn/images/hot-13.png" alt=""></div>-->
            <!--                                <p class="hot-name inb">托福口语</p>-->
            <!--                            </div>-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <a href="#">-->
            <!--                            <div class="hot-module">-->
            <!--                                <div class="hot-icon inb"><img src="/cn/images/hot-14.png" alt=""></div>-->
            <!--                                <p class="hot-name inb">商学院申请</p>-->
            <!--                            </div>-->
            <!--                        </a>-->
            <!--                    </li>-->
        </ul>
    </div>
    <!--排行榜-->
    <div class="hot-wrap bg-f tm">
        <div class="r-tit">热帖排行榜</div>
        <div class="rank-classify clearfix">
            <span class="on">今日热榜</span>
            <span>一周热榜</span>
        </div>
        <div style="display: block;" class="rankList-wrap">
            <p class="rank-de">今日热榜：<?php echo count($rankPost) ?>条更新，总帖数：<?php echo $total ?>条。</p>
            <ul class="rangk-list tl">
                <?php foreach ($rankPost as $k => $r) { ?>
                    <li>
                        <a href="/post/details/<?php echo $r['id'] ?>.html">
                        <i class="rank-num inb"><?php echo $k + 1 ?></i>
                        <span class="rank-name ellipsis inb"><?php echo $r['title'] ?></span>
                        <em class="rank-user ellipsis inb"><?php echo $r['cnContent'] ?></em>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="rankList-wrap">
            <p class="rank-de">一周热榜：<?php echo count($weekPost) ?>条更新，总帖数：<?php echo $total ?>条。</p>
            <ul class="rangk-list tl">
                <?php foreach ($weekPost as $key => $w) { ?>
                    <li>
                        <a href="/post/details/<?php echo $r['id'] ?>.html">
                        <i class="rank-num inb"><?php echo $key + 1 ?></i>
                        <span class="rank-name ellipsis inb"><?php echo $w['title'] ?></span>
                        <em class="rank-user ellipsis inb"><?php echo $w['cnContent'] ?></em>
                        </a>
                    </li>
                    <?php
                }
                ?>

            </ul>
        </div>
    </div>
    <!--热门课程推荐-->
    <div class="hot-wrap bg-f tm">
        <div class="r-tit">热门课程推荐</div>
        <div class="recommend-wrap">
            <?php foreach ($curriculum as $v) { ?>
                <div class="boxWrap slideBox-1">

                    <ul class="banner">
                        <?php
                        foreach ($v['image'] as $i) { ?>
                            <li>
                                <a href="<?php echo isset($i['url']) ? $i['url'] : '#' ?>">
                                    <img src="<?php echo isset($i['image']) ? $i['image'] : '/cn/images/r-2.png' ?>" alt="">
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <?php
            }
            ?>
            <!--                    <div class="boxWrap slideBox-1">-->
            <!--                        <div class="hd">-->
            <!--                            <ul></ul>-->
            <!--                        </div>-->
            <!--                        <ul class="banner">-->
            <!--                            <li><a href="#"><img src="/cn/images/r-2.png" alt=""></a></li>-->
            <!--                            <li><a href="#"><img src="/cn/images/r-2.png" alt=""></a></li>-->
            <!--                            <li><a href="#"><img src="/cn/images/r-2.png" alt=""></a></li>-->
            <!--                        </ul>-->
            <!--                    </div>-->
            <!--                    <div class="boxWrap slideBox-1">-->
            <!--                        <div class="hd">-->
            <!--                            <ul></ul>-->
            <!--                        </div>-->
            <!--                        <ul class="banner">-->
            <!--                            <li><a href="#"><img src="/cn/images/r-2.png" alt=""></a></li>-->
            <!--                            <li><a href="#"><img src="/cn/images/r-2.png" alt=""></a></li>-->
            <!--                            <li><a href="#"><img src="/cn/images/r-2.png" alt=""></a></li>-->
            <!--                        </ul>-->
            <!--                    </div>-->
            <!--                </div>-->

        </div>
        <!--微信交流群-->
        <div class="exchange-wrap slideBox-2 bg-f">
            <div class="hd">
                <ul></ul>
            </div>
            <ul class="banner">
                <li>
                    <div class="inb erm2-wrap"><img src="/cn/images/erm-2.png" alt=""></div>
                    <div class="inb erm2-info">
                        <h1>托福交流微信群</h1>
                        <p class="ellipsis-2">随时随地了解雷哥网托福信息。</p>
                        <a href="#">扫描二维码立即进入</a>
                    </div>
                </li>
                <li>
                    <div class="inb erm2-wrap"><img src="/cn/images/erm-2.png" alt=""></div>
                    <div class="inb erm2-info">
                        <h1>托福交流微信群</h1>
                        <p class="ellipsis-2">随时随地了解雷哥网托福信息。</p>
                        <a href="#">扫描二维码立即进入</a>
                    </div>
                </li>
                <li>
                    <div class="inb erm2-wrap"><img src="/cn/images/erm-2.png" alt=""></div>
                    <div class="inb erm2-info">
                        <h1>托福交流微信群</h1>
                        <p class="ellipsis-2">随时随地了解雷哥网托福信息。</p>
                        <a href="#">扫描二维码立即进入</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<section class="questionWrap">

    <div class="modal-dialog">
        <div class="modal-dialog-title">
            <span class="modal-dialog-title-text" id=":2m" role="heading">提问</span>
            <span class="modal-dialog-title-close" role="button" tabindex="0" aria-label="Close"></span>
        </div>
        <div class="modal-dialog-content">
            <div class="before-ask-form">
                <b>提问前请先搜索</b>
                <div style="position:relative;margin-top:18px;">
                    <input type="text" class="zg-form-text-input" id="js-before-ask" placeholder="请输入你的问题">
                </div>
                <div class="ac-renderer">
                    <div class="ac-hive">
                        <div class="ac-row ac-first"><b>你想问的是不是：</b></div>
                        <div class="ac-list-one">
                            <div class="ac-row">
                                <a href="#">如何评价电影《希特勒回来了》(Er ist wieder da)?</a>
                                <span class="zm-ac-gray">285 个回答 </span>
                            </div>
                        </div>
                    </div>

                    <div class="ac-row ac-last iwanttoask">
                        <a href="javascript:;">不是，我要提一个新问题»</a>
                    </div>
                </div>
            </div>
            <form class="form-data" action="#">
                <div class="zm-add-question-form-topic-wrap">
                    <div class="zg-section-big">
                        <div class="zg-form-text-input add-question-title-form ">
                            <textarea class="zg-editor-input zu-seamless-input-origin-element" title="在这里输入问题"
                                      id="title" placeholder="写下你的问题"></textarea>
                        </div>
                        <div id="zh-question-suggest-ac-wrap" class="question-suggest-ac-wrap">
                            <div class="ac-renderer" role="listbox">
                                <div class="ac-head zg-gray">你的问题可能已经有答案</div>
                                <div class="ac-list-two">
<!--                                    <div class="ac-row goog-zippy-header goog-zippy-collapsed">-->
<!--                                        <a href="#">作？dsa</a> <span class="zm-ac-gray">3 个回答 </span>-->
<!--                                    </div>-->
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="zg-section-big">
                        <div class="add-question-section-title">
                            问题说明（可选）：
                        </div>
                        <div class="zm-editable-editor-field-wrap">
                            <textarea id="content" class="zm-editable-editor-field-element editable"></textarea>
                        </div>
                    </div>
                    <div class="add-question-section-title">
                        <span class="zg-gray fr hidden-phone">话题越精准，越容易让相关领域专业人士看到你的问题</span>
                        选择话题：
                        <span id="zh-question-form-tag-err">至少添加一个话题</span>
                    </div>
                    <div id="zh-question-suggest-topic-container" class="zm-tag-editor zg-section">
                        <div class="zm-tag-editor-labels"></div>
                        <div class="zm-tag-editor-editor zg-clear">
                            <div class="zm-tag-editor-command-buttons-wrap zg-left">
                                <label for="topic" class="zg-icon icon-magnify"></label>
                                <input class="zu-question-suggest-topic-input label-input-label" type="text"
                                       placeholder="搜索话题">
                                <a class="zg-mr15 zg-btn-blue" href="#" name="add" style="display: none;">添加</a>
                                <a href="#" name="close" style="display: none;">完成</a>
                                <label class="err-tip" style="display:none;">最多添加五个话题</label>
                                <div class="ac-renderer-2">
                                    <div class="ac-data" style="display: none"></div>
                                    <div class="ac-row ac-active ac-row-null" style="display: none">
                                        <span class="zu-autocomplete-row-name zu-info zu-autocomplete-row-name-info">没有找到话题：<b
                                                class="ac-highlighted"></b></span>
                                        <span
                                            class="add-new-topic zu-add-info zg-gray-normal zu-autocomplete-row-description">是否创建新话题</span>
                                    </div>
                                    <div class="ac-row ac-repeat ac-active" style="display: none">
                                        <span class="zg-gray-normal zu-autocomplete-row-description">请不要输入重复话题</span>
                                    </div>
                                </div>
                            </div>
                            <div class="zm-tag-editor-maxcount zg-section" style="display: none;">
                                <span>最多只能为一个问题绑定 5 个话题</span>
                                <a href="#" name="close" style="display: none;">完成</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="sug-con zg-clear" style="display: none;">
                    <span class="zg-gray-normal zg-left tip">推荐添加</span><span
                        class="sugs zg-clear zg-inline"></span>
                    <img data-src="https://static.zhihu.com/static/img/spinner2.gif" style="display: none;">
                </div>
                <div class="zm-command">
                    <a href="javascript:;" name="cancel" class="zm-command-cancel">取消</a>
                    <a href="javascript:;" name="addq" class="zg-r5px zu-question-form-add zg-btn-blue">发布</a>
                </div>
            </form>
        </div>

    </div>


</section>
