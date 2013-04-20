<?php

class m130420_074850_rename_destription_to_description_to_category extends CDbMigration
{
	public function up()
	{
		$this->renameColumn('category', 'destription', 'description');
	}

	public function down()
	{
		$this->renameColumn('category', 'description', 'destription');
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