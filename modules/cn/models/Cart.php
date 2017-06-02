<?php

namespace app\modules\cn\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%cart}}';
    }

    public function mergeCart(){
        $shopCart = \Yii::$app->session->get('shopCart');
        $uid = \Yii::$app->session->get('uid');
        if($shopCart){
            foreach($shopCart as $v){
                $sign = $this->find()->where("type= {$v['type']} AND goodsId = {$v['goodsId']} AND uid=$uid")->one();
                if($sign){
                    $this->updateAll(['num' => ($sign->num+$v['num'])],"id=$sign->id");
                }else{
                    $this->goodsId = $v['goodsId'];
                    $this->num = $v['num'];
                    $this->uid = $uid;
                    $this->type = $v['id'];
                    $this->createTime = time();
                    $this->save();
                }
            }
            \Yii::$app->session->remove('shopCart');
        }
    }

}
