<?php

use pistej\faq\Faq;
use pistej\faq\models\FaqGroup;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Faq::t('app', 'Faq Q&A');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-panel">

    <p>
        <?= Html::a(Faq::t('app', 'Create Faq Q&A'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'question:ntext',
            'answer:ntext',
            [
                'attribute' => 'group_id',
                'value' => function($model) {
                    return FaqGroup::findOne($model->group_id)->key;
                },
            ],
            'enabled:boolean',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
