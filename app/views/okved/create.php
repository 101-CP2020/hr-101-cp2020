<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Okved */

$this->title = 'ОКВЕД';
$this->params['breadcrumbs'][] = ['label' => 'ОКВЕД', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="okved-create">

    <div class="box box-default">
        <div class="box-body">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
