<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Material */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Менеджер материалов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-index">
<!--    <p>-->
<!--        --><?//= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'title',
//            [
//                'attribute'=>'parent',
//                'filter'=> \common\models\Material::getSelectParents(),
//                'value' => function ($data) {
//                    return \common\models\Category::getTitle($data->parent);
//                }
//            ],
            [
                'class' => 'yii\grid\ActionColumn',
//                'template' => '{update} {delete}',
                'template' => '{update}'
            ],
        ],
    ]); ?>
</div>
