<?php

use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Вакансии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-index">

    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title"></h3>

            <div class="box-tools">
                <?= Html::a(Html::icon('plus'), ['create'], ['class' => 'btn btn-round btn-success']) ?>
            </div>
        </div>
        <div class="box-body">

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'createdBy.title:text:Наниматель',
            'created_at:date',
            ['attribute' => 'okpdtr', 'value' => function($model){
                return $model->okpdtr0->title .' ('.$model->okpdtr.')';
            }],
            ['attribute' => 'okved', 'value' => function($model){
                return $model->okved0->title .' ('.$model->okved.')';
            }],
            ['attribute' => 'kladr', 'value' => function($model){
                return $model->kladr0->title .' ('.$model->kladr.')';
            }],
            'number',
            ['attribute' => 'month_year', 'value' => function($model){
                return Yii::$app->formatter->asDate($model->month_year, 'php:M Y');
            }],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
        </div>
    </div>
</div>
