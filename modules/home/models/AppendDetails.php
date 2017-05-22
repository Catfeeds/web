<?php

namespace app\modules\home\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class AppendDetails extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%append_details}}';
    }


}
