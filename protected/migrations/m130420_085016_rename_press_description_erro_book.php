<?php

class m130420_085016_rename_press_description_erro_book extends CDbMigration
{
	public function up()
	{
		$this->renameColumn('book', 'destription', 'description');
		$this->renameColumn('book', 'prss', 'press');
	}

	public function down()
	{
		$this->renameColumn('book', 'description', 'destription');
		$this->renameColumn('book', 'press', 'prss');
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