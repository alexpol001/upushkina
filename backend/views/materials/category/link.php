<?php
    /* @var $model \common\models\Category */
    /* @var $form yii\widgets\ActiveForm */
?>

<?= $form->field($model, 'parent')->dropDownList(
    $model->getSelectParent(),
    [
    'prompt' => ''
    ]
); ?>
