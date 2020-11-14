<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Okpdtr */

$this->title = 'Редактировать: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'ОКПДТР', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->okpdtr]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="okpdtr-update">

    <div class="box box-default">
        <div class="box-body">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
        </div>
    </div>

</div>
