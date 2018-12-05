<?php

use pistej\faq\Faq;

/* @var $this yii\web\View */
/* @var $model pistej\faq\models\FaqQa */

$this->title = Faq::t('app', 'Create Faq Q&A');
$this->params['breadcrumbs'][] = [
    'label' => Faq::t('app', 'Faq Q&A'),
    'url' => ['index'],
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-qa-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
