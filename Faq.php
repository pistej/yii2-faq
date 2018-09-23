<?php

namespace pistej\faq;

/**
 * pistej module definition class
 */
class Faq extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'pistej\faq\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        \Yii::$app->i18n->translations['extensions/yii2-faq/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@vendor/pistej/yii2-faq/messages',
            'fileMap' => [
                'extensions/yii2-faq/faq' => 'faq.php',
            ],
        ];
    }

    /**
     * @param $category
     * @param $message
     * @param array $params
     * @param null $language
     *
     * @return string
     */
    public static function t($category, $message, $params = [], $language = null)
    {
        return \Yii::t('extensions/yii2-faq/' . $category, $message, $params, $language);
    }
}
