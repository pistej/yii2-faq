<?php

use pistej\faq\models\FaqGroup;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model pistej\faq\models\FaqQa */
/* @var $form yii\widgets\ActiveForm */

//todo: group_id dropdown, use name-key combination
?>

<div class="info-panel">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'question')
             ->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'answer')
             ->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lang_code')
        ->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group_id')
             ->dropDownList(ArrayHelper::map(FaqGroup::find()->all(), 'id', 'key')) ?>

    <?= $form->field($model, 'enabled')
             ->dropDownList([
                     1 => Yii::t('app', 'Yes'),
                     0 => Yii::t('app', 'No'),
             ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
