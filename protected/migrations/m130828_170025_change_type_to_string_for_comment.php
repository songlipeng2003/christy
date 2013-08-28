<?php

class m130828_170025_change_type_to_string_for_comment extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('comment','type','string');
	}

	public function down()
	{
		$this->alterColumn('comment','type','int');
	}
}