<?php

namespace app\models;

use app\tables\TblOkpdtr;
use yii\helpers\ArrayHelper;

class Okpdtr extends TblOkpdtr
{
    public function attributeLabels()
    {
        return [
            'okpdtr' => 'ОКПДТР',
            'title' => 'Название',
        ];
    }

    public static function getList()
    {
        return ArrayHelper::map(self::find()->select([
            'okpdtr',
            "CONCAT(title, ' (', okpdtr, ')') AS title"
        ])->all(), 'okpdtr', 'title');
    }
}