<?php



$params = require(__DIR__ . '/params.php');

Yii::$classMap['Method'] = '@app/libs/Method.php';

Yii::$classMap['UploadFile'] = '@app/libs/upload/UploadFile.php';

Yii::$classMap['AlipaySubmit'] = '@app/libs/yii2_alipay/AlipaySubmit.php';



$config = [

    'id' => 'basic',

    'basePath' => dirname(__DIR__),

    'bootstrap' => ['log'],

    'modules' => [

        'content' => [

                    'class'=>'app\modules\content\ContentModule'

                ],

        'basic' => [

            'class'=>'app\modules\basic\BasicModule'

        ],



        'user' => [

            'class'=>'app\modules\user\UserModule'

        ],



        'cn' => [

            'class'=>'app\modules\cn\CnModule'

        ],



        'hot' => [

            'class'=>'app\modules\hot\HotModule'

        ],

        'recommend' => [

            'class'=>'app\modules\recommend\RecommendModule'

        ],

        'pay' => [

            'class'=>'app\modules\pay\PayModule'

        ],

    ],

    'components' => [

        'request' => [

            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation

            'cookieValidationKey' => '3ggkbEhqR-n2ASj19BJSpbdvpmbO4NwK',

        ],

//        'cache' => [
//
//            'class' => 'yii\caching\MemCache',
//
//            'servers'=> [['host'=>'127.0.0.1','port'=>'11211']]
//
//        ],

//        'errorHandler' => [
//
//            'errorAction' => 'site/error',
//
//        ],

        'mailer' => [

            'class' => 'yii\swiftmailer\Mailer',

            'useFileTransport' =>false,//这句一定有，false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件

            'transport' => [

                'class' => 'Swift_SmtpTransport',

                'host' => 'smtp.qq.com',  //每种邮箱的host配置不一样

                'username' => '2565225484@qq.com',

                'password' => 'pfglhtsistrneaif',

                'port' => '25',

                'encryption' => 'tls',



            ],

            'messageConfig'=>[

                'charset'=>'UTF-8',

                'from'=>['2565225484@qq.com'=>'雷哥网']

            ],

        ],

        'urlManager' => [

             'enablePrettyUrl' => true,

             'showScriptName' => false,

             //'suffix' => '.html',

             'rules' => [
                 ''=>'cn/index',

                 'cn/heard/mo-kao.html'=>'cn/heard/mo-kao',

                 'cn/heard'=>'error',

                 'post/<selectId:\d+>.html' => 'cn/index/index',

                 'add.html' => 'cn/post/add-post',

                 'gossip/<selectId:\d+>.html' => 'cn/index/gossip',

                 'post/details/<id:\d+>.html' => 'cn/post/index',

                 'gossip/details/<id:\d+>.html' => 'cn/gossip/index',

                 'post/list/<catId:\d+>.html' => 'cn/index/post-list',

                 'post/list/<catId:\d+>/<page:\d+>.html' => 'cn/index/post-list',

                 'gossip/list/<catId:\d+>.html' => 'cn/index/gossip-list',

                 'gossip/list/<catId:\d+>/<page:\d+>.html' => 'cn/index/gossip-list',

                 'gossip/list.html' => 'cn/index/gossip-list',

                 'topic_square.html' => 'cn/topic/topic-list',  //话题广场

                 '/cn/question/<topicId:\d+>-<questionId:\d+>.html' =>'/cn/topic/question',

                 'search/<keywords>.html' => 'cn/index/search-list',

                 'search/<keywords>/<page:\d+>.html' => 'cn/index/search-list',

                 'listening/<id:\d+>/<type:\d+>/<num:\d+>.html' => 'cn/heard/careful-listening',

                 'lock/<catId:\d+>.html' => 'cn/index/lock',

                 'topic/<topicId:\d+>.html' => 'cn/topic/index',

             ],

         ],



        'log' => [

            'traceLevel' => YII_DEBUG ? 3 : 0,

            'targets' => [

                [

                    'class' => 'yii\log\FileTarget',

                    'levels' => ['error', 'warning'],

                ],

            ],

        ],

        'db' => require(__DIR__ . '/db.php'),

    ],

    'params' => $params,

];



if (YII_ENV_DEV) {

    // configuration adjustments for 'dev' environment

    $config['bootstrap'][] = 'debug';

    $config['modules']['debug'] = 'yii\debug\Module';



    $config['bootstrap'][] = 'gii';

    $config['modules']['gii'] = 'yii\gii\Module';

}



return $config;



