<?php

class m131110_093146_create_collection_tag extends CDbMigration
{
	public function up()
	{
		$this->createTable('collection_tag', array(
			'tag_id' => 'int NOT NULL',
			'collection_id' => 'int NOT NULL',
		));
	}

	public function down()
	{
		$this->dropTable('collection_tag');
	}
}