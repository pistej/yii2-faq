<?php

namespace pistej\faq\widgets\FaqWidget;

use pistej\faq\models\FaqQa;
use yii\base\Widget;

class FaqWidget extends Widget
{
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
        $question = FaqQa::find()
                         ->joinWith('group')
                         ->where([
                             '{{%faq_group}}.lang_code' => \Yii::$app->language,
                             '{{%faq_group}}.key' => \Yii::$app->request->url,
                             '{{%faq_qa}}.enabled' => 1, //enabled
                         ])
                         ->one();

        if ($question !== null) {
            return $this->render('faqDetail', [
                'question' => $question,
            ]);
        }

        return '';
    }
}