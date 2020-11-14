<?php

namespace app\api\pub\v1\controllers;

use app\api\pub\v1\models\VacancySearchProvider;
use app\models\Vacancy;
use Yii;
use yii\db\Query;
use yii\rest\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
    	$params = \Yii::$app->request->queryParams;
    	if (!isset($params['month_year']))
		{
			$params['month_year'] = $this->getLastDate();
		}

    	$searchModel = new VacancySearchProvider();
        $provider = $searchModel->search($params, '');

        $res = [];
        foreach ($provider->getModels() as $row)
		{
			if (!array_key_exists($row->okpdtr, $res))
			{
				$res[$row->okpdtr][] = [
					'okpdtr' => $row->okpdtr,
					'title' => $row->title,
					'counts' => 0,
					'month_3_value' => $row->month_3_value,
					'month_6_value' => $row->month_6_value,
					'month_12_value' => $row->month_12_value
				];
			}
			$res[$row->okpdtr][0]['counts'] += $row->counts;

			$res[$row->okpdtr][] = [
				'okpdtr' => $row->okpdtr,
				'okved' => $row->okved,
				'title' => $row->okved_title,
				'counts' => $row->counts,
				'month_3_value' => null,
				'month_6_value' => null,
				'month_12_value' => null
			];
		}

        return $res;
    }

    private function getLastDate()
	{
		return (new Query())
			->select('max(month_year) as date')
			->from(Vacancy::tableName())
			->scalar();
	}
}