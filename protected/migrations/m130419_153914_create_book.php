<?php

class m130419_153914_create_book extends CDbMigration
{
	public function up()
	{
		$this->createTable('book', array(
            'id' => 'pk',
            'name' => 'string CHARACTER SET utf8 NOT NULL',
            'author' => 'string CHARACTER SET utf8 NOT NULL ',
            'category' => 'string CHARACTER SET utf8',
            'prss' => 'string CHARACTER SET utf8 NOT NULL ',
            'isbn' => 'string CHARACTER SET utf8 NOT NULL ',
            'destription' => 'string CHARACTER SET utf8',
        ));
	}

	public function down()
	{
		$this->dropTable('book');
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