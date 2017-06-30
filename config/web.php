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
        'goods' => [

            'class'=>'app\modules\goods\GoodsModule'

        ],
        'home' => [

            'class'=>'app\modules\home\HomeModule'

        ],
        'cn' => [

            'class'=>'app\modules\cn\CnModule'

        ],
        'collection' => [

            'class'=>'app\modules\collection\CollectionModule'

        ],
        'user' => [

            'class'=>'app\modules\user\UserModule'

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

            'rules' => [
                ''=>'cn/index',

                'select-<word>/page-<page:\d+>.html'=>'cn/subject/select',

                'subject/<catId:\d+>.html' => 'cn/subject/index',

                'subject-<catId:\d+>/page-<page:\d+>.html' => 'cn/subject/index',

                'goods/<id:\d+>/<type:\d+>.html' => 'cn/subject/details',

                'cart.html' => 'cn/cart/index',

                'integral.html' => 'cn/lei-dou/index', //雷豆

                'integral/<type:\d+>/<page:\d+>.html' => 'cn/lei-dou/index', //雷豆

                'use.html' => 'cn/lei-dou/use',

                'gmat_order.html' => 'cn/user/gmat-order',

                'gmat_order/<status:\d+>/<page:\d+>.html' => 'cn/user/gmat-order',

                'smart_order.html' => 'cn/user/smart-order',

                'smart_order/<status:\d+>/<page:\d+>.html' => 'cn/user/smart-order',

                'toefl_order.html' => 'cn/user/toefl-order',

                'toefl_order/<status:\d+>/<page:\d+>.html' => 'cn/user/toefl-order',

                'class_order.html' => 'cn/user/class-order',

                'class_order/<status:\d+>/<page:\d+>.html' => 'cn/user/class-order',
                
                'vip.html' => 'cn/vip/vip',

                'studyGroup.html' => 'cn/study-group/study-group',

                'studyTool.html' => 'cn/study-tool/study-tool',
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



