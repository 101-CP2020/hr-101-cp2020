<?php

namespace app\models;

use app\tables\TblMunicipality;
use yii\helpers\ArrayHelper;

class Municipality extends TblMunicipality
{
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kladr' => 'КЛАДР',
            'title' => 'Название',
            'population' => 'Численность населения'
        ];
    }



    public static function getList()
    {
        return ArrayHelper::map(self::find()->select([
            'kladr',
            "CONCAT(title, ' (', kladr, ')') AS title"
        ])->all(), 'kladr', 'title');
    }
}