<?php

namespace app\modules\cn\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class Cake extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%cake}}';
    }

}
