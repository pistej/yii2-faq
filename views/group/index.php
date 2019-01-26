<?php

use pistej\faq\Faq;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Faq::t('app', 'Faq Groups');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-panel">

    <p>
        <?= Html::a(Faq::t('app', 'Create Faq Group'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'key',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            [
                'class' => ActionColumn::class,
                'visibleButtons' => [
                    'delete' => function ($model, $key, $index) {
                        return $model->faqQas === [];
                    },
                ],
            ],
        ],
    ]); ?>
</div>
