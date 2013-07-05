<?php

class m130705_155528_add_created_at_and_updated_at_to_press extends CDbMigration
{
	public function up()
	{
		$this->addColumn('press', 'created_at', 'datetime');
		$this->addColumn('press', 'updated_at', 'datetime');
	}

	public function down()
	{
		$this->dropColumn('press', 'created_at', 'datetime');
		$this->dropColumn('press', 'updated_at', 'datetime');
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