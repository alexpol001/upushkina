<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = 'Менеджер категорий';
$this->params['breadcrumbs'][] = ['label' => 'Менеджер категорий', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Изменить категорию';
?>
<div class="category-update">

    <h2><?= Html::encode('Изменить категорию') ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
