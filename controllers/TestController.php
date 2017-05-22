<?php

namespace app\controllers;

use Yii;
use app\libs\ApiControl;


class TestController extends ApiControl
{
    public function actionIndex()
    {

        $url = "http://fanyi.youdao.com/openapi.do?keyfrom=5asdfasdf6&key=925644231&type=data&only=dict&doctype=json&version=1.1&q=name";
        $list = file_get_contents($url);
        $js_de = json_decode($list,true);
        var_dump($js_de);die;
        return $this->renderPartial('index');
    }

    public function actionTest()
    {

        $data = $this->post('http://shop.cc/cn/api/api-content',['category' => '155,162','pageSize' => 3]);
        var_dump($data);
    }

    public  function post($url, $post_data = '', $timeout = 20){//curl

        $ch = curl_init();

        curl_setopt ($ch, CURLOPT_URL, $url);

        curl_setopt ($ch, CURLOPT_POST, 1);

        if($post_data != ''){

            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

        }

        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

        curl_setopt($ch, CURLOPT_HEADER, false);

        $file_contents = curl_exec($ch);

        curl_close($ch);

        return $file_contents;

    }

}
