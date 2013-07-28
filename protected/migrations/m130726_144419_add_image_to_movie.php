<?php

class m130726_144419_add_image_to_movie extends CDbMigration
{
	public function up()
	{
		$this->addColumn('movie', 'image', 'string CHARACTER SET utf8');
	}

	public function down()
	{
		$this->dropColumn('movie', 'image');
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