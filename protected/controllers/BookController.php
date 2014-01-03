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

    public function actionCategory($id)
    {
        $category = Category::model()->findByPk($id);
        if($category===null)
            throw new CHttpException(404,'The requested page does not exist.');

        $descendants=$category->descendants()->findAll();
        $cate_ids = array();
        foreach($descendants as $child){
            $childs[] = $child->id;
        }
        $childs[] = $category->id;

        $parents = $category->ancestors()->findAll();

        $criteria = new CDbCriteria();
        $criteria->addInCondition('category_id', $childs);
        $criteria->order = 'id DESC';

        $item_count = Book::model()->count($criteria);
        $pages = new CPagination($item_count);
        $pages->setPageSize(20);
        $pages->applyLimit($criteria);

        $this->render('category', array(
            'model'=> Book::model()->findAll($criteria),
            'item_count'=>$item_count,
            'page_size'=>20,
            'items_count'=>$item_count,
            'pages'=>$pages,
            'category'=>$category,
            'parents'=>$parents
        ));
    }

	public function actionView($id)
	{
		$book=Book::model()->findByPk($id);
		if($book===null)
			throw new CHttpException(404,'The requested page does not exist.');

        $collection = Collection::model()->findByAttributes(array(
            'user_id'=>Yii::app()->user->id, 
            'type'=>'Book',
            'object_id'=>$id
        ));

        if(!$collection){
            $collection = new Collection;
            $collection->type = 'Book';
            $collection->object_id = $id;
        }

        $bookOrder = BookOrder::model()->findByAttributes(array(
            'user_id'=>Yii::app()->user->id, 
            'book_id'=>$id,
        ));

        $reviews = Review::model()->findAllByAttributes(
            array(
                'object_id'=>$id,
                'type'=>Review::TYPE_BOOK
            ),
            array(
                'order'=>'id DESC',
                'limit'=>10
            )
        );

        $review = new Review;
        $review->type = Review::TYPE_BOOK;
        $review->object_id = $id;

		$this->render('view', array(
			'book'=>$book,
            'collection'=>$collection,
            'reviews'=>$reviews,
            'review'=>$review,
            'bookOrder'=>$bookOrder
		));
	}

    public function actionAjaxFillTree()
    {
        // accept only AJAX request (comment this when debugging)
        if (!Yii::app()->request->isAjaxRequest) {
            exit();
        }
        // parse the user input
        $parentId = "NULL";
        if (isset($_GET['root']) && $_GET['root'] !== 'source') {
            $parentId = (int) $_GET['root'];
        }
        // read the data (this could be in a model)
        $children = Yii::app()->db->createCommand(
            "SELECT m1.id, m1.name AS text, m2.id IS NOT NULL AS hasChildren "
            . "FROM category AS m1 LEFT JOIN category AS m2 ON m1.id=m2.parent_id "
            . "WHERE m1.parent_id <=> $parentId "
            . "GROUP BY m1.id ORDER BY m1.letter_index ASC"
        )->queryAll();

        foreach ($children as $key => $child) {
            $link = CHtml::link($child['text'], array('book/category', 'id'=>$child['id']));

            $children[$key]['text'] = $link;
        }

        $json = CTreeView::saveDataAsJson($children);

        $json = str_replace(
            '"hasChildren":"0"',
            '"hasChildren":false',
            $json  
        );

        echo $json;
    }

    public function actionBuy($id)
    {
        $book=Book::model()->findByPk($id);
        if($book===null){
            throw new CHttpException(404,'The requested page does not exist.');
        }

        $bookOrder = BookOrder::model()->findByAttributes(array(
            'user_id'=>Yii::app()->user->id, 
            'book_id'=>$id,
        ));

        if(!$bookOrder){
            $bookOrder = new BookOrder();
            $bookOrder->user_id = Yii::app()->user->id;
            $bookOrder->book_id = $id;
            $bookOrder->save();

            Yii::app()->user->setFlash('success', '购买成功，请点击下载');
        }else{
            Yii::app()->user->setFlash('success', '已经购买，请点击下载');
        }

        $this->redirect(array('/book/view', 'id'=>$id));
    }
}