<?php

namespace app\modules\cn\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class ReceiveUser extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%receive_user}}';
    }

}
