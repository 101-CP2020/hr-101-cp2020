<?php

namespace app\models;

use app\tables\TblVacancies;
use yii\helpers\ArrayHelper;

class Vacancy extends TblVacancies
{
    public $month_year_str;

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_by' => 'Наниматель',
            'created_at' => 'Дата создания',
            'okpdtr' => 'ОКПДТР',
            'okved' => 'ОКВЭД',
            'kladr' => 'КЛАДР',
            'number' => 'Кол-во',
            'month_year' => 'Месяц/Год',
            'month_year_str' => 'Месяц/Год',
        ];
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            ['month_year_str', 'required'],
            ['month_year_str', 'match', 'pattern' => '/^\d{2}\/\d{2}$/']
        ]);
    }

    public function saveData()
    {
        if ($this->validate()) {
            $this->setAttribute('created_at', time());
            $arr = array_reverse(explode('/', $this->month_year_str));
            $arr[] = '01';
            $this->setAttribute('month_year', strtotime(implode('-', $arr)));

            return $this->save();
        }

        return false;
    }

    public function getPredictions()
    {
        return $this->hasOne(Prediction::class, ['okpdtr' => 'okpdtr'])
            ->orderBy([Prediction::tableName() . '.created_at' => SORT_DESC])->limit(1);
    }
}