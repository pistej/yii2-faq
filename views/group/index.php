<?php

use yii\helpers\Html;
use yii\grid\GridView;
use pistej\faq\Faq;

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
            'lang_code',
            'key',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
