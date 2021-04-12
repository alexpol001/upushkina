<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Close */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Забронировать';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="close-index">

    <p>
        <?= Html::a('Забронировать дату', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'date',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>
</div>
