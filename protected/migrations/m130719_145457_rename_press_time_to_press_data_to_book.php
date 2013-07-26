<?php

class m130719_145457_rename_press_time_to_press_data_to_book extends CDbMigration
{
	public function up()
	{
		$this->renameColumn('book', 'press_time', 'press_date');
		$this->alterColumn('book','press_date','date');
	}

	public function down()
	{
		$this->renameColumn('book', 'press_date', 'press_time');
		$this->alterColumn('book','press_date','datetime');	
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