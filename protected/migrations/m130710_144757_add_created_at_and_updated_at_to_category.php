<?php

class m130710_144757_add_created_at_and_updated_at_to_category extends CDbMigration
{
	public function up()
	{
		$this->addColumn('category', 'created_at', 'datetime');
		$this->addColumn('category', 'updated_at', 'datetime');
	}

	public function down()
	{
		$this->dropColumn('category', 'created_at', 'datetime');
		$this->dropColumn('category', 'updated_at', 'datetime');
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