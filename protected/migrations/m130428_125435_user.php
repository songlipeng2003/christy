<?php

class m130428_125435_user extends CDbMigration
{
	public function up()
	{
		$this->createTable('user', array(
			'id' => 'pk',
			'username' => 'string CHARACTER SET utf8 NOT NULL',
			'password' => 'string CHARACTER SET utf8 NOT NULL',
			'user_sex' => 'string CHARACTER SET utf8',
			'user_tel' => 'string CHARACTER SET utf8',
			'user_email'=> 'string CHARACTER SET utf8 NOT NULL',
			'user_qq' => 'string CHARACTER SET utf8',
		));
	}

	public function down()
	{
		$this->dropTable('user');
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