<?php

namespace app\modules\goods\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class Smart extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%Smart}}';
    }

}
