<?php

namespace pistej\faq\widgets\FaqWidget;

use pistej\faq\models\FaqQa;
use yii\base\Widget;

class FaqWidget extends Widget
{
    /**
     * @var bool|int if id defined then this FAQ will be opened
     */
    public $id = false;

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run(): string
    {
        $question = FaqQa::find()->where($this->id)->one();

        return $this->render('faqDetail', [
            'question' => $question,
        ]);
    }
}