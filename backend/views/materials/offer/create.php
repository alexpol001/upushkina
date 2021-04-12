<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Offer */

$this->title = 'Акции';
$this->params['breadcrumbs'][] = ['label' => 'Акции', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Добавить акцию';
?>
<div class="offer-create">

    <h2><?= Html::encode('Добавить акцию') ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
