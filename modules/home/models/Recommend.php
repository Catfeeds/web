<?php

namespace app\modules\home\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class Recommend extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%recommend}}';
    }


}
