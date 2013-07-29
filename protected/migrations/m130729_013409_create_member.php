<?php

class m130729_013409_create_member extends CDbMigration
{
	public function up()
	{
		$this->createTable('member', array(
			'id' => 'pk',
			'user_id' => 'int NOT NULL',
			'group_id' => 'integer NOT NULL',
			'created_at' => 'datetime',
			'updated_at' => 'datetime'
		));
	}

	public function down()
	{
		$this->dropTable('member');
	}
}