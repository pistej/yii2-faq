<?php

use yii\helpers\Html;
use pistej\faq\Faq;

/* @var $this yii\web\View */
/* @var $model pistej\faq\models\FaqQa */

$this->title = Faq::t('app', 'Create Faq Qa');
$this->params['breadcrumbs'][] = [
    'label' => Faq::t('app', 'Faq Qas'),
    'url' => ['index'],
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-qa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
