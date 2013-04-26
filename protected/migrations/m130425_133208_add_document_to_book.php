<?php

class m130425_133208_add_document_to_book extends CDbMigration
{
	public function up()
	{
		$this->addColumn('book', 'document', 'string CHARACTER SET utf8 NOT NULL');
	}

	public function down()
	{
		$this->dropColumn('book', 'document');
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