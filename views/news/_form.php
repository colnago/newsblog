<?php

use app\models\News;
use kartik\datetime\DateTimePicker;
use trntv\filekit\widget\Upload;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin([
        'id' => 'news-form',
        'options' => [
            'enctype' => 'multipart/form-data'
        ],
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->radioList(News::statuses(), ['value' => $model->isNewRecord ? News::STATUS_INACTIVE : $model->status]) ?>

    <?= $form->field($model, 'published_at')->widget(
        DateTimePicker::class,
        [
            'type' => DateTimePicker::TYPE_INLINE,
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd HH:mm:ss',
                'showMeridian' => true,
                'todayBtn' => true,
            ]
        ]
    ) ?>

    <?= $form->field($model, 'images')->widget(
        Upload::class,
        [
            'url' => ['news/upload'],
            'sortable' => true,
            'maxFileSize' => 10000000, // 10 MiB
            'maxNumberOfFiles' => 10,
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success', 'id' => 'send']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>