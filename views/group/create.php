<?php

use yii\helpers\Html;
use pistej\faq\Faq;

/* @var $this yii\web\View */
/* @var $model pistej\faq\models\FaqGroup */

$this->title = Faq::t('app', 'Create Faq Group');
$this->params['breadcrumbs'][] = [
    'label' => Faq::t('app', 'Faq Groups'),
    'url' => ['index'],
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-group-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
