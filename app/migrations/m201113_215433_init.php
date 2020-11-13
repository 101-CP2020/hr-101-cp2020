<?php

use yii\db\Migration;

/**
 * Class m201113_215433_init
 */
class m201113_215433_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('internal_services', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'access_token' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('internal_services');

        return true;
    }
}
