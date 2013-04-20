<?php

class m130420_073002_rename_destription_to_description_to_press extends CDbMigration
{
	public function up()
	{
		$this->renameColumn('press', 'destription', 'description');
	}

	public function down()
	{
		$this->renameColumn('press', 'description', 'destription');
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