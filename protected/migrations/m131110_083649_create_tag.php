<?php

class m131110_083649_create_tag extends CDbMigration
{
	public function up()
	{
		$this->createTable('tag', array(
			'id' => 'pk',
			'name' => 'string NOT NULL', 
			'type' => 'string NOT NULL',
			'user_id' => 'integer'
			'created_at' => 'datetime',
			'updated_at' => 'datetime'
		));
	}

	public function down()
	{
		$this->dropTable('tag');
	}
}