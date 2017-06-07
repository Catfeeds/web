<?php
/**
 * 雷豆
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use yii;
use app\libs\ToeflController;
use app\libs\Pager;

class LeiDouController extends ToeflController {
    public $enableCsrfValidation = false;
    function init (){
        parent::init();
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
    }

    /**
     * 积分列表
     * @return string
     * by  yanni
     */
    public function actionIndex(){
        $session = Yii::$app->session;
        $userId = $session->get('uid');
        if(!$userId){
            die('<script>alert("请登录");history.go(-1);</script>');
        }
        $page = Yii::$app->request->get('page',1);
        $pageSize = Yii::$app->request->get('pageSize',15);
        $type = Yii::$app->request->get('type',0);
        $limit = (($page-1)*$pageSize).",$pageSize";
        $where = '';
        if($type == 1){
            $where .= 'AND type=1';
        }
        if($type == 2){
            $where .= 'AND type=2';
        }
        $userData = $session->get('userData');
        $data = uc_user_integral($userData['username'],"limit $limit",$where);
        if(!is_array($data['details'])){
            $data['details'] = [];
        }
        $pageModel = new Pager($data['count'],$page,$pageSize);
        $pageStr = $pageModel->GetPagerContent();
        return $this->renderPartial('index',['userData' => $userData,'integral' => $data['integral'],'pageStr' => $pageStr,'details' => $data['details']]);
    }

    /**
     * 积分用途
     * @return string
     * @Obelisk
     */
    public function actionUse(){
        return $this->renderPartial('use');
    }


}