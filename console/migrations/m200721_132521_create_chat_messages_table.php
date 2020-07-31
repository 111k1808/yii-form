<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%chat_messages}}`.
 */
class m200721_132521_create_chat_messages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%chat_messages}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'comment' => $this->text(),
            'creation_time' => $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%chat_messages}}');
    }
}
