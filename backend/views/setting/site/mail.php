<?php
/* @var $model \common\models\setting\Mail */
/* @var $form yii\widgets\ActiveForm */
?>

<?= $form->field($model, 'host')->textInput(['placeholder' => true, 'value' => $model->host]) ?>

<?= $form->field($model, 'username')->textInput(['placeholder' => true, 'value' => $model->username]) ?>

<?= $form->field($model, 'password')->textInput(['placeholder' => true, 'value' => $model->password]) ?>

<?= $form->field($model, 'port')->textInput(['placeholder' => true, 'value' => $model->port]) ?>

<?= $form->field($model, 'encryption')->textInput(['placeholder' => true, 'value' => $model->encryption]) ?>
