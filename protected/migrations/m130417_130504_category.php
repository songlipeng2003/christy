<?php

class m130417_130504_category extends CDbMigration
{
	public function up()
	{
		$this->createTable('category', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'destription' => 'string',
        ));
	}

	public function down()
	{
		$this->dropTable('category');
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