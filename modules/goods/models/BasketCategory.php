<?php

namespace app\modules\goods\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class BasketCategory extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%basket_category}}';
    }


}
