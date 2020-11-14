<?php
namespace app\api\pub\v1\models;

use app\models\Vacancy;
use yii\data\ActiveDataProvider;
use yii\data\Sort;

class VacancySearchProvider extends Vacancy
{

	public $counts;
	public $title;
	public $month_3_value;
	public $month_6_value;
	public $month_12_value;
	public $okved_title;

	public function rules()
	{
		return [
			[['month_year'], 'safe']
		];
	}

	public function fields()
	{
		return array_merge(
			parent::fields(),
			[
				'counts',
				'title',
				'month_3_value',
				'month_6_value',
				'month_12_value',
				'okved_title'
			]
		);
	}

	public function search($params, $formName = null)
	{
		$query = self::find();
		$query->joinWith('okpdtr0');
		$query->joinWith('okved0');
		$query->joinWith('predictions');
		$query->select([
			'tbl_vacancies.okpdtr',
			'tbl_vacancies.okved',
			'tbl_okpdtr.title as title',
			'tbl_okved.title as okved_title',
			'sum(tbl_vacancies.number) as counts',
			'max(month_3_value) as month_3_value',
			'max(month_6_value) as month_6_value',
			'max(month_12_value) as month_12_value',
		]);

		$query->groupBy(['tbl_vacancies.okpdtr', 'tbl_vacancies.okved', 'tbl_okpdtr.title', 'tbl_okved.title', 'tbl_predictions.created_at']);
		$query->orderBy(['counts' => SORT_DESC]);

		$sort = new Sort();

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'sort' => $sort->orders
		]);

		if (
			!$this->load($params, $formName)
			|| !$this->validate()
		)
		{
			return $dataProvider;
		}

		$query->andFilterWhere([self::tableName() . '.okpdtr' => $this->okpdtr]);
		$query->andFilterWhere([self::tableName() . '.okved' => $this->okved]);
		$query->andFilterWhere([self::tableName() . '.month_year' => $this->month_year]);

		return $dataProvider;
	}

}