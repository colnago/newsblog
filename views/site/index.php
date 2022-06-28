<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'News Blog';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">News Blog</h1>
        <p>
            <?= Html::a(Yii::t('app', 'News list'), ['news/index'], ['class' => 'btn btn-lg btn-success']) ?>
        </p>
    </div>
</div>
