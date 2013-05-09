<?php

class m130507_144153_add_picture_to_book extends CDbMigration
{
	public function up()
	{
		$this->addColumn('book', 'picture', 'string CHARACTER SET utf8');

	}

	public function down()
	{
		$this->dropColumn('book', 'picture');
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