<?php

namespace app\modules\cn\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class HotSell extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%hot_sell}}';
    }


}
