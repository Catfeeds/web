<?php

namespace app\modules\goods\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class FlowerCategory extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%flower_category}}';
    }


}
