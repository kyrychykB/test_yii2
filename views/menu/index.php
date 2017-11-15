<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MenuSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menu items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Menu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                [
                    'attribute' => 'parent_id',
                    'format' => 'html',
                    'value' => function($data) {
                        return $data->parent['title'] ? $data->parent['title'] : '<span class="text-success">Root Item</span>';
                    }
                ],
                'title',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}{update}{delete}',
                    'buttons' => [
                        'view' => function ($url, $data) {
                            return Html::a('<button type="button" class="btn btn-info" style="margin-right: 5px"><span class="glyphicon glyphicon-eye-open"></span></button>', $url, [
                                'title' => Yii::t('app', 'view'),
                            ]);
                        },
                        'update' => function ($url, $data) {
                            return Html::a('<button type="button" class="btn btn-primary" style="margin-right: 5px"><span class="glyphicon  glyphicon-pencil"></span></button>', $url, [
                                'title' => Yii::t('app', 'update'),
                            ]);
                        },
                        'delete' => function ($url, $data) {
                            return Html::a('<button type="button" class="btn btn-danger" style="margin-right: 5px"><span class=" glyphicon glyphicon-trash"></span></button>', $url, [
                                'title' => Yii::t('app', 'delete'),
                                'data' => [
                                    //'method' => 'get',
                                    // use it if you want to confirm the action
                                    'confirm' => 'Are you sure?',
                                ],
                            ]);
                        }
                    ],
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
</div>
