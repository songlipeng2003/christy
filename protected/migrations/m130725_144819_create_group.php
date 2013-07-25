<?php

class m130725_144819_create_group extends CDbMigration
{
	public function up()
	{
		$this->createTable('group', array(
			'id' => 'pk',
			'user_id' => 'integer NOT NULL',
			'name' => 'string NOT NULL',
			'summary' => 'string',
			'created_at' => 'datetime',
			'updated_at' => 'datetime'
		));
	}

	public function down()
	{
		$this->dropTable('group');
	}
}