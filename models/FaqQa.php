<?php

namespace pistej\faq\models;

use pistej\faq\Faq;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "{{%faq_qa}}".
 *
 * @property int $id
 * @property string $question
 * @property string $answer
 * @property int $group_id
 * @property int $enabled
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 *
 * @property FaqGroup $group
 */
class FaqQa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%faq_qa}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::class,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [
                [
                    'question',
                    'answer',
                ],
                'string',
            ],
            [
                [
                    'answer',
                    'group_id',
                ],
                'required',
            ],
            [
                [
                    'group_id',
                    'enabled',
                    'created_by',
                    'updated_by',
                ],
                'integer',
            ],
            [
                [
                    'created_at',
                    'updated_at',
                ],
                'safe',
            ],
            [
                ['group_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => FaqGroup::class,
                'targetAttribute' => ['group_id' => 'id'],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Faq::t('app', 'ID'),
            'question' => Faq::t('app', 'Question'),
            'answer' => Faq::t('app', 'Answer'),
            'group_id' => Faq::t('app', 'Group ID'),
            'enabled' => Faq::t('app', 'Enabled'),
            'created_at' => Faq::t('app', 'Created At'),
            'created_by' => Faq::t('app', 'Created By'),
            'updated_at' => Faq::t('app', 'Updated At'),
            'updated_by' => Faq::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \pistej\faq\models\FaqGroup
     */
    public function getGroup(): FaqGroup
    {
        return $this->hasOne(FaqGroup::class, ['id' => 'group_id']);
    }
}
