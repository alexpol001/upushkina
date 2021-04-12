<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Offer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offer-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <div class="form-content">

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'from_date')->widget(\yii\jui\DatePicker::className(), [
        'language' => 'ru',
        'dateFormat' => 'dd.MM.yy',

    ])->textInput() ?>

    <?= $form->field($model, 'to_date')->widget(\yii\jui\DatePicker::className(), [
        'language' => 'ru',
        'dateFormat' => 'dd.MM.yy',

    ])->textInput() ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
