<?php

class m130703_145349_create_movie extends CDbMigration
{
	public function up()
	{
		$this->createTable('movie', array(
			'id' => 'pk',
			'title' => 'string NOT NULL',
			'original_title' => 'string',
			'aka' => 'string',
			'directors' => 'string',
			'casts'=> 'string',
			'writers' => 'string',
			'website' => 'string',
			'pubdate' => 'date',
			'languages' => 'string',
			'duration' => 'int',
			'summary' => 'text'
		));
	}

	public function down()
	{
		$this->dropTable('movie');
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