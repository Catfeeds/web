<?php
/**
 * 订单管理
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-6-17
 * Time: 下午2:37
 */
namespace app\modules\cn\controllers;

use app\libs\Method;
use app\libs\Pager;
use yii;
use app\libs\ToeflController;
use app\libs\yii2_alipay\AlipayPay;
use app\libs\Sms;

class UserController extends ToeflController {
    public $enableCsrfValidation = false;

    function init (){
        parent::init();
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
    }

    /**
     * 订单列表
     * @return string
     * @Obelisk
     */
    public function actionGmatOrder(){
        $uid = Yii::$app->session->get('uid');
        $page = Yii::$app->request->get('page',1);
        $status = Yii::$app->request->get('status','');
        if($status == 3){
            $status = '';
        }
        if(!$uid){
            die('<script>alert("请登录");history.go(-1);</script>');
        }
        $data = Method::post(Yii::$app->params['gmatUrl']."/index.php?web/webapi/classOrder",['uid' => $uid,'status' => $status,'pageSize' => 10,'page' => $page]);
        $data = json_decode($data,true);
        $count = $data['count'];
        $data = $data['data'];
        $pageModel = new Pager($count,$page,10);
        $pageStr = $pageModel->GetPagerContent();
        return $this->renderPartial("gmatOrder",['data' => $data,'pageStr' =>$pageStr]);
    }

    public function actionSmartOrder(){
        $uid = Yii::$app->session->get('uid');
        $page = Yii::$app->request->get('page',1);
        $status = Yii::$app->request->get('status','');
        if($status == 3){
            $status = '';
        }
        if(!$uid){
            die('<script>alert("请登录");history.go(-1);</script>');
        }
        $order = Method::post("http://order.gmatonline.cn/pay/api/class-order",['belong' => 3,'uid' => $uid,'status' => $status,'page' => $page]);
        $order = json_decode($order,true);
        $count = $order['count'];
        $order = $order['data'];
        $pageModel = new Pager($count,$page,10);
        $pageStr = $pageModel->GetPagerContent();
        return $this->renderPartial("smartOrder",['order' => $order,'pageStr' =>$pageStr]);
    }

    public function actionToeflOrder(){
        $uid = Yii::$app->session->get('uid');
        $page = Yii::$app->request->get('page',1);
        $status = Yii::$app->request->get('status','');
        if($status == 3){
            $status = '';
        }
        if(!$uid){
            die('<script>alert("请登录");history.go(-1);</script>');
        }
        $order = Method::post("http://order.gmatonline.cn/pay/api/class-order",['belong' => 2,'uid' => $uid,'status' => $status,'page' => $page]);
        $order = json_decode($order,true);
        $count = $order['count'];
        $order = $order['data'];
        $pageModel = new Pager($count,$page,10);
        $pageStr = $pageModel->GetPagerContent();
        return $this->renderPartial("toeflOrder",['order' => $order,'pageStr' =>$pageStr]);
    }

    public function actionClassOrder(){
        $uid = Yii::$app->session->get('uid');
        $page = Yii::$app->request->get('page',1);
        $status = Yii::$app->request->get('status','');
        if($status == 3){
            $status = '';
        }
        if(!$uid){
            die('<script>alert("请登录");history.go(-1);</script>');
        }
        $order = Method::post("http://order.gmatonline.cn/pay/api/class-order",['belong' => 5,'uid' => $uid,'status' => $status,'page' => $page]);
        $order = json_decode($order,true);
        $count = $order['count'];
        $order = $order['data'];
        $pageModel = new Pager($count,$page,10);
        $pageStr = $pageModel->GetPagerContent();
        return $this->renderPartial("classOrder",['classOrder' => $order,'pageStr' =>$pageStr]);
    }

    /**
     * 雷豆充值
     * @Obelisk
     */

    public function actionIntegral(){
        $session = Yii::$app->session;
        $userId = $session->get('userId');
        $userData = $session->get('userData');
        if(!$userId){
            die('<script>alert("请登录");history.go(-1);</script>');
        }
        $integral = uc_user_integral($userData['userName']);
        return $this->renderPartial('integral',['integral' => $integral['integral']]);
    }
}