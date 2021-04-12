<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = 'Менеджер категорий';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Создать категорию';
?>
<div class="category-create">

    <h2><?= Html::encode('Создать категорию') ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
