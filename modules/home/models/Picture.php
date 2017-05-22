<?php

namespace app\modules\home\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class Picture extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%picture}}';
    }


}
