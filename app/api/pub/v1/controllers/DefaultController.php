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

        return $provider->getModels();
    }

    private function getLastDate()
	{
		return (new Query())
			->select('max(month_year) as date')
			->from(Vacancy::tableName())
			->scalar();
	}
}
