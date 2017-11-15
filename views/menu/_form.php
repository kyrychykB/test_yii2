<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\MenuWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="form-group field-menu-parent_id has-success">
        <label class="control-label" for="menu-parent_id">Parent Item</label>
        <select id="menu-parent_id" class="form-control" name="Menu[parent_id]" aria-invalid="false">
            <option value="0">ROOT ITEM</option>
            <?=MenuWidget::widget(['template' => 'select', 'model' => $model])?>
        </select>
        <div class="help-block"></div>
    </div>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
