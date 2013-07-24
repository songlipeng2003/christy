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
            'type'=>Collection::TYPE_BOOK,
            'object_id'=>$id
        ));

        if(!$collection){
            $collection = new Collection;
            $collection->type = Collection::TYPE_BOOK;
            $collection->object_id = $id;
        }

		$this->render('view', array(
			'book' => $book,
            'collection' => $collection
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
}