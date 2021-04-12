<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Close */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="close-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <div class="form-content">
    <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::className(), [
        'language' => 'ru',
        'dateFormat' => 'dd.MM.yy',

    ])->textInput() ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
