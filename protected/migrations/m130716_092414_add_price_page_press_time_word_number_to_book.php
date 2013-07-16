<?php

class m130716_092414_add_price_page_press_time_word_number_to_book extends CDbMigration
{
	public function up()
	{
		$this->addColumn('book', 'price', 'string CHARACTER SET utf8');
		$this->addColumn('book', 'pages', 'int');
		$this->addColumn('book', 'press_time', 'datetime');
		$this->addColumn('book', 'word_number', 'int');
		$this->addColumn('book', 'alt_title', 'string CHARACTER SET utf8');
	}

	public function down()
	{
		$this->dropColumn('book', 'price');
		$this->dropColumn('book', 'pages');
		$this->dropColumn('book', 'press_time');
		$this->dropColumn('book', 'word_number');
		$this->dropColumn('book', 'alt_title');
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