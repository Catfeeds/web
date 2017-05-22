<?php

namespace app\modules\home\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class HotSell extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%hot_sell}}';
    }


}
