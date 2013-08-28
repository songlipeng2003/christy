<?php

class ReviewController extends Controller
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
				'actions'=>array('create', 'update', 'delete'),
				'users'=>array('@'),
			),
			array(
				'allow',
				'actions'=>array('view'),
				'users'=>array('*'),
			),
			array(
				'deny',
				'users'=>array('*')
			)
		);
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'review'=>$this->loadModel($id),
		));
	}

	public function actionCreate()
	{
		$model=new Review;
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

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['Review']))
		{
			$model->attributes=$_POST['Review'];

			if($model->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('admin', 'Update succesfully'));
				$this->redirect(array('view','id'=>$model->id));
			}else{
				Yii::app()->user->setFlash('error', Yii::t('admin', 'Update failed'));
			}
		}

		$this->render('update',array(
			'review'=>$model,
		));
	}

	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
			{
				Yii::app()->user->setFlash('success', Yii::t('admin', 'Delete succesfully'));

				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
			}
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function loadModel($id)
	{
		$model=Review::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		if($model->user_id!=Yii::app()->user->id){
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
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