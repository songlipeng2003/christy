<?php

class m130710_144855_add_created_at_and_updated_at_to_movie extends CDbMigration
{
	public function up()
	{
		$this->addColumn('movie', 'created_at', 'datetime');
		$this->addColumn('movie', 'updated_at', 'datetime');
	}

	public function down()
	{
		$this->dropColumn('movie', 'created_at', 'datetime');
		$this->dropColumn('movie', 'updated_at', 'datetime');
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