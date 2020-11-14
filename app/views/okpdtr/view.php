<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Okpdtr */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'ОКПДТР', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="okpdtr-view">

    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title"></h3>

            <div class="box-tools">
                <?= Html::a(Html::icon('pencil'), ['update', 'id' => $model->okpdtr], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Html::icon('trash'), ['delete', 'id' => $model->okpdtr], [
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
                'okpdtr',
                'title',
            ],
        ]) ?>
        </div>
    </div>

</div>
