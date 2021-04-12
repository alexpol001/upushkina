<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Offer */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Акции';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offer-index">
    <p>
        <?= Html::a('Добавить акцию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'price',
            'from_date',
            'to_date',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>
</div>
