<?php

namespace app\models;

use app\tables\TblMunicipality;

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
}