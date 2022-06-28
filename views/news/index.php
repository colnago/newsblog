<?php

use app\models\News;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var app\models\search\NewsSearch $searchModel */

$this->title = Yii::t('app', 'News');
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(!Yii::$app->user->isGuest): ?>
    <p>
        <?= Html::a(Yii::t('app', 'Create Task'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php endif; ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            [
                'attribute' => 'status',
                'options' => ['style' => 'width: 10%'],
                'value' => function ($model) {
                    return $model->getStatusValue();
                },
                'filter' => News::statuses(),
            ],
            [
                'attribute' => 'published_at',
                'options' => ['style' => 'width: 10%'],
                'format' => 'datetime',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'published_at',
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy',
                        'showMeridian' => true,
                        'todayBtn' => true,
                        'endDate' => '0d',
                    ]
                ]),
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['style' => 'width: 10%'],
                'contentOptions' => [
                    'class' => 'text-center'
                ],
                'buttonOptions' => [
                    'class' => 'action-button'
                ],
                'visibleButtons' => [
                    'update' => !Yii::$app->user->isGuest,
                    'delete' => !Yii::$app->user->isGuest,
                ]
            ]
        ],
    ]); ?>


</div>