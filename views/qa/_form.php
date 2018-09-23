<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model pistej\faq\models\FaqQa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-qa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'question')
             ->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'answer')
             ->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'group_id')
             ->textInput() ?>

    <?= $form->field($model, 'enabled')
             ->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
