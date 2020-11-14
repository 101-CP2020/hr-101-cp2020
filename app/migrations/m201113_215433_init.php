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
        $this->createTable('tbl_internal_services', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'access_token' => $this->string()->notNull(),
        ]);

        $this->createTable('tbl_hirer', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ]);

        $this->createTable('tbl_okved', [
            'okved' => $this->string(10)->notNull()->unique(),
            'title' => $this->string()->notNull()
        ]);

        $this->addPrimaryKey('pk_tbl_okved', 'tbl_okved', 'okved');

        $this->createTable('tbl_municipality', [
            'id' => $this->primaryKey(),
            'kladr' => $this->bigInteger()->unique()->notNull(),
            'title' => $this->string()->notNull(),
            'population' => $this->integer()
        ]);

        $this->createTable('tbl_reason', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ]);

        $this->createTable('tbl_seekers', [
            'id' => $this->primaryKey(),
            'inn' => $this->integer()->notNull(),
            'snils' => $this->string()->notNull(),
            'sex' => $this->tinyInteger(),
            'birthday_date' => $this->integer(),
            'kladr' => $this->bigInteger(),
            'created_date' => $this->integer(),
            'closed_date' => $this->integer(),
            'reason_id' => $this->integer()
        ]);

        $this->addForeignKey('fk_seekers_to_municipality', 'tbl_seekers', 'kladr', 'tbl_municipality', 'kladr', 'CASCADE');
        $this->addForeignKey('fk_tbl_seekers_to_reason', 'tbl_seekers', 'reason_id', 'tbl_reason', 'id', 'SET NULL');

        $this->createTable('tbl_okpdtr', [
            'okpdtr' => $this->integer()->notNull()->unique(),
            'title' => $this->string()->notNull(),
        ]);

        $this->addPrimaryKey('pk_tbl_okpdtr', 'tbl_okpdtr', 'okpdtr');

        $this->createTable('tbl_seekers_rel_okpdtr', [
            'id' => $this->primaryKey(),
            'seeker_id' => $this->integer()->notNull(),
            'okpdtr' => $this->integer()->notNull()
        ]);

        $this->addForeignKey('fk_tbl_seekers_rel_okpdtr_to_seereks', 'tbl_seekers_rel_okpdtr', 'seeker_id', 'tbl_seekers', 'id', 'CASCADE');
        $this->addForeignKey('fk_tbl_seekers_rel_okpdtr_to_okpdtr', 'tbl_seekers_rel_okpdtr', 'okpdtr', 'tbl_okpdtr', 'okpdtr', 'CASCADE');

        $this->createTable('tbl_vacancies', [
            'id' => $this->primaryKey(),
            'created_by' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'okpdtr' => $this->integer()->notNull(),
            'okved' => $this->string()->notNull(),
            'kladr' => $this->bigInteger()->notNull(),
            'number' => $this->integer(),
            'month_year' => $this->integer()
        ]);

        $this->addForeignKey('fk_tbl_vacancies_to_created_by', 'tbl_vacancies', 'created_by', 'tbl_hirer', 'id', 'CASCADE');
        $this->addForeignKey('fk_tbl_vacancies_to_okpdtr', 'tbl_vacancies', 'okpdtr', 'tbl_okpdtr', 'okpdtr', 'CASCADE');
        $this->addForeignKey('fk_tbl_vacancies_to_okved', 'tbl_vacancies', 'okved', 'tbl_okved', 'okved', 'CASCADE');
        $this->addForeignKey('fk_tbl_vacancies_to_kladr', 'tbl_vacancies', 'kladr', 'tbl_municipality', 'kladr', 'CASCADE');

        $this->createTable('tbl_predictions', [
            'id' => $this->primaryKey(),
            'okpdtr' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            '3_month_value' => $this->integer(),
            '6_month_value' => $this->integer(),
            '12_month_value' => $this->integer(),
        ]);

        $this->addForeignKey('fk_tbl_predictions_to_okpdtr', 'tbl_predictions', 'okpdtr', 'tbl_okpdtr', 'okpdtr', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tbl_internal_services');

        $this->dropForeignKey('fk_tbl_predictions_to_okpdtr', 'tbl_predictions');
        $this->dropTable('tbl_predictions');

        $this->dropForeignKey('fk_tbl_vacancies_to_created_by', 'tbl_vacancies');
        $this->dropForeignKey('fk_tbl_vacancies_to_okpdtr', 'tbl_vacancies');
        $this->dropForeignKey('fk_tbl_vacancies_to_okved', 'tbl_vacancies');
        $this->dropForeignKey('fk_tbl_vacancies_to_kladr', 'tbl_vacancies');

        $this->dropTable('tbl_vacancies');
        $this->dropForeignKey('fk_tbl_seekers_rel_okpdtr_to_seereks', 'tbl_seekers_rel_okpdtr');
        $this->dropForeignKey('fk_tbl_seekers_rel_okpdtr_to_okpdtr', 'tbl_seekers_rel_okpdtr');

        $this->dropTable('tbl_seekers_rel_okpdtr');
        $this->dropPrimaryKey('pk_tbl_okpdtr', 'tbl_okpdtr');

        $this->dropTable('tbl_okpdtr');

        $this->dropForeignKey('fk_seekers_to_municipality', 'tbl_seekers');
        $this->dropForeignKey('fk_tbl_seekers_to_reason', 'tbl_seekers');

        $this->dropTable('tbl_seekers');

        $this->dropPrimaryKey('pk_tbl_okved', 'tbl_okved');
        $this->dropTable('tbl_okved');

        $this->dropTable('tbl_municipality');
        $this->dropTable('tbl_reason');
        $this->dropTable('tbl_hirer');

        return true;
    }
}
