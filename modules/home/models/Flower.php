<?php

namespace app\modules\home\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class Flower extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%flower}}';
    }

    public function getList($page,$where,$pageSize=10){
        $limit = " limit ".($page-1)*$pageSize.",".$pageSize;
        $order = " order by f.createTime DESC" ;
        $sql = "select f.id,f.status,f.goodsNumber,f.name,f.flowerDes,f.pack,f.price,f.createTimeStr,n.catName from {{%flower}} f LEFT JOIN (SELECT fc.flowerId,GROUP_CONCAT(ca.`name`) catName  FROM {{%flower_category}} fc LEFT JOIN {{%category}} ca on ca.id=fc.catId GROUP BY fc.flowerId )n ON n.flowerId = f.id  WHERE $where $order $limit";
        $countSql = "select id from {{%flower}} f WHERE $where";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $count = \Yii::$app->db->createCommand($countSql)->queryAll();
        $pageStr = Method::getPagedRows(['count'=>count($count),'pageSize'=>$pageSize, 'rows'=>'models']);
        return ['count' => $count,'data' => $data,'pageStr' => $pageStr];
    }

}
