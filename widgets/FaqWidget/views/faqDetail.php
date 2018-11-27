<?php

/** @var \pistej\faq\models\FaqQa $question */

?>
<div class="info-panel">
    <b><?= \yii\helpers\Html::encode($question->question) ?></b>
    <br>
    <?= \yii\helpers\Html::encode($question->answer) ?>

</div>
