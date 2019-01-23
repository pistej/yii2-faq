<?php

namespace pistej\faq\widgets\FaqWidget;

use pistej\faq\models\FaqQa;
use yii\base\Widget;
use yii\caching\TagDependency;

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
        $route = \Yii::$app->requestedAction ? \Yii::$app->requestedAction->getUniqueId() : \Yii::$app->requestedRoute;
        $cacheKey = \Yii::$app->language . '/' . $route;

        //empty result is cached (removed from cache) too
        $questions = \Yii::$app->cache->getOrSet($cacheKey, function () use ($route) {
            return FaqQa::find()
                ->joinWith('group')
                ->where([
                    '{{%faq_qa}}.lang_code' => \Yii::$app->language,
                    '{{%faq_group}}.key' => $route,
                    '{{%faq_qa}}.enabled' => 1, //enabled
                ])
                ->all();
        }, 0, new TagDependency([
            'tags' => [
                \Yii::$app->language,
                $route,
            ],
        ]));

        if ($questions !== []) {
            return $this->render('faqDetail', [
                'questions' => $questions,
            ]);
        }

        return '';
    }
}
