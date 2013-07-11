<?php

class BookController extends Controller
{
	public function actionIndex()
	{
		$criteria = new CDbCriteria();
		$criteria->order = 'id DESC';

		$item_count = Book::model()->count($criteria);
		$pages = new CPagination($item_count);
        $pages->setPageSize(20);
        $pages->applyLimit($criteria);

		$this->render('index', array(
            'model'=> Book::model()->findAll($criteria),
            'item_count'=>$item_count,
            'page_size'=>20,
            'items_count'=>$item_count,
            'pages'=>$pages
		));
	}

	public function actionView($id)
	{
		$book=Book::model()->findByPk($id);
		if($book===null)
			throw new CHttpException(404,'The requested page does not exist.');

		$this->render('view', array(
			'book' => $book
		));
	}
}