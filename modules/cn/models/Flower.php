<?php

namespace app\modules\cn\models;

use app\libs\GoodsPager;
use app\libs\Method;
use yii\db\ActiveRecord;

class Flower extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%flower}}';
    }

    public function getAllFlower($where,$page,$pageSize,$order){
        $limit = " limit ".($page-1)*$pageSize.",".$pageSize;
        $sql = "select f.* from {{%flower}} f   WHERE $where $order $limit";
        $countSql = "select id from {{%flower}} f WHERE $where";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $count = count(\Yii::$app->db->createCommand($countSql)->queryAll());
        $totalPage = ceil($count/$pageSize);
        $pageModel = new GoodsPager($count,$page,$pageSize,5);
        $pageStr = $pageModel->GetPagerContent();
        return ['count' => $count,'data' => $data,'pageStr' => $pageStr,'totalPage' =>$totalPage];
    }
}
