<?php

class m130419_151125_add_parent_id_to_category extends CDbMigration
{
	public function up()
	{
		$this->addColumn('category', 'parent_id', 'int');
	}

	public function down()
	{
		$this->dropColumn('category', 'parent_id');
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