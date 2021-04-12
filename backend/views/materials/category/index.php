<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Category */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Менеджер категорий';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">
    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'title',
            [
                'attribute'=>'parent',
                'filter'=> \common\models\Category::getSelectParents(),
                'value' => function ($data) {
                    return \common\models\Category::getTitle($data->parent);
                }
            ],
//            'parent',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>
</div>
