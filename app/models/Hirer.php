<?php

namespace app\models;

use app\tables\TblHirer;

class Hirer extends TblHirer
{
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название'
        ];
    }
}