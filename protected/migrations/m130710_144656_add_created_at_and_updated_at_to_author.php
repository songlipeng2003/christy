<?php

class m130710_144656_add_created_at_and_updated_at_to_author extends CDbMigration
{
	public function up()
	{
		$this->addColumn('author', 'created_at', 'datetime');
		$this->addColumn('author', 'updated_at', 'datetime');
	}

	public function down()
	{
		$this->dropColumn('author', 'created_at', 'datetime');
		$this->dropColumn('author', 'updated_at', 'datetime');
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