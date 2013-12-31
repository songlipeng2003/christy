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
                $result[] = array(
                    'id' => $tag->id,
                    'label' => $tag->name,
                    'value' => $tag->name
                );
            }
            $this->renderJSON($result);
        }
    }
}