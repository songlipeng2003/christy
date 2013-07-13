<?php

class m130710_144558_add_created_at_and_updated_at_to_book extends CDbMigration
{
	public function up()
	{
		$this->addColumn('book', 'created_at', 'datetime');
		$this->addColumn('book', 'updated_at', 'datetime');
	}

	public function down()
	{
		$this->dropColumn('book', 'created_at', 'datetime');
		$this->dropColumn('book', 'updated_at', 'datetime');
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