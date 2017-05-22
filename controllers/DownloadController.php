<?php

namespace app\controllers;

use Yii;
use app\libs\ApiControl;
use yii\web\ViewAction;


class DownloadController extends ApiControl
{
    public function actionIndex()
    {

        $file = substr($_GET['file'],1);
        $fileName = $_GET['fileName'];
        $this->downfile($file,$fileName);
    }
    public function downfile($file,$fileName)
    {
        if (file_exists($file)) {
// 输入文件标签
            header ("Content-type: octet/stream");
            header ("Content-disposition: attachment; filename=".$fileName.";");
            header("Content-Length: ".filesize($file));
            readfile($file);
        } else {
            echo("文件不存在!");
            exit;
        }

    }
}