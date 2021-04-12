<?php
    /* @var $model \common\models\Material */
    /* @var $form yii\widgets\ActiveForm */

use dosamigos\tinymce\TinyMce; ?>

<?= $form->field($model, 'text')->widget(TinyMce::className())->label(false); ?>
