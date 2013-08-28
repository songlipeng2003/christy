<?php

class CommentController extends Controller
{
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array(
                'allow',
                'actions'=>array('create'),
                'users'=>array('@'),
            ),
            array(
                'deny',
                'users'=>array('*')
            )
        );
    }

    public function actionCreate()
    {
        $model=new Comment;
        $model->user_id = Yii::app()->user->id;

        if(isset($_POST['Comment']))
        {
            $model->attributes=$_POST['Comment'];
            if($model->save())
            {
                Yii::app()->user->setFlash('success', '回复成功');
            }else{
                Yii::app()->user->setFlash('error', '回复失败');
            }
        }
        
        $this->redirect(array('/'.strtolower($model->type).'/view', 'id'=>$model->object_id));
    }
}