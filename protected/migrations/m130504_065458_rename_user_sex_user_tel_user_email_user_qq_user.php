<?php

class m130504_065458_rename_user_sex_user_tel_user_email_user_qq_user extends CDbMigration
{
	public function up()
	{
		$this->renameColumn('user', 'user_sex', 'sex');
		$this->renameColumn('user', 'user_tel', 'tel');
		$this->renameColumn('user', 'user_email', 'email');
		$this->renameColumn('user', 'user_qq', 'qq');
	}

	public function down()
	{
		$this->renameColumn('user', 'sex', 'user_sex');
		$this->renameColumn('user', 'tel', 'user_tel');
		$this->renameColumn('user', 'email', 'user_email');
		$this->renameColumn('user', 'qq', 'usr_qq');
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