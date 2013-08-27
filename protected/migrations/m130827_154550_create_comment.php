<?php

class m130827_154550_create_comment extends CDbMigration
{
	public function up()
	{
		$this->createTable('comment', array(
			'id' => 'pk',
			'user_id' => 'integer NOT NULL',
			'object_id' => 'integer NOT NULL',
			'type' => 'tinyint NOT NULL',
			'content' => 'text',
			'created_at' => 'datetime',
			'updated_at' => 'datetime'
		));
	}

	public function down()
	{
		$this->dropTable('comment');
	}
}