<?php
class CommentsList extends CWidget
{
    public $object_id;

    public $type;

    public function init()
    {
    }
 
    public function run()
    {
        $criteria = new CDbCriteria();
        $criteria->order = 'id DESC';
        $criteria->addCondition('object_id='.$this->object_id);

        $item_count = Comment::model()->count($criteria);
        $pages = new CPagination($item_count);
        $pages->setPageSize(20);
        $pages->applyLimit($criteria);

        $comment = new Comment();
        $comment->object_id = $this->object_id;
        $comment->type = $this->type;

        $this->render('comments_list', array(
            'comments' => Comment::model()->findAll($criteria),
            'comment' => $comment,
            'item_count' => $item_count,
            'page_size' => 20,
            'items_count' => $item_count,
            'pages' => $pages
        ));
    }
}