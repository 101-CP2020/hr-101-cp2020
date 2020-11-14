<?php

namespace app\models;

use app\tables\TblOkved;
use yii\helpers\ArrayHelper;

class Okved extends TblOkved
{
    public function attributeLabels()
    {
        return [
            'okved' => 'ОКВЭД',
            'title' => 'Название',
        ];
    }

    public static function getList()
    {
        return ArrayHelper::map(self::find()->select([
            'okved',
            "CONCAT(title, ' (', okved, ')') AS title"
        ])->all(), 'okved', 'title');
    }
}