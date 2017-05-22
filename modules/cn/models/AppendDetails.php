<?php

namespace app\modules\cn\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class AppendDetails extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%append_details}}';
    }


}
