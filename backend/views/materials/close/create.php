<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Close */

$this->title = 'Забронировать';
$this->params['breadcrumbs'][] = ['label' => 'Забронировать', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Забронировать дату';
?>
<div class="close-create">

    <h2><?= Html::encode('Забронировать дату') ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
