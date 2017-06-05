<?php

/**
 * toefl API
 * Created by PhpStorm.
 * User: obelisk
 */

namespace app\modules\cn\controllers;


use app\libs\Method;

use app\modules\cn\models\Cart;
use app\modules\cn\models\Goods;
use yii;

use app\libs\ToeflApiControl;

use app\libs\VerificationCode;

use app\libs\Sms;

use app\modules\cn\models\Content;

use app\modules\cn\models\ReceiveUser;

use app\modules\cn\models\User;

use app\modules\cn\models\UserEvaluate;

use UploadFile;


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With');
header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
class ApiController extends ToeflApiControl
{
    function init (){
        parent::init();
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
    }

    public $enableCsrfValidation = false;


    /**
     * 学员评价接口
     * by yanni
     */
    public function actionUserEvaluate(){
        $session = Yii::$app->session;
        $userId = $session->get('userId');
        $smartId = Yii::$app->request->post('smartId');
        $content = Yii::$app->request->post('content');
        if (!$userId) {
            die(json_encode(['code' => 0,'message'=>'请登录']));
        }
        if($content){
            $model = new UserEvaluate();
            $model->contentId = $smartId;
            $model->userId = $userId;
            $model->value = $content;
            $model->createTime = time();
            $re = $model->save();
            if($re>0){
                $data = UserEvaluate::findOne($model->primaryKey);
                $sign = User::findOne($data['userId']);
                $data['username'] =$sign['username'];
                $res = ['code'=>1,'message'=>'评价成功','data'=>$data];
            } else {
                $res = ['code'=>0,'message'=>'评价失败'];
            }
        } else{
            $res = ['code'=>0,'message'=>'请填写评价'];
        }
        die(json_encode($res));
    }
    /**
     * 领取课程接口
     * by yanni
     */
    public function actionReceiveCourses(){
        $phone = Yii::$app->request->post('phone');
        $code = Yii::$app->request->post('code');
        $name = Yii::$app->request->post('name');
        $checkTime = $this->checkTime();
        if(!$checkTime){
            $res['code'] = 0;
            $res['message'] = '验证码过期';
        }else{
            $checkCode = $this->checkCode($phone,$code);
            if(!$checkCode){
                $res['code'] = 0;
                $res['message'] = '验证码错误';
            }else{
                $checkPhone = $this->checkPhone($phone);
                if($checkPhone){
                    $model = new ReceiveUser();
                    $model->name = $name;
                    $model->phone = $phone;
                    $model->createTime = time();
                    $re = $model->save();
                    if($re>0){
                        $res['code'] = 1;
                        $res['message'] = '我们的工作人员将于1-2个工作日内跟你联系';
                    }
                } else {
                    $res['code'] = 0;
                    $res['message'] = '此电话已经有人领取过';
                }
            }
        }
        die(json_encode($res));
    }

    /**
     * 验证短信码
     * @Obelisk
     */
    public function checkCode($phone,$code){
        $phoneCode = \Yii::$app->session->get($phone.'phoneCode');
        if($phoneCode == $code){
            \Yii::$app->session->remove($phone.'phoneCode');
            $re = true;
        }else{
            $re = false;
        }
        return $re;
    }
    /**
     * 验证短信的时间是否过期
     * @Obelisk
     */
    public function checkTime(){
        $phoneTime = \Yii::$app->session->get('phoneTime');
        $timeLimit = \Yii::$app->params['timeLimit'];
        if(time()-$phoneTime>$timeLimit){
            $re = false;
        }else{
            $re = true;
        }
        return $re;
    }
    /**
     * 验证电话是否领取过课程
     * by yanni
     */
    public function checkPhone($phone){
        $data = ReceiveUser::find()->asArray()->where("phone=".$phone)->one();
        if(count($data)>0){
            $res = false;
        } else {
            $res = true;
        }
        return $res;
    }
    /**
     * 短信接口
     * @Obelisk
     */

    public function actionPhoneCode()

    {

        $session = Yii::$app->session;

        $sms = new Sms();

        $phoneNum = Yii::$app->request->post('phoneNum');

        if (!empty($phoneNum)) {

            $phoneCode = mt_rand(100000, 999999);

            $session->set($phoneNum . 'phoneCode', $phoneCode);

            $session->set('phoneTime', time());

            $content = '验证码：' . $phoneCode . '（10分钟有效），您正在通过手机免费领取课程！【雷哥网】';

            $sms->send($phoneNum, $content, $ext = '', $stime = '', $rrid = '');

            $res['code'] = 1;

            $res['message'] = '短信发送成功！';

        } else {

            $res['code'] = 0;

            $res['message'] = '发送失败!手机号码为空！';

        }

        die(json_encode($res));

    }


