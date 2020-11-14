<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vacancy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'created_by')->dropDownList(\app\models\Hirer::getList(), [
        'class' => 'form-control select2',
        'prompt' => ''
    ])?>

    <?= $form->field($model, 'okpdtr')->dropDownList(\app\models\Okpdtr::getList(), [
        'class' => 'form-control select2',
        'prompt' => ''
    ])?>

    <?= $form->field($model, 'okved')->dropDownList(\app\models\Okved::getList(), [
        'class' => 'form-control select2',
        'prompt' => ''
    ])?>

    <?= $form->field($model, 'kladr')->dropDownList(\app\models\Municipality::getList(), [
        'class' => 'form-control select2',
        'prompt' => ''
    ])?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'month_year_str')->textInput(['placeholder' => 'ММ/ГГ']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
