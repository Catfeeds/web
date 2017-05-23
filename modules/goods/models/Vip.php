<?php

namespace app\modules\goods\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class Vip extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%vip}}';
    }


}
