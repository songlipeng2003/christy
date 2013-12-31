<?php

class m131110_152622_change_type_to_string_for_collection extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('collection', 'type', 'string NOT NULL');
	}

	public function down()
	{
		$this->alterColumn('collection', 'type', 'tinyint');
	}
}