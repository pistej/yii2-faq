<?php

use pistej\faq\models\FaqGroup;
use yii\helpers\BaseStringHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;
use pistej\faq\Faq;

/* @var $this yii\web\View */
/* @var $model pistej\faq\models\FaqQa */

if ($model->question !== '') {
    $this->title = BaseStringHelper::byteSubstr($model->question, 0 , 25) . ' ...';
} else {
    $this->title = $model->id;
}
$this->params['breadcrumbs'][] = [
    'label' => Faq::t('app', 'Faq Qas'),
    'url' => ['index'],
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-panel">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), [
            'update',
            'id' => $model->id,
        ], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), [
            'delete',
            'id' => $model->id,
        ], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'question:ntext',
            'answer:ntext',
            [
                    'attribute' => 'group_id',
                    'value' => function ($model) {
                        return FaqGroup::findOne($model->group_id)->key;
                    }
            ],
            'enabled:boolean',
            //'created_at',
            //'created_by',
            'updated_at:datetime',
            'updated_by',
        ],
    ]) ?>

</div>
