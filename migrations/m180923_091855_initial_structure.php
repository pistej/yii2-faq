<?php

use yii\db\Migration;

/**
 * Class m180923_091855_initial_structure
 */
class m180923_091855_initial_structure extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = '';
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%faq_group}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
//            'lang_code' => $this->string(6),
            'key' => $this->string(255)->notNull()->unique(),
            'created_at' => $this->timestamp()->null(),
            'created_by' => $this->integer()->null(),
            'updated_at' => $this->timestamp()->null(),
            'updated_by' => $this->integer()->null(),
        ], $tableOptions);

        $this->createTable('{{%faq_qa}}', [
            'id' => $this->primaryKey(),
            'question' => $this->text()->null(),//todo can be removed
            'answer' => $this->text()->notNull(),
            'lang_code' => $this->string(6),
            'group_id' => $this->integer()->notNull(),
            'enabled' => $this->smallInteger(1)->defaultValue(1)->notNull(),
            'created_at' => $this->timestamp()->null(),
            'created_by' => $this->integer()->null(),
            'updated_at' => $this->timestamp()->null(),
            'updated_by' => $this->integer()->null(),
        ], $tableOptions);

        $this->addForeignKey('fk_fa_group_id', '{{%faq_qa}}', 'group_id', '{{%faq_group}}', 'id');
        $this->createIndex('index_faq_qa_unique_1', '{{%faq_qa}}', ['lang_code', 'group_id'], true);
        $this->createIndex('index_faq_qa_2', '{{%faq_qa}}', ['lang_code', 'group_id', 'enabled']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%faq_qa}}');
        $this->dropTable('{{%faq_group}}');
    }
}
