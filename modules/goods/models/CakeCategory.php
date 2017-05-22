<?php

namespace app\modules\goods\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class CakeCategory extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%cake_category}}';
    }


}
