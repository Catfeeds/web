<?php

namespace app\modules\home\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class Top extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%top}}';
    }


}
