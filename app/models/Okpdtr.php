<?php

namespace app\models;

use app\tables\TblOkpdtr;

class Okpdtr extends TblOkpdtr
{
    public function attributeLabels()
    {
        return [
            'okpdtr' => 'ОКПДТР',
            'title' => 'Название',
        ];
    }
}