<?php

namespace app\modules\home\models;

use app\libs\Method;
use yii\db\ActiveRecord;

class ModuleCategory extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%modules_category}}';
    }


}
