<?php
//function guid()
//{
//    mt_srand((double)microtime() * 10000);
//    $charid = strtolower(md5(uniqid(rand(), true)));
//    $uuid = substr($charid, 0, 8) . substr($charid, 8, 4) . substr($charid, 12, 4) . substr($charid, 16, 4) . substr($charid, 20, 12);
//    return $uuid;
//}
//die(guid());
header("Content-Type:text/html;charset=utf-8");
//// comment out the following two lines when deployed to production28
defined('YII_DEBUG') or define('YII_DEBUG', 1);
defined('YII_ENV') or define('YII_ENV', '1');
//
require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
//增加移动端访问代�?
//require(__DIR__ . '/../libs/Mobile_Detect.php');
//$detect = new Mobile_Detect;
//$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
//switch ($deviceType){
//    case 'tablet':
//        header('Location: http://m.thinkwithu.com/');
//        break;
//    case 'phone':
//        header('Location: http://m.thinkwithu.com/');
//        break;
//    default:
//        break;
//}
$config = require(__DIR__ . '/../config/web.php');
error_reporting(0);

(new yii\web\Application($config))->run();
