<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Okved */

$this->title = 'Редактировать: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'ОКВЕД', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->okved]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="okved-update">

    <div class="box box-default">
        <div class="box-body">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
