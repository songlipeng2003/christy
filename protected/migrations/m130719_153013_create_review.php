<?php

class m130719_153013_create_review extends CDbMigration
{
	public function up()
	{
		$this->createTable('review', array(
			'id' => 'pk',
			'user_id' => 'integer NOT NULL',
			'object_id' => 'integer NOT NULL',
			'type' => 'tinyint NOT NULL',
			'rating' => 'tinyint NOT NULL DEFAULT 0',
			'title' => 'string NOT NULL',
			'summary' => 'string',
			'content' => 'text',
			'votes' => 'integer NOT NULL DEFAULT 0',
			'useless' => 'integer NOT NULL DEFAULT 0',
			'comments' => 'integer NOT NULL DEFAULT 0',
			'created_at' => 'datetime',
			'updated_at' => 'datetime'
		));
	}

	public function down()
	{
		$this->dropTable('review');
	}
}