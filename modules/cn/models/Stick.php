<?php

namespace app\modules\cn\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class Stick extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%stick}}';
    }


}
