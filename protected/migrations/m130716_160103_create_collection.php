<?php

class m130716_160103_create_collection extends CDbMigration
{
	public function up()
	{
		$this->createTable('collection', array(
			'id' => 'pk',
			'user_id' => 'int NOT NULL',
			'object_id' => 'integer NOT NULL',
			'type' => 'tinyint NOT NULL',
			'status' => 'tinyint NOT NULL',
			'rating' => 'tinyint default 0',
			'tags' => 'string',
			'comment' => 'string',
			'created_at' => 'datetime',
			'updated_at' => 'datetime'
		));
	}

	public function down()
	{
		$this->dropTable('collection');
	}
}