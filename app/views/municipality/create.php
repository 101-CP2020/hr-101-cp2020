<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Municipality */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Муниципалитет', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="municipality-create">
    <div class="box box-default">
        <div class="box-body">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
