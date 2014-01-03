<?php

class m140103_083719_create_book_order extends CDbMigration
{
	public function up()
	{
		$this->createTable('book_order', array(
			'id' => 'pk',
			'user_id' => 'integer NOT NULL',
			'book_id' => 'integer NOT NULL', 
			'status' => 'tinyint NOT NULL DEFAULT 0',
			'download_times' => 'integer NOT NULL DEFAULT 0',
			'created_at' => 'datetime',
			'updated_at' => 'datetime'
		));
	}

	public function down()
	{
		$this->dropTable('book_order');
	}
}