<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Municipality */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Муниципалитет', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="municipality-view">

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
                    'kladr',
                    'title',
                    'population',
                ],
            ]) ?>
        </div>
    </div>

</div>
