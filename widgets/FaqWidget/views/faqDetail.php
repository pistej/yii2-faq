<?php

/** @var \pistej\faq\models\FaqQa $questions */

use yii\helpers\Html;

?>
<div class="info-panel">
    <?php
    $count = 0;
    foreach ($questions as $question) {
        if ($count++ > 0) {
            //space between QA
            echo '<br><br>';
        }
        if (!empty($question->question)) {
            echo '<b>' . Html::encode($question->question) . '</b>';
            echo '<br>';
        }
        echo Html::encode($question->answer);
    }
    ?>
</div>
