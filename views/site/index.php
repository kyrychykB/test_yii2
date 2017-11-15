<?php
use app\components\MenuWidget;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Task 2</h1>
    </div>

    <div class="body-content">
        <ul class="list sidebar__list">
            <?= MenuWidget::widget(['template' => 'menu']); ?>
        </ul>
    </div>
</div>
