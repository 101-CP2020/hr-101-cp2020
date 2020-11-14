<?php

namespace app\models;

use app\tables\TblHirer;
use yii\helpers\ArrayHelper;

class Hirer extends TblHirer
{
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название'
        ];
    }

    public static function getList()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'title');
    }
}