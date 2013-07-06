<?php

class m130704_144000_create_doc extends CDbMigration
{
	public function up()
	{
		$this->createTable('doc', array(
			'id' => 'pk',
			'title' => 'string NOT NULL',
			'content' => 'text',
			'created_at' => 'datetime',
			'updated_at' => 'datetime'
		));
	}

	public function down()
	{
		$this->dropTable('doc');
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