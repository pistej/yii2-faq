<?php

use pistej\faq\Faq;

/* @var $this yii\web\View */
/* @var $model pistej\faq\models\FaqQa */

$this->title = Faq::t('app', 'Update Faq Q&A', [
    'nameAttribute' => '' . $model->id,
]);
$this->params['breadcrumbs'][] = [
    'label' => Faq::t('app', 'Faq Q&A'),
    'url' => ['index'],
];
$this->params['breadcrumbs'][] = [
    'label' => $model->id,
    'url' => [
        'view',
        'id' => $model->id,
    ],
];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="faq-qa-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
