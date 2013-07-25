<?php

class m130725_150442_create_topic extends CDbMigration
{
	public function up()
	{
		$this->createTable('topic', array(
			'id' => 'pk',
			'user_id' => 'integer NOT NULL',
			'group_id' => 'integer NOT NULL',
			'title' => 'string NOT NULL',
			'content' => 'text NOT NULL',
			'created_at' => 'datetime',
			'updated_at' => 'datetime'
		));
	}

	public function down()
	{
		$this->dropTable('topic');
	}
}