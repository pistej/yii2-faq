<?php

namespace pistej\faq\models;

use pistej\faq\Faq;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "{{%faq_group}}".
 *
 * @property int $id
 * @property string $name
 * @property string $lang_code
 * @property string $key
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 *
 * @property FaqQa[] $faqQas
 */
class FaqGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%faq_group}}';
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
                    'key',
                ],
                'required',
            ],
            [
                [
                    'created_at',
                    'updated_at',
                ],
                'safe',
            ],
            [
                [
                    'created_by',
                    'updated_by',
                ],
                'integer',
            ],
            [
                [
                    'name',
                    'key',
                ],
                'string',
                'max' => 255,
            ],
            [
                'key',
                'unique',
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
            'name' => Faq::t('app', 'Name'),
            'key' => Faq::t('app', 'Url (ommit statring /)'),
            'created_at' => Faq::t('app', 'Created At'),
            'created_by' => Faq::t('app', 'Created By'),
            'updated_at' => Faq::t('app', 'Updated At'),
            'updated_by' => Faq::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaqQas(): \yii\db\ActiveQuery
    {
        return $this->hasMany(FaqQa::class, ['group_id' => 'id']);
    }
}
