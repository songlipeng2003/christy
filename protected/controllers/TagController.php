<?php

class TagController extends Controller
{
    public function actionAutoComplete(){
        $term = Yii::app()->request->getParam('term','');
        if($term){
            $criteria = new CDbCriteria();
            $criteria->addSearchCondition('name', $term);
            $criteria->order = 'id DESC';
            $criteria->limit = '10';
            $tags = Tag::model()->findAll($criteria);
            $result = [];
            foreach ($tags as $tag) {
                
            }
            $this->renderJSON();
        }
    }
}