    /**
     * 添加购物车
     * @Obelisk
     */
    public function actionAddCart(){
        $session =  Yii::$app->session;
        $uid = $session->get('uid');
        $id = Yii::$app->request->post('id');
        $type = Yii::$app->request->post('type');
        $num = Yii::$app->request->post('num',1);
        $model = new Cart();
        $sign = 0;
        if($uid){
            $sign = $model->find()->where("type = $type AND goodsId=$id AND uid=$uid")->one();
            if($sign){
                Cart::updateAll(['num' =>($sign->num+$num)],"id=$sign->id");
            }else{
                $model->uid = $uid;
                $model->num = $num;
                $model->goodsId = $id;
                $model->type = $type;
                $model->createTime = time();
                $model->save();
            }
        }else{
            $shopCart = $session->get('shopCart');
            if(!$shopCart){
                $arr = [];
                $shopCart = [];
                $arr['num'] = $num;
                $arr['goodsId'] = $id;
                $arr['type'] = $type;
                $arr['createTime'] = time();
                $shopCart[] = $arr;
                $session->set('shopCart',$shopCart);
            }else{
                foreach($shopCart as $k => $v){
                    if($v['goodsId'] == $id && $v['type'] == $type){
                        $shopCart[$k]['num'] += $num;
                        $sign = 1;break;
                    }
                }
                if(!$sign){
                    $arr = [];
                    $arr['num'] = $num;
                    $arr['goodsId'] = $id;
                    $arr['type'] = $type;
                    $arr['createTime'] = time();
                    $shopCart[] = $arr;
                }
                $session->set('shopCart',$shopCart);
            }
        }
        die(json_encode(['code' => 1]));
    }

    /**
     * @Obelisk
     */
    public function actionCartChangeNum(){
        $session =  Yii::$app->session;
        $uid = $session->get('uid');
        $goodsId = Yii::$app->request->post('goodsId');
        $type = Yii::$app->request->post('type');
        $num = Yii::$app->request->post('num');
        if($uid){
            $sign = Cart::updateAll(['num' => $num],"goodsId=$goodsId AND type=$type AND uid=$uid");
        }else{
            $data = $session->get('shopCart');
            foreach($data as $k=>$v){
                if($goodsId==$v['goodsId'] && $type==$v['type']){
                    $data[$k]['num'] = $num;
                    $sign = 1;break;
                }else{
                    $sign = 0;
                }
            }
            $session->set('shopCart',$data);
        }
        if($sign){
            $res['code'] = 1;

            $res['message'] = '修改成功';
        }else{
            $res['code'] = 0;

            $res['message'] = '修改失败';
        }

        die(json_encode($res));
    }

    /**
     * @Obelisk
     */
    public function actionDeleteCart(){
        $session =  Yii::$app->session;
        $uid = $session->get('uid');
        $goodsId = Yii::$app->request->post('goodsId');
        $type = Yii::$app->request->post('type');
        if($uid){
            if(is_array($goodsId)){
                foreach($goodsId as $k=>$v){
                    $sign = Cart::deleteAll("goodsId=$v AND type={$type[$k]} AND uid=$uid");
                }
            }else{
                $sign = Cart::deleteAll("goodsId=$goodsId AND type=$type AND uid=$uid");
            }
        }else{

            $data = $session->get('shopCart');
            if(is_array($goodsId)){
                foreach($data as $k=>$v){
                    foreach($goodsId as $key => $val){
                        if($val==$v['goodsId'] && $type[$key]==$v['type']){
                            unset($data[$k]);break;
                        }
                    }
                }
            }else{
                foreach($data as $k=>$v){
                    if($goodsId==$v['goodsId'] && $type==$v['type']){
                        unset($data[$k]);
                    }
                }
            }
            $session->set('shopCart',$data);
        }
        die(json_encode(['code' => 1,'message' => '删除成功']));
    }

    public function actionToBuy(){
        $session =  Yii::$app->session;
        $uid = $session->get('uid');
        if(!$uid){
            $re['code'] = 0;
            $re['message'] = '请登录';
            die(json_encode($re));
        }
        $id = Yii::$app->request->post('id');
        $type = Yii::$app->request->post('type');
        $model = new Goods();
        $data = $model->getBuyGoods($id,$type);
        $goods[0] = $data;
        $data = ['typeUrl' => 'classUrl','type' => 5,'totalMoney' => $data['price'],'goods' =>$goods];
        $re = ['code' => 1,'data' => serialize($data)];
        die(json_encode($re));
    }

    /**
     * @Obelisk
     */
    public function actionCartClearing(){
        $session =  Yii::$app->session;
        $uid = $session->get('uid');
        if(!$uid){
            $re['code'] = 0;
            $re['message'] = '请登录';
            die(json_encode($re));
        }
        $id = Yii::$app->request->post('id');
        if(count($id)<=0){
            $re['code'] = 0;
            $re['message'] = '请选择结算商品';
            die(json_encode($re));
        }
        $model = new Goods();
        $data = $model->getCartGoods($id,$uid);
        $data = ['typeUrl' => 'classUrl','type' => 5,'totalMoney' => $data['totalMoney'],'goods' =>$data['data']];
        $re = ['code' => 1,'data' => serialize($data)];
        die(json_encode($re));
    }

