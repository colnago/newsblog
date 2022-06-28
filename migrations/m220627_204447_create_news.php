<?php

use yii\db\Migration;

/**
 * Class m220627_204447_create_news
 */
class m220627_204447_create_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(512)->notNull(),
            'body' => $this->text()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'published_at' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createTable('{{%news_images}}', [
            'id' => $this->primaryKey(),
            'news_id' => $this->integer()->notNull(),
            'path' => $this->string()->notNull(),
            'base_url' => $this->string(),
            'type' => $this->string(),
            'size' => $this->integer(),
            'name' => $this->string(),
            'created_at' => $this->integer()
        ]);

        $this->addForeignKey('fk_news_images_news', '{{%news_images}}', 'news_id', '{{%news}}', 'id', 'cascade', 'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_news_images_news', '{{%news_images}}');

        $this->dropTable('{{%news_images}}');
        $this->dropTable('{{%news}}');
    }

}
