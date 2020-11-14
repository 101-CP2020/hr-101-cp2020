<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Okpdtr */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="okpdtr-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'okpdtr')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
