<?php

namespace app\modules\collection\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class Goods extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%flower}}';
    }

    public function getList($page,$where,$pageSize=10){
        $type = \Yii::$app->session->get('goodsType');
        $limit = " limit ".($page-1)*$pageSize.",".$pageSize;
        $order = " order by f.sort DESC" ;
        switch ($type){
            case 1: $table = 'course';break;
            case 2: $table = 'smart';break;
            case 3: $table = 'en';break;
            case 4: $table = 'book';break;
            case 5: $table = 'vip';break;
        }
        $sql = "select f.*,n.name as catName from {{%$table}} f LEFT JOIN {{%category}} n ON n.id = f.catId  WHERE $where $order $limit";
        $countSql = "select id from {{%$table}} WHERE $where";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $count = \Yii::$app->db->createCommand($countSql)->queryAll();
        $pageStr = Method::getPagedRows(['count'=>count($count),'pageSize'=>$pageSize, 'rows'=>'models']);
        return ['count' => $count,'data' => $data,'pageStr' => $pageStr];
    }

}
