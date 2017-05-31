<?php

namespace app\modules\collection\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class ReceiveUser extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%receive_user}}';
    }

    public function getReceiveUser($page,$pageSize)
    {
        $limit = " limit ".($page-1)*$pageSize.",".$pageSize;
        $sql = "SELECT * FROM {{%receive_user}}";
        $count = count(\Yii::$app->db->createCommand($sql)->queryAll());
        $sql .= " order by createTime DESC";
        $sql .= " $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $page = Method::getPagedRows(['count'=>$count,'pageSize'=>$pageSize, 'rows'=>'models']);
        return ['data'=>$data,'page'=>$page];
    }

}
