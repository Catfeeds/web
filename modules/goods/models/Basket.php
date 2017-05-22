<?php

namespace app\modules\goods\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class Basket extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%basket}}';
    }

    public function getList($page,$where,$pageSize=10){
        $limit = " limit ".($page-1)*$pageSize.",".$pageSize;
        $order = " order by f.createTime DESC" ;
        $sql = "select f.id,f.sort,f.isIndex,f.status,f.goodsNumber,f.name,f.flowerDes,f.pack,f.price,f.createTimeStr,n.catName from {{%basket}} f LEFT JOIN (SELECT fc.basketId,GROUP_CONCAT(ca.`name`) catName  FROM {{%basket_category}} fc LEFT JOIN {{%category}} ca on ca.id=fc.catId GROUP BY fc.basketId )n ON n.basketId = f.id  WHERE $where $order $limit";
        $countSql = "select id from {{%basket}} WHERE $where";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $count = \Yii::$app->db->createCommand($countSql)->queryAll();
        $pageStr = Method::getPagedRows(['count'=>count($count),'pageSize'=>$pageSize, 'rows'=>'models']);
        return ['count' => $count,'data' => $data,'pageStr' => $pageStr];
    }

}
