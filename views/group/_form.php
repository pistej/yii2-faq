<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model pistej\faq\models\FaqGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="info-panel">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')
             ->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'key')
             ->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
