<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vacancy */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Вакансии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vacancy-view">

    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title"></h3>

            <div class="box-tools">
                <?= Html::a(Html::icon('pencil'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Html::icon('trash'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
        <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>
        </div>
    </div>
</div>
