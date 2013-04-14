<?php

class m130414_134553_create_author extends CDbMigration
{
	public function up()
	{
		$this->createTable('author', array(
			'id' => 'pk',
			'name' => 'string NOT NULL',
			'destription' => 'string'
		));
	}

	public function down()
	{
		$this->dropTable('author');
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