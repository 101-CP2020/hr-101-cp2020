<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Okpdtr */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'ОКПДТР', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="okpdtr-create">

    <div class="box box-default">
        <div class="box-body">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
