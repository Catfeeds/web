<?php

namespace app\modules\home\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class ModuleFlower extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%modules_flower}}';
    }


    public function getModuleFlower($id){
        $sql = "select mf.id as mid,f.*,n.catName from {{%modules_flower}} mf LEFT JOIN {{%flower}} f on mf.flowerId=f.id LEFT JOIN (SELECT fc.flowerId,GROUP_CONCAT(ca.`name`) catName  FROM {{%flower_category}} fc LEFT JOIN {{%category}} ca on ca.id=fc.catId GROUP BY fc.flowerId )n ON n.flowerId = f.id WHERE mf.moduleId=$id";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }


}
