<?php

use yii\helpers\Html;
use pistej\faq\Faq;

/* @var $this yii\web\View */
/* @var $model pistej\faq\models\FaqGroup */

$this->title = Faq::t('app', 'Update Faq Group', [
    'nameAttribute' => '' . $model->name,
]);
$this->params['breadcrumbs'][] = [
    'label' => Faq::t('app', 'Faq Groups'),
    'url' => ['index'],
];
$this->params['breadcrumbs'][] = [
    'label' => $model->name,
    'url' => [
        'view',
        'id' => $model->id,
    ],
];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="faq-group-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
