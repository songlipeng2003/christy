<?php

class m130726_100754_change_book_info extends CDbMigration
{
	public function safeUp()
	{
		$this->dropColumn('book', 'category');
		$this->addColumn('book', 'category_id','integer');
		$this->dropColumn('book', 'author');
		$this->addColumn('book', 'author_id','integer');
		$this->dropColumn('book', 'press');
		$this->addColumn('book', 'press_id','integer');
		$this->addColumn('book', 'origin_title','string');
		$this->addColumn('book', 'subtitle','string');
		$this->addColumn('book', 'author_intro','string');
		$this->addColumn('book', 'translator_id','integer');

		$this->renameColumn('book', 'document', 'file');
		$this->renameColumn('book', 'picture', 'image');
	}

	public function safeDown()
	{
		$this->addColumn('book', 'category', 'string');
		$this->dropColumn('book','category_id');
		$this->addColumn('book', 'author', 'string');
		$this->dropColumn('book','author_id');
		$this->addColumn('book', 'press', 'string');
		$this->dropColumn('book','press_id');
		$this->dropColumn('book','origin_title');
		$this->dropColumn('book','subtitle');
		$this->dropColumn('book','author_intro');
		$this->dropColumn('book','translator_id');

		$this->renameColumn('book', 'file', 'document');
		$this->renameColumn('book', 'image', 'picture');
	}
}