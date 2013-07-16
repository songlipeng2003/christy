<?php

class m130714_030256_config extends CDbMigration
{
	public function up()
	{
		$this->createTable('config', array(
			'id' => 'pk',
			'key' => 'string CHARACTER SET utf8 NOT NULL',
			'value' => 'string CHARACTER SET utf8 NOT NULL',
		));
		$this->insert('config',array('key'=>'网站名称','value'=>'christ'));
		$this->insert('config',array('key'=>'网站描述','value'=>'书籍'));
		$this->insert('config',array('key'=>'电话','value'=>'12345678'));
		$this->insert('config',array('key'=>'email','value'=>'examp@xxx.com'));
	}

	public function down()
	{
		$this->dropTable('config');
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