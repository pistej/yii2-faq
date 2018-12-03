<?php

use yii\helpers\Html;
use yii\grid\GridView;
use pistej\faq\Faq;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Faq::t('app', 'Faq Qas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-panel">

    <p>
        <?= Html::a(Faq::t('app', 'Create Faq Qa'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'question:ntext',
            'answer:ntext',
            'group_id',
            'enabled',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
