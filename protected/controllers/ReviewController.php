<?php

class ReviewController extends Controller
{
	public function actionCreate()
	{
		$model = Review::model()->findByAttributes(array(
            'user_id'=>Yii::app()->user->id, 
            'type'=>$_POST['Review']['type'],
            'object_id'=>$_POST['Review']['object_id']
        ));

		if(!$model){
			$model=new Review;
		}
		$model->user_id = Yii::app()->user->id;

		$this->performAjaxValidation($model);

		if(isset($_POST['Review']))
		{
			$model->attributes=$_POST['Review'];
			if($model->save())
			{
				Yii::app()->user->setFlash('success', '评论成功');
			}else{
				Yii::app()->user->setFlash('error', '评论失败');
			}
		}

		if($model->type=1){
			$this->redirect(array('/book/view', 'id'=>$model->object_id));
		}
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='Review-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}