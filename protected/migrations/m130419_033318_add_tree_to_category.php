<?php

class m130419_033318_add_tree_to_category extends CDbMigration
{
	public function up()
	{
		$this->addColumn('category', 'lft', 'int');
		$this->addColumn('category', 'rgt', 'int');
		$this->addColumn('category', 'level', 'int');
	}

	public function down()
	{
		$this->dropColumn('category', 'level');
		$this->dropColumn('category', 'rgt');
		$this->dropColumn('category', 'lft');
	}
}