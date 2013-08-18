<?php

class m130818_103922_create_settings extends CDbMigration
{
	public function up()
	{
		$this->createTable('settings', array(
			'id' => 'pk',
			'category' => 'VARCHAR(64) CHARACTER SET utf8 NOT NULL DEFAULT \'system\'',
			'key' => 'string CHARACTER SET utf8 NOT NULL',
			'value' => 'text CHARACTER SET utf8 NOT NULL',
		));
		$this->insert('settings',array('key'=>'site_name','value'=>'christ'));
		$this->insert('settings',array('key'=>'site_description','value'=>'book'));
		$this->insert('settings',array('key'=>'telephone','value'=>'12345678'));
		$this->insert('settings',array('key'=>'email','value'=>'examp@xxx.com'));
		$this->insert('settings',array('key'=>'about_us','value'=>'welcome'));
	}

	public function down()
	{
		$this->dropTable('settings');
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