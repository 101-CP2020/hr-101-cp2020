<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hirer */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Наниматели', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hirer-create">

    <div class="box box-default">
        <div class="box-body">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
        </div>
    </div>

</div>