    /**
     * 发送邮箱
     * @Obelisk
     */

    public function actionSendMail()
    {

        $session = Yii::$app->session;

        $emailCode = mt_rand(100000, 999999);

        $email = Yii::$app->request->post('email');

        $session->set($email . 'phoneCode', $emailCode);

        $session->set('phoneTime', time());

        $mail = Yii::$app->mailer->compose();

        $mail->setTo($email);

        $mail->setSubject("【SmartApply留学商城】邮件验证码");

        $mail->setHtmlBody('

            <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

            <div style="width: 800px;margin: 0 auto;margin-bottom: 10px">

                 <img src="http://www.smartapply.cn/cn/images/head_logo.png" alt="logo">

            </div>

            <div style="width: 830px;border: 1px #dcdcdc solid;margin: 0 auto;overflow: hidden">

                 <p style="font-weight: bold;font-size: 18px;margin-left: 20px;color: #34388e;font-family: 微软雅黑;">亲爱的用户 ：</p>

                <span style="margin-left: 20px;font-family: 微软雅黑;">

            你好！你正在注册SmartApply留学商城，网址<a href="http://www.smartapply.cn">www.smartapply.cn</a>。你的验证码为：【<span style="color:#ff913e;">' . $emailCode . '</span>】。（有效期为：此邮件发出后48小时）
                </span>
                <p style="margin-left: 20px;font-family: 微软雅黑;">
                添加微信公众号：<span style="color:green;font-weight:bold">小申托福在线</span>，获取出国留学最新信息~
                </p>
            <div style="width: 100%;background: #e8e8e8;padding:5px 20px;font-size:12px;box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;margin-top: 30px;color: #808080;font-family: 微软雅黑;">

            温馨提示：请你注意保护你的邮箱，避免邮件被他人盗用哟！

            </div>

            </div>

            <div style="font-size: 12px;width: 800px;margin: 0 auto;text-align: right;color: #808080;">


        </div>

        '

        );    //发布可以带html标签的文本

        if ($mail->send()) {

            $res['code'] = 1;

            $res['message'] = '邮件发送成功！';

        } else {

            $res['code'] = 0;

            $res['message'] = '邮件发送失败！';

        }

        die(json_encode($res));

    }

    /**
     * 点击获取验证码
     * @Obelisk
     */
    public function actionVerificationCode(){
        $_vc = new VerificationCode();  //实例化一个对象
        $_vc->doimg();
        Yii::$app->session->set('verificationCode',$_vc->getCode());//验证码保存到SESSION中
    }

    /**
     * 获取用户积分
     * @Obelisk
     */
    public function actionGetIntegral(){
        $session = Yii::$app->session;
        $userId = $session->get('userId');
        if (!$userId) {
            $re = ['code' => 2];
            die(json_encode($re));
        }
        $userData = $session->get('userData');
        $data = uc_user_integral($userData['userName']);
        foreach($data['details'] as $k => $v){
            $data['details'][$k]['createTime'] = date('Y-m-d',$v['createTime']);
        }
        die(json_encode($data));
    }

    /**
     * 总调度
     * @Obelisk
     */
    public function actionUnifyLogin(){
        $session = Yii::$app->session;
        $model = new User();
        $uid = Yii::$app->request->get('uid');
        $username = Yii::$app->request->get('username');
        $phone = Yii::$app->request->get('phone');
        $email =Yii::$app->request->get('email');
        $password =Yii::$app->request->get('password');
        $loginsdata = $model->find()->where("uid = $uid")->one();
        if (empty($loginsdata['uid'])) {
            $login = clone $model;

            $login->phone = $phone;

            $login->email = $email;

            $login->createTime = time();

            $login->username = $username;

            $login->password = md5($password);

            $login->roleId = 4;

            $login->uid = $uid;

            $login->save();
        }else{
            if($phone != $loginsdata['phone']){
                User::updateAll(['phone' => $phone],"uid=$uid");
            }
            if($email != $loginsdata['email']){
                User::updateAll(['email' => "$email"],"uid=$uid");
            }
            if($username != $loginsdata['username']){
                User::updateAll(['username' => "$username"],"uid=$uid");
            }
            if(md5($password) != $loginsdata['password']){
                $password = md5($password);
                User::updateAll(['password' => "$password"],"uid=$uid");
            }
        }
        $session->set('uid', $uid);
        $data = User::find()->asArray()->where("uid=$uid")->one();
        $session->set('userData', $data);
        $session->set('cartSign', 1);
    }
}