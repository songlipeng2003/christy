<?php

class m130711_145121_add_letter_index_and_english_name_to_category extends CDbMigration
{
	public function up()
	{
		$this->addColumn('category', 'letter_index', 'string');
		$this->addColumn('category', 'english_name', 'string');
	}

	public function down()
	{
		$this->dropColumn('category', 'letter_index');
		$this->dropColumn('category', 'english_name');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}