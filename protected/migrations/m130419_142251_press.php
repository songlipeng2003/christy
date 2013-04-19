<?php

class m130419_142251_press extends CDbMigration
{
	public function up()
	{
		$this->createTable('press', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'address' => 'string NOT NULL',
            'destription' => 'string',
        ));
	}

	public function down()
	{
		$this->dropTable('press');
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