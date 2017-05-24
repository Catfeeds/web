<?php

namespace app\modules\cn\models;

use app\libs\GoodsPager;
use app\libs\Method;
use yii\db\ActiveRecord;

class Goods extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%goods}}';
    }

    public function getAllFlower($where,$page,$pageSize){

    }
}
