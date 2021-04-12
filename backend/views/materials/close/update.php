<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Close */

$this->title = 'Забронировать';
$this->params['breadcrumbs'][] = ['label' => 'Забронировать', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Изменить дату'
?>
<div class="close-update">

    <h2><?= Html::encode('Изменить дату') ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
