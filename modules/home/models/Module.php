<?php

namespace app\modules\home\models;

use app\libs\Method;
use app\modules\cn\models\Category;
use yii\db\ActiveRecord;

class Module extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%modules}}';
    }

    public function getRelateCategory($id){
        $sign = Module::findOne($id);
        $idArr = $sign->relateCategory;
        if(!$idArr){
            $idArr = '';
        }
        if($sign->location == 3){
            $data = \Yii::$app->db->createCommand('select id,name as text from {{%category}} where pid = 0 AND type = 1')->queryAll();
        }else{
            $data = \Yii::$app->db->createCommand('select id,name as text from {{%category}} where pid != 0 AND type =1')->queryAll();
        }
        $idArr = explode(",",$idArr);
        foreach($data as $k => $v){
            if($id){
                if(in_array($v['id'],$idArr)){
                    $data[$k]['checked'] = true;
                }
            }
        }
        return $data;
    }


}
