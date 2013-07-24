<?php

class CollectionController extends Controller
{
	public function actionCreate()
	{
		$model = Collection::model()->findByAttributes(array(
            'user_id'=>Yii::app()->user->id, 
            'type'=>$_POST['Collection']['type'],
            'object_id'=>$_POST['Collection']['object_id']
        ));

		if(!$model){
			$model=new Collection;
		}
		$model->user_id = Yii::app()->user->id;

		$this->performAjaxValidation($model);

		if(isset($_POST['Collection']))
		{
			$model->attributes=$_POST['Collection'];
			if($model->save())
			{
				Yii::app()->user->setFlash('success', '收藏成功');
			}else{
				Yii::app()->user->setFlash('error', '收藏失败');
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='collection-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}