<?php

class m130510_153126_add_emailActive_to_user extends CDbMigration
{
	public function up()
	{
		$this->addColumn('user', 'emailActive', 'bool DEFAULT 0');
	}

	public function down()
	{
		$this->dropColumn('user', 'emailActive');
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