<?php

namespace app\modules\goods\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class Cake extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%cake}}';
    }

    public function getList($page,$where,$pageSize=10){
        $limit = " limit ".($page-1)*$pageSize.",".$pageSize;
        $order = " order by f.createTime DESC" ;
        $sql = "select f.id,f.sort,f.isIndex,f.status,f.goodsNumber,f.name,f.flowerDes,f.pack,f.price,f.createTimeStr,n.catName from {{%cake}} f LEFT JOIN (SELECT fc.cakeId,GROUP_CONCAT(ca.`name`) catName  FROM {{%cake_category}} fc LEFT JOIN {{%category}} ca on ca.id=fc.catId GROUP BY fc.cakeId )n ON n.cakeId = f.id  WHERE $where $order $limit";
        $countSql = "select id from {{%cake}} WHERE $where";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $count = \Yii::$app->db->createCommand($countSql)->queryAll();
        $pageStr = Method::getPagedRows(['count'=>count($count),'pageSize'=>$pageSize, 'rows'=>'models']);
        return ['count' => $count,'data' => $data,'pageStr' => $pageStr];
    }

}
