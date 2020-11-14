<?php

namespace app\models;

use app\tables\TblOkved;

class Okved extends TblOkved
{
    public function attributeLabels()
    {
        return [
            'okved' => 'ОКВЭД',
            'title' => 'Название',
        ];
    }
}