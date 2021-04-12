<?php

use dosamigos\tinymce\TinyMce;
use yii\bootstrap\Tabs;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <div class="form-content">

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php
    echo Tabs::widget([
        'id' => 'tabs',
        'items' => [
            [
                'label' => 'Категория',
                'content' => $this->render('material', [
                    'form' => $form,
                    'model' => $model,
                ]),
                'active' => true
            ],
            [
                'label' => 'Связи',
                'content' => $this->render('link', [
                    'form' => $form,
                    'model' => $model,
                ]),
            ]
        ]
    ]);
    ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